var $ = window.jQuery = require('jquery');
require('bootstrap');

var Vue = require('vue');

Vue.use(require('vue-resource'));

new Vue(require('./blackbook'));