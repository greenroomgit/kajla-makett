<template>
    <div id="makett-fotok" class="">
        <div class="yellow-box">
            <div class="yellow-box__inner">
                <h1>Nem töltöttél még fel képet?</h1>
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