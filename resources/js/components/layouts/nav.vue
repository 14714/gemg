<template>
    <nav id="nav">
        <ul>
            <li>
                <a href="nosotros">
                    <span>Nosotros</span> <nosotros />
                </a>
            </li>
            <li>
                <a href="servicios">
                    <span>Servicios</span> <services />
                </a>
            </li>
            <li>
                <a href="#contacto">
                    <span>Contacto</span> <contacto />
                </a>
            </li>
            <li>
                <three />
                <two />
            </li>
            <li>
                <a href="noticias">
                    <span>Novedades</span> <news />
                </a>
            </li>
            <li>
                <a href="./transbank.php">
                    <span>Transbank</span> <work />
                </a>
            </li>
            <li>
                <a href="faq">
                    <span>Preguntas</span> <concept />
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
import nosotros from '../svg/nosotros.vue'
import services from '../svg/services.vue'
import contacto from '../svg/contacto.vue'
import news from '../svg/news.vue'
import work from '../svg/work.vue'
import concept from '../svg/concept.vue'
import three from '../svg/three.vue'
import two from '../svg/two.vue'

export default {
    components:{
        nosotros,
        services,
        contacto,
        news,
        work,
        concept,
        three,
        two
    },
};
</script>

<style>
</style>