<template>
    <div id="nosotros">
        <nav id="navmenu">
            <three />
        </nav>
        <div>
            <h1>¿Que es Gemma Graphic?</h1>
            <p>
                Gemma Graphic es una empresa familiar con un personal sumamente compenetrado,
                destinada a ayudar a pequeñas y grandes empresas como también a personas
                naturales, las cuales buscan potenciar su negocio abarcando el área digital
                y la presencia en línea.
                <br />Buscamos satisfacer las necesidades de nuestros clientes según lo que la informática
                pueda suplir.
            </p>
            <div>
                <logo />
            </div>
        </div>
    </div>
</template>

<script>
import three from "./svg/three.vue";
import logo from "./svg/logo.vue";
export default {
    components: {
        three,
        logo,
    },
};
</script>

<style>
</style>