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
import FelhasznalasiFeltetelek from './components/pages/felhasznalasi-feltetelek'
import AdatkezelesiNyilatkozat from './components/pages/adatkezelesi-nyilatkozat'
import SutiKezeles from './components/pages/suti-kezeles'
import Impressum from './components/pages/impresszum'

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
    }
]

export default new Router({
    mode: 'history',
    routes
})