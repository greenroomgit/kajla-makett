<template>
    <header class="site-header">
        <nav class="navbar" role="navigation" aria-label="main navigation" v-bind:class="{'is-active': isOpen}">
            <div id="navbarBasicExample" class="navbar-menu">
    
                <div class="navbar-start navbar-left">
                    <router-link class="navbar-item" to="/">Játék</router-link>
                    <router-link class="navbar-item" to="/bekuldott-kepek">Beküldött képek</router-link>
                </div>
    
                <div class="navbar-end navbar-right">
                    <router-link class="navbar-item" to="/makettek-letoltese">Makettek letöltése</router-link>
                </div>
    
            </div>
        </nav>
    
        <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false" @click="isOpen = !isOpen" v-bind:class="{'is-active': isOpen}">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
              </a>
    
    </header>
</template>

<script>
export default {
    data: function() {
        return {
            isOpen: false
        }
    },
    watch: {
        $route(to, from) {
            this.isOpen = false;
        }
    }


}
</script>