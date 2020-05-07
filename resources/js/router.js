import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

//nav
import Home from './components/pages/home'
import Jatek from './components/pages/jatek'
import MakettFotok from './components/pages/makett-fotok'
import MakettekLetoltese from './components/pages/makettek-letoltese'
import MakettFeltoltes from './components/pages/makett-feltoltes'

//footer
import Impressum from './components/pages/impresszum'
import Aszf from './components/pages/aszf'



const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/jatek',
        name: 'jatek',
        component: Jatek
    },
    {
        path: '/makett-fotok',
        name: 'makett-fotok',
        component: MakettFotok
    },
    {
        path: '/makettek-letoltese',
        name: 'makettek-letoltese',
        component: MakettekLetoltese
    },
    {
        path: '/makett-feltoltes',
        name: 'makett-feltoltes',
        component: MakettFeltoltes
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