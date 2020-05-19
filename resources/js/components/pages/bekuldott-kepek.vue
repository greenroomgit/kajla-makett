<template>
    <div id="makett-fotok" class="">
        <div class="yellow-box yellow-box--alert">
            <div class="yellow-box__inner has-text-centered has-text-left-tablet">
                <h1 class="is-size-4 is-size-3-tablet is-size-2-desktop">Nem töltöttél még fel képet?</h1>
                <p>Ne habozz, igényeld az ingyenes makett csomagot, vagy töltsd le és nyomtass sajátot. Utána már csak építened és lefotóznod kell, majd beküldeni az oldalon keresztül. </p>
            </div>
        </div>

        <Jackpot isWide="true"/>

    
        <Pictures />

    </div>


</template>

<script>

import Pictures from '../pictures'
import Jackpot from '../jackpot'

export default {
    name: 'uploads',
    components: {
        'Pictures': Pictures,
        'Jackpot': Jackpot
    },
    data() {
        return {
        }
    },
    methods: {
    }
}
</script>