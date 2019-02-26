<template>

    <nav class="navbar has-background-warning" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="">
              <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" @click="showMenu = !showMenu">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </a>

        </div>

  <div class="navbar-menu" :class="{ 'is-active' : showMenu}">
    <div class="navbar-start">

        <div class="navbar-item has-dropdown" :class="{ 'is-active' : ops_dropdown}" >
            <a class="navbar-link is-arrowless" @mouseover="showOpsDropdown" @mouseout="hideOpsDropdown">
                Operations
            </a>

        <div class="navbar-dropdown" @mouseover="showOpsDropdown" @mouseout="hideOpsDropdown">
          <a class="navbar-item" href="/grows" >Grows</a>
          <a class="navbar-item" href="/payrolls" >Payrolls</a>
          <a class="navbar-item" href="/utilityBills" >Utility Bills</a>
        </div>
        </div>

        <a class="navbar-item" href="/feeds_input">Calculator</a>

          <div class="navbar-item has-dropdown" :class="{ 'is-active' : adm_dropdown}">
            <a class="navbar-link is-arrowless" @mouseover="showAdmDropdown" @mouseout="hideAdmDropdown">
              Administration
            </a>

            <div class="navbar-dropdown" @mouseover="showAdmDropdown" @mouseout="hideAdmDropdown">
              <a class="navbar-item">Buildings</a>
            </div>
          </div>
    </div>

    <div class="navbar-end">
        <div class="navbar-item">
            <div class="buttons">
                <a class="button is-primary">
                    <strong>Sign up</strong>
                </a>
          
                <a class="button is-light">
                    Log in
                </a>
            </div>
        </div>
    </div>

  </div>
</nav>

</template>

<script>
    export default {
        data() {
            return {
                ops_dropdown: false,
                adm_dropdown: false,
                showMenu: false,
            }
        },

        methods: {
            hideOpsDropdown: _.throttle(function() {
                this.ops_dropdown = false;
                //console.log('throttling 2secs');
            }, 100),

            showOpsDropdown: _.throttle(function() {
                this.ops_dropdown = true;
                //console.log('throttling 2secs');
            }, 100),

            hideAdmDropdown: _.throttle(function() {
                this.adm_dropdown = false;
                //console.log('throttling 2secs');
            }, 100),

            showAdmDropdown: _.throttle(function() {
                this.adm_dropdown = true;
                //console.log('throttling 2secs');
            }, 100),
        },
    }
</script>
