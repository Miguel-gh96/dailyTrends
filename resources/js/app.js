require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import Buefy from 'buefy'
Vue.use(Buefy)

import IndexFeedComponent from './components/IndexFeedComponent.vue';
import CreateFeedComponent from './components/CreateFeedComponent.vue';
import EditFeedComponent from './components/EditFeedComponent.vue';

const routes = [
  {
      name: 'IndexFeed',
      path: '/dashboard/',
      component: IndexFeedComponent
  },
  {
      name: 'CreateFeed',
      path: '/dashboard/create',
      component: CreateFeedComponent
  },
  {
      name: 'EditFeed',
      path: '/dashboard/edit/:id',
      component: EditFeedComponent
  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');