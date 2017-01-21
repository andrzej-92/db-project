/* global require */

import * as _  from 'lodash';
import $ from 'jquery';

window._ = _;

window.$ = window.jQuery = $;
require('bootstrap-sass');

window.Vue = require('vue');
require('vue-resource');

Vue.http.interceptors.push((request, next) => {
   request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

   next();
});


window.randomHexColor = () => {
   return '#' + Math.floor(Math.random()*16777215).toString(16);
};