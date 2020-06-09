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
                            <h2 class="title is-size-3 is-size-4-tablet is-size-3-desktop has-text-centered has-text-left-tablet">
                                A fődíj Magyarország térképe, melyen elhelyezheted a 20 darabos makett csomag minden nevezetességét.
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