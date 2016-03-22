var $ = require('jquery');

function Blackbook() {
    this.hateButton = $('.js-hate-button');
    this.unhateButton = $('.js-unhate-button');
    this.blacklist = $('#black-list');
    this.blackbookTotal = $('#blackbook-total');
    this.searchField = $('#search-field');

    this.blacklistCollection = [];
    
    this.blacklistItemTemplate = $(require('./templates/blacklist-item.html'));

    this.bindEvents();
    this.init();
}

Blackbook.prototype.init = function () {
    $('[data-person]').each(function (i, item) {
        this.checkHateCount($(item));
    }.bind(this));
};

Blackbook.prototype.bindEvents = function () {
    var _this = this;

    $(this.hateButton).on('click', function (e) {
        e.preventDefault();

        var id = $(this).attr('data-hate');

        _this.handleHateClick(id);
    });

    $(this.unhateButton).on('click', function (e) {
        e.preventDefault();

        var id = $(this).attr('data-hate');

        _this.handleUnhateClick(id);
    });

    $(this.searchField).on('input', this.handleSearch.bind(this));
};

Blackbook.prototype.handleSearch = function () {
    var search = this.searchField.val();
    var $people = $('[data-person]');

    if(search === '') {
        $people.show();

        return;
    }

    $people.each(function (i, item) {
        var $person = $(item);
        var name = this.getName($person);
        var foundName = new RegExp(search, 'i').test(name);

        if(foundName) {
            $person.show();
        } else {
            $person.hide();
        }
    }.bind(this))
};

Blackbook.prototype.handleHateClick = function (id) {
    var url = this.getApiUrl('hate', id);

    this.postRequest(url, this.afterHateClick.bind(this));
};

Blackbook.prototype.handleUnhateClick = function (id) {
    var url = this.getApiUrl('unhate', id);

    this.postRequest(url, this.afterUnhateClick.bind(this));
};

Blackbook.prototype.afterHateClick = function (response) {
    var $person = this.getPerson(response.data.id);
    var hateCount = this.getHateCount($person);

    this.updateHateCount($person, hateCount + 1);
};

Blackbook.prototype.afterUnhateClick = function (response) {
    var $person = this.getPerson(response.data.id);

    this.updateHateCount($person, 0);
};

Blackbook.prototype.getPerson = function (id) {
    return $('[data-person=' + id + ']');
};

Blackbook.prototype.checkHateCount = function ($person) {
    var name = this.getName($person);
    var hateCount = this.getHateCount($person);

    if(hateCount > 0) {
        $person.find('.js-unhate-button').show();

        if(this.blacklistCollection.hasWhere('name', name)) {
            this.blacklistCollection.setWhere('name', name, 'hates', hateCount)
        } else {
            this.blacklistCollection.push({
                name: name,
                hates: hateCount
            });
        }
    } else {
        $person.find('.js-unhate-button').hide();

        this.blacklistCollection.removeWhere('name', name);
    }

    this.refreshBlacklist();
};

Blackbook.prototype.updateHateCount = function ($person, hateCount) {
    $person.find('.js-hate-count').text(hateCount);

    this.checkHateCount($person);
};

Blackbook.prototype.getHateCount = function ($person) {
    return Number($person.find('.js-hate-count').text());
};

Blackbook.prototype.getName = function ($person) {
    return $person.find('.card-title').text();
};

Blackbook.prototype.refreshBlacklist = function () {
    this.blacklist.html('');

    this.blacklistCollection.sort(function (a, b) {
        if (a.hates > b.hates) {
            return -1;
        }
        if (a.hates < b.hates) {
            return 1;
        }

        return 0;
    });

    this.blacklistCollection.forEach(function (item, i) {
        var blacklistItem = this.blacklistItemTemplate.clone();

        blacklistItem.find('.js-list-name').text(item.name);
        blacklistItem.find('.js-list-hates').text(item.hates);
        blacklistItem.find('.js-list-index').text(i + 1);

        this.blacklist.append(blacklistItem);
    }.bind(this));

    this.blackbookTotal.text(this.blacklistCollection.length);
};

Blackbook.prototype.postRequest = function (url, callback) {
    $.ajax({
        url: url,
        method: 'post',
        success: callback
    });
};

Blackbook.prototype.getApiUrl = function (action, param) {
    return 'api/' + action + '/' + param;
};

module.exports = Blackbook;
