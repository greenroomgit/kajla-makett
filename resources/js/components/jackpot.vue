<template>
    <div class="columns is-centered">
        <div :class="[
                'column ', 
                !isWide ? 'is-four-fifths' : 'wide'
                ]">
             <div :class="[
                'jackpot-box separator', 
                isWide ?  'wide' : ''
                ]">
                <div class="jackpot-box__inner">
                    <div class="columns is-vcentered    ">
                        <div class="column">
                            <h2 class="title is-2">
                                Fődíj: <br>
                                A fődíj a 20 darabos <br>makettszett és a hozzá kapcsolódó Magyarország térkép
                            </h2>
                        </div>
                        <div class="column jackpot-map-item">
                            <div class="jackpot-map">
                                <img src="/assets/images/terkep_makett_fodij.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>

  export default {
    props: {
      isWide: Boolean,
    }
  }

</script>