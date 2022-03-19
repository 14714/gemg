<template>
    <div class="trabajos">
        <nav id="navmenu">
            <three />
        </nav>
        <h1>Arma tu Página</h1>
        <section>
            <h3>Básico</h3>
            <!-- <?php  foreach($servicios as $valor){ 
            if($valor[4] == "basico"){ ?>-->
            <div v-for="service in basicos" :key="service.id" class="tarjetaServicio">
                <!-- onclick="displayDate(<?php echo $valor[0] . ',\'' . $valor[1] . '\'' ?>)" -->
                <svg v-html="service.svg"></svg>
                <div class="tituloTrabajos">
                    <span class="tituleService">
                        <h3>
                            <!-- <?php print_r($valor[1]) ?> -->
                            {{service.titulo}}
                        </h3>
                    </span>
                </div>
                <span class="description">
                    <p>
                        <!-- <?php echo $valor[2]; ?>                     -->
                        {{service.tinydescrip}}
                    </p>
                </span>
                <div class="chekbox" data-service="<?php echo $valor[0]; ?>">
                    <check />
                </div>
            </div>
            <!-- <?php }
            } ?>-->
            <h3>Avanzado</h3>
            <div v-for="service in avanzados" :key="service.id" class="tarjetaServicio">
                <!-- onclick="displayDate(<?php echo $valor[0] . ',\'' . $valor[1] . '\'' ?>)" -->
                <svg v-html="service.svg"></svg>
                <div class="tituloTrabajos">
                    <span class="tituleService">
                        <h3>
                            {{service.titulo}}
                        </h3>
                    </span>
                </div>
                <span class="description">
                    <p>
                        {{service.tinydescrip}}
                    </p>
                </span>
                <div class="chekbox" data-service="<?php echo $valor[0]; ?>">
                    <check />
                </div>
            </div>
            <!--
        <?php  foreach($servicios as $valor){
            if($valor[4] == "avanzado"){ ?>

            <div class="tarjetaServicio" onclick="displayDate(<?php echo $valor[0] . ',\'' . $valor[1] . '\'' ?>)">
                <?php  if($valor[6]){ echo $valor[6]; }else{ echo file_get_contents($valor[5]); }?>                
                <div class="tituloTrabajos">
                    <span class="tituleService">
                        <h3><?php print_r($valor[1]) ?></h3>
                    </span>
                </div>
                <span class="description">
                    <p>
                        <?php echo $valor[2]; ?>                    
                    </p>
                </span>
                <div class="chekbox" data-service="<?php echo $valor[0]; ?>">
                    <check/>
                </div>
            </div>

            <?php }
        } ?>
            -->
        </section>
        <!-- <div id="cart" class="carrito">        
        <div class="div-cart">
            <div class="div-cart-div">
                <?php echo file_get_contents('svg/cart.svg') ?>
                <p id="demo"></p>
            </div>
            <div class="totalpay">
                <button onclick="window.location.href='transbank.php?cook'">pagar</button>
                <h3>Total:<span id="totalPago">$40000</span></h3>
            </div>
        </div>
        <div class="div-detalle">
            <ul id="detalle">
                <li>
                    <p>15000</p>
                    <h2>Formulario</h2>
                    <span>Quitar</span>
                </li>
                <li>
                    <p>15000</p>
                    <h2>Formulario</h2>
                    <span>Quitar</span>
                </li>
                <li>
                    <p>15000</p>
                    <h2>Formulario</h2>
                    <span>Quitar</span>
                </li>
            </ul>
        </div>

        </div>-->
    </div>
</template>

<script>
import three from "./svg/three.vue";
import check from "./svg/check.vue";

export default {
    data() {
        return {
            services: "",
        };
    },
    methods: {
        getServices() {
            axios
                .get("/services/get")
                .then((r) => {
                    this.services = r.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    created() {
        this.getServices();
    },
    components: {
        three,
        check,
    },
    computed: {
        basicos: function () {
            return Object.values(this.services).filter((i) => i.tipo === "basico");
        },
        avanzados: function () {
            return Object.values(this.services).filter((i) => i.tipo === "avanzado");
        },
    },
};
</script>

<style>
</style>