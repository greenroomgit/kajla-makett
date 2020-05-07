<template>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <router-link class="navbar-item" to="/jatek">Jatek</router-link>
                <router-link class="navbar-item" to="/makett-fotok">Makett fotok</router-link>     
                <router-link class="navbar-item" to="/makettek-letoltese">Makettek letoltese</router-link>
            </div>

            <div class="navbar-brand">

                <router-link class="navbar-item" to="/">
                    <img src="assets/images/kajla-logo.png">
                </router-link>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-start">
                <router-link class="navbar-item" to="/makett-feltoltes">Makett igenyles es feltoltes</router-link>
            </div>

        </div>
    </nav>
</template>