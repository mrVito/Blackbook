var getApiUrl = function (action, param) {
    if(param === void 0) {
        param = '';
    }

    return 'api/' + action + '/' + param;
};

module.exports = {
    el: '#app',

    data: {
        people: {},
        search: '',
        loaded: false
    },

    ready: function () {
        var url = getApiUrl('index');

        this.$http.get(url).then(function (response) {
            this.people = response.data.data;

            this.loaded = true;
        });
    },

    computed: {
        blacklist: function () {
            if( ! this.loaded) { return }

            return this.people.filter(function (item) {
                item.hates = Number(item.hates);
                return item.hates > 0;
            })
        },
        blacklistCount: function () {
            if( ! this.loaded) { return }

            return this.blacklist.length;
        }
    },

    methods: {
        hate: function (person) {
            person.hates += 1;

            this.postRequest('hate', person.id);
        },
        unhate: function (person) {
            person.hates = 0;

            this.postRequest('unhate', person.id);
        },
        postRequest: function (action, param) {
            var url = getApiUrl(action, param);

            this.$http.post(url);
        }
    }
};