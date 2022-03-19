<template>
    <section id="home">
        <medalla />
        <div>
            <h1>Páginas Web</h1>
            <div>
                <span></span>
                <h2>Diseño y Juegos y App's</h2>
                <ul>
                    <li>
                        <p>Paginas de Internet a Medida</p>
                    </li>
                    <li>
                        <p>Desarrollo de Aplicaciones Web</p>
                    </li>
                </ul>
            </div>
            <div>
                <span></span>
                <h2>Hosting y Dominio</h2>
                <ul>
                    <li>
                        <p>Gestión de Almacenamiento Web</p>
                    </li>
                    <li>
                        <p>Crea tus Correos Corporativos</p>
                    </li>
                </ul>
            </div>
        </div>
        <img src="/img/Disenho2.png" alt="Computadores Diseño Paginas Web" />
    </section>
</template>

<script>
import medalla from '../svg/medalla.vue'
export default {
    data() {
        return {
            textoprueba : "default"
        }
    },
    components:{
        medalla
    }
};
</script>

<style scoped>
</style>