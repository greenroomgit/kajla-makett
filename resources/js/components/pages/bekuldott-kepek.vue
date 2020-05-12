<template>
    <div id="makett-fotok" class="">
        <div class="yellow-box">
            <div class="yellow-box__inner">
                <h1>Nem töltöttél még fel képet?</h1>
                <p>Ne habozz, igényeld az ingyenes makett csomagot, vagy töltsd le és nyomtass sajátot. Utána már csak építened és lefotóznod kell, majd beküldeni az oldalon keresztül. </p>
            </div>
        </div>

        <div class="prize">
            <div class="prize__inner">
                <div class="prize__left">
                    A fődíj a 20 darabos makett-szett és a hozzá kapcsolódó Magyarország térkép
                </div>

                <div class="prize__right">
                    <img src="/assets/images/terkep_makett_fodij.png" alt="">
                </div>
            </div>
        </div>
    
        <Pictures />

    </div>


</template>

<script>

import Pictures from '../pictures'

export default {
    name: 'uploads',
    components: {
        'Pictures': Pictures
    },
    data() {
        return {
        }
    },
    methods: {
    }
}
</script>