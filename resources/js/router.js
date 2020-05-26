import Vue from 'vue'
import Router from 'vue-router'
import Meta from 'vue-meta'
Vue.use(Router)
Vue.use(Meta)

//nav
import Home from './components/pages/home'
import BekuldottKepek from './components/pages/bekuldott-kepek'
import MakettekLetoltese from './components/pages/makettek-letoltese'

//footer
import FelhasznalasiFeltetelek from './components/pages/felhasznalasi-feltetelek'
import AdatkezelesiNyilatkozat from './components/pages/adatkezelesi-nyilatkozat'
import SutiKezeles from './components/pages/suti-kezeles'
import Impressum from './components/pages/impresszum'
import VerifyRequest from './components/pages/verify-request'

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home
    },
    {
        path: '/bekuldott-kepek',
        name: 'bekuldott-kepek',
        component: BekuldottKepek
    },
    {
        path: '/makettek-letoltese',
        name: 'makettek-letoltese',
        component: MakettekLetoltese
    },
    {   
        path: '/felhasznalasi-feltetelek',
        name: 'felhasznalasi-feltetelek',
        component: FelhasznalasiFeltetelek
    },
    {
        path: '/adatkezelesi-nyilatkozat',
        name: 'adatkezelesi-nyilatkozat',
        component: AdatkezelesiNyilatkozat
    },
    {
        path: '/suti-kezeles',
        name: 'suti-kezeles',
        component: SutiKezeles
    },
    {   
        path: '/impresszum',
        name: 'impresszum',
        component: Impressum
    },
    {   
        path: '/verify-request',
        name: 'verify-request',
        component: VerifyRequest
    }
]

export default new Router({
    mode: 'history',
    routes
})