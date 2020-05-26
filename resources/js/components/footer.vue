<template>
    <footer class="footer has-text-centered-mobile">
        <div class="container">
            <p>Hol vagy kajla © {{ new Date().getFullYear() }} Minden jog fenntartva</p>
            <router-link to="/felhasznalasi-feltetelek">Felhasználási feltételek</router-link>
            <span></span>
            <router-link to="/adatkezelesi-nyilatkozat">Adatkezelési nyilatkozat </router-link>
            <span></span>
            <router-link to="/suti-kezeles">Süti kezelés</router-link>
            <span></span>
            <router-link to="/impresszum">Impresszum</router-link>
        </div>
    </footer>
</template>