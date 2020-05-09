<template>
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <div id="navbarBasicExample" class="navbar-menu">

        <div class="navbar-start navbar-left">
            <router-link class="navbar-item" to="/jatek">Játék</router-link>
            <router-link class="navbar-item" to="/bekuldott-kepek">Beküldött képek</router-link>     
        </div>

        <div class="navbar-brand">
          <router-link class="navbar-item" to="/">
              <img src="assets/images/kajla-logo.png">
          </router-link>
          <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
          <div class="navbar-menu" id="navMenu">
          
          </div>
        </div>

        <div class="navbar-start navbar-right">
          <router-link class="navbar-item" to="/makettek-letoltese">Makettek letöltése</router-link>
        </div>

      </div>
    </nav>
</template>

<script>

document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});

export default {
    
}
</script>