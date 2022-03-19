<template>
    <div>
        <nav id="navmenu">
            <three />
        </nav>
        <section class="error">
            <h1>Pagina no Encontrada - 404</h1>
            <supergem/>
        </section>
    </div>
</template>

<script>
import three from "./svg/three.vue";
import supergem from "./svg/supergem.vue";

export default {
    components: {
        three,
        supergem
    },
};
</script>

<style>
</style>