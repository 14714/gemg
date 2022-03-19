<template>
    <div>
        <landing />
        <navegador />
        <mision />
        <servicios />
        <empresas />
        <footerV />
    </div>
</template>

<script>
import landing from './sections/landing.vue'
import navegador from './layouts/nav.vue'
import mision from './sections/mision.vue'
import servicios from './sections/servicios.vue'
import empresas from './sections/empresas.vue'
import footerV from './sections/footer.vue'
export default {
    components:{
        landing,
        navegador,
        mision,
        servicios,
        empresas,
        footerV,
    },
};
</script>

<style>
</style>