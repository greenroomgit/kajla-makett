import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import Home from './components/pages/home'
import Impressum from './components/pages/impresszum'
import Aszf from './components/pages/aszf'

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {   
        path: '/impresszum',
        name: 'impresszum',
        component: Impressum
    },
    {
        path: '/aszf',
        name: 'aszf',
        component: Aszf
    }
]

export default new Router({
    mode: 'history',
    routes
})