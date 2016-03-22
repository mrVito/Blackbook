Array.prototype.removeWhere = function (property, value) {
    "use strict";

    for(var i = 0; i < this.length; i++) {
        if(this[i][property] === value) {
            this.splice(i, 1);

            break;
        }
    }
};

Array.prototype.hasWhere = function (property, value) {
    "use strict";

    for(var i = 0; i < this.length; i++) {
        if(this[i][property] === value) {
            return true;
        }
    }

    return false;
};

Array.prototype.setWhere = function (property, value, setProperty, setValue) {
    "use strict";

    for(var i = 0; i < this.length; i++) {
        if(this[i][property] === value) {
            this[i][setProperty] = setValue;

            return;
        }
    }
};