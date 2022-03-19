<template>
    <section id="mision">
        <div>
            <h2>Nuestras Características Fundamentales</h2>
            <ul>
                <li>
                    <hands/>
                    <h3>Confianza</h3>
                </li>
                <li>
                    <lupa/>
                    <h3>Calidad</h3>
                </li>
                <li>
                    <email/>
                    <h3>Compromiso</h3>
                </li>
                <li>
                    <luz/>
                    <h3>Creatividad</h3>
                </li>
                <li>
                    <brain/>
                    <h3>Conocimiento</h3>
                </li>
            </ul>
        </div>
    </section>
</template>

<script>
import hands from '../svg/hands.vue'
import lupa from '../svg/lupa.vue'
import email from '../svg/email.vue'
import luz from '../svg/luz.vue'
import brain from '../svg/brain.vue'

export default {
    components:{
        hands,
        lupa,
        email,
        luz,
        brain
    }
};
</script>

<style scoped>
</style>