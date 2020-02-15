/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("../../node_modules/jquery/dist/jquery");
require("./bootstrap");
require("./googleMaps");
require("./formValidator");
global.datepicker = require("./bootstrap-datepicker");
global.countrySelect = require("./countrySelect");
global.intlTelInput = require("./intlTelInput");
global.mask = require("./jquery.mask");

// window.Vue = require('vue');

// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */

// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// const app = new Vue({
//     el: '#app',
// });

$("#inputBirthDate").datepicker({
    format: "yyyy-mm-dd",
    endDate: "+0d"
});

$("#inputCountry").countrySelect({
    defaultCountry: "xx"
});

var input = document.querySelector("#inputPhone");
window.intlTelInput(input, {
    separateDialCode: true,
    initialCountry: "xx",
    utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.4/js/utils.js"
});

$("#inputPhone").on("countrychange", function(e, countryData) {
    $("#inputPhone").val("");
    var maskPhone = $("#inputPhone")
        .attr("placeholder")
        .replace(/[0-9]/g, 0);
    $("#inputPhone").mask(maskPhone);
});

$("#inputPhone").on("click", function() {
    if ($(".iti__selected-flag .iti__xx").length) {
        $(this).blur();
    }
});
