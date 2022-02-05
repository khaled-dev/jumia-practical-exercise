require('./bootstrap');

import Vue from 'vue';
import VueAxios from "vue-axios";
import axios from "axios";
import App from './views/app.vue';
import { BootstrapVue } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(VueAxios, axios);
Vue.use(BootstrapVue)


new Vue(Vue.util.extend(App)).$mount('#app');
