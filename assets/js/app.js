/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
// require('../css/app.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

// console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

import Vue from 'vue';
import Vuetify from 'vuetify';
import App from './vue/App';
import 'vuetify/dist/vuetify.min.css'
import '../css/app.scss'
import axios from 'axios'

Vue.use(Vuetify);
new Vue({
    el: '#app',
    components: {App}
})

const form = document.getElementById('new-counter-form')
form.addEventListener("submit", function (e) {
    e.preventDefault()
    const data = new FormData(form);
    axios.post(form.action, data).then(function (response) {

    })
})