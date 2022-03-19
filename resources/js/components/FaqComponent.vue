<template>
    <div>
        <nav id="navmenu">
            <three />
        </nav>
        <section class="faq">
            <header>
                <h2>Preguntas Frecuentes - FAQ</h2>
            </header>
            <div>
                <button class="acc">¿Que es una Aplicación Web?</button>
                <div>
                    <p>
                        Una aplicación web es un programa dinámico alojado en un hosting web,
                        en ejemplo cuando queremos que nuestra página
                        web se pueda administrar por alguienque no sepa nada de programación,
                        probablemente tendremos que tener un inicio de sesión con clave y contraseña,
                        luego de eso veremos un panel de control donde nos permitiría editar los
                        distintos elementos de la página de manera facil y de manera que
                        cualquier usuario pueda hacerlo. Internamente la página hace uso de una base
                        de datos de la cual requiere, edita o elimina datos.
                    </p>
                </div>
                <button class="acc">¿Que es una Página Web?</button>
                <div>
                    <p>
                        Una página web a diferencia de una aplicación web, es estatica y
                        por lo general cumple la función de publicitar tu empresa o servicio,
                        puede poseer galeria de imagenes, formulario de contacto, mapas de
                        ubicación.
                    </p>
                </div>
                <button class="acc">¿Que es el Código Basura?</button>
                <div>
                    <p>
                        El Código Basura, es el codigo que generan por lo general
                        los gestores de contenido o maquetadores de sitios web,
                        como lo son los CMS u otros softwares de escritorio que
                        permiten la maquetación de 'páginas web' con el sistema
                        de Arrastrar y Soltar. Estos crean multitud de innecesarias
                        lineas de código, tags, id, clases, scripts, estilos los cuales
                        saturan la carga del sitio web y tambien la cache del sistema.
                    </p>
                </div>
                <button class="acc">¿Que es el CRUD?</button>
                <div>
                    <p>
                        CRUD son siglas en inglés que traducidas al español
                        significan 'Crear, Leer, Actualizar y Borrar'(Create,
                        Read, Update, Delete) respectivamente. Este sistema es utilizado
                        para la gestión de multitudes de datos de distinta indole, por lo
                        general es apoyado a traves de bases de datos SQL u otros.
                    </p>
                </div>
                <button class="acc">¿Que es una Base de Datos SQL?</button>
                <div>
                    <p>
                        Una base de datos es un entorno donde se nos permite almacenar distintos
                        tipos de información util para nuestro sitio web, por lo general estan
                        codificados en un lenguaje de consulta estructurado, mejor conocido como
                        SQL(Structured Query Language). Aunque existen otro tipo de lenguajes, todos
                        cumplen la función de almacenar nuestra información importante y delicada.
                    </p>
                </div>
                <button class="acc">¿Que es el Hosting?</button>
                <div>
                    <p>
                        El Hosting es un espacio donde nuestra página web es alojada,
                        por lo general hay empresas dedicadas a mantener espacios amplios
                        y accesibles online en todo momento, donde por cierto pago, uno puede
                        mantener su sitio web en la internet en todo momento disponible.
                        Estos lugares de albergue de sitios web, tambien disponen la opción
                        a mantener correos corporativos asociados a nuestro dominio en la web.
                    </p>
                </div>
                <button class="acc">¿Que es el Dominio?</button>
                <div>
                    <p>
                        El dominio web esta asociado a nuestro nombre en la internet,
                        para poder utilizar cierto nombre en la web, debemos comprarlo
                        a la entidad fiscalizadora que este a cargo de cierto dominio
                        nacional o internacional. Por poner un ejemplo,
                        En el caso de Chile, la entidad fiscalizadora es www.nic.cl
                        la cual se encarga de los nombres con terminación
                        <strong>.cl</strong>
                    </p>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import three from "./svg/three.vue";
export default {
    components: {
        three
    },
    mounted(){
        var acc = document.getElementsByClassName("acc");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("act");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    }
};

</script>

<style>
</style>