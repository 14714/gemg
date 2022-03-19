<template>
    <v-app>
        <nav id="navmenu">
            <three />
        </nav>
        <section id="loNuevo">
            <div>
                <v-system-bar>
                    <v-btn v-if="auth" @click="logout()">Cerrar Sesion</v-btn>                    
                    <v-btn v-if="!auth" @click="login()">Iniciar Sesion</v-btn>                    
                </v-system-bar>
                <v-app-bar>
                    <h1>Novedades</h1>
                    <v-subheader class="text-h5 text-center">Vamos no te pierdas ninguna!</v-subheader>                
                    <i class="material-icons">accessibility_new</i>
                </v-app-bar>
            </div>
            <section id="news">
                <div v-for="nueva in news" :key="nueva.id">
                    <div class="new-content">
                        <div>
                            <div v-if="tagId == `titulo-edit-${nueva.id}` && auth">
                                <v-text-field
                                    label="Titulo"
                                    v-model="nueva.titulo"
                                    :id="`titulo-edit-${nueva.id}`"
                                    @blur="update(nueva)"
                                    @keydown.enter="update(nueva)"
                                    filled  dark
                                />
                            </div>
                            <div
                                v-else
                                @dblclick="modificando($event)"
                                :data-for="`titulo-edit-${nueva.id}`"
                                id="demo"
                            >{{nueva.titulo}}</div>

                            <div v-if="tagId == `author-edit-${nueva.id}` && auth">
                                <v-text-field
                                    label="Autor"                                    
                                    v-model="nueva.author"
                                    :id="`author-edit-${nueva.id}`"
                                    @blur="update(nueva)"
                                    @keydown.enter="update(nueva)"
                                    filled dark
                                />
                            </div>
                            <h3
                                v-else
                                @dblclick="modificando($event)"
                                :data-for="`author-edit-${nueva.id}`"
                            >By: {{nueva.author}}</h3>
                            <span class="text-overline"> {{nueva.updated_at | fecha}} </span>
                            <br />
                            <div v-if="tagId == `descr-edit-${nueva.id}` && auth">
                                <v-textarea
                                    label="Descripción"
                                    v-model="nueva.descrip"
                                    :id="`descr-edit-${nueva.id}`"
                                    @blur="update(nueva)"
                                    @keydown.enter="update(nueva)"
                                    filled dark
                                />
                            </div>
                            <p
                                v-else
                                @dblclick="modificando($event)"
                                :data-for="`descr-edit-${nueva.id}`"
                            >{{nueva.descrip}}</p>
                        </div>
                        <img
                            id="testImg"
                            :src="`upload/${nueva.image}?rand=${rand}`"
                            @click="goNew(nueva.id)"
                            alt="ImagenBackground"
                        />
                        <button v-if="auth" class="boton flotante-izq" @click="borrar(nueva.id)">
                            <v-icon>mdi-close</v-icon>
                        </button>
                        <label v-if="auth" class="label-custom-input flotante-der" :for="`inpFile-${nueva.id}`">
                            <v-icon>mdi-image</v-icon>
                        </label>
                        <input
                            v-if="auth"
                            type="file"
                            :id="`inpFile-${nueva.id}`"
                            accept="image/x-png, image/gif, image/jpeg"
                            @change="uploadImage($event, nueva)"
                        />
                    </div>                    
                </div>
                <button 
                    v-if="auth" 
                    class="boton" 
                    @click="statusCreate = !statusCreate">
                    <v-icon>mdi-plus</v-icon>
                </button>
                <v-container v-if="statusCreate && auth" fluid class="new-content">
                    <v-card 
                        class="mx-auto">
                        <v-card-title>
                            <v-text-field
                                label="Titulo"
                                v-model="newCreate.titulo"
                                id="titulo-new"
                                filled
                            />
                        </v-card-title>
                        <v-card-subtitle>
                            <v-text-field
                                label="Autor"
                                v-model="newCreate.author"
                                id="autor-new"
                                filled
                            />
                        </v-card-subtitle>
                        <v-card-text>
                            <v-textarea
                                label="Descripcion"
                                v-model="newCreate.descrip"
                                id="descrip-new"
                                filled
                            />
                        </v-card-text>                        
                        <v-btn @click="create()">Crear!</v-btn>
                    </v-card>
                </v-container>
            </section>
        </section>
    </v-app>
</template>

<script>
import three from "../svg/three.vue";
export default {
    data() {
        return {
            news: {},
            newCreate:{
                titulo:'',
                author:'',
                descrip:'',
                image:'no-image.jpg'
            },
            tagId: "",
            rand: 1,
            statusCreate: false,
        };
    },
    methods: {
        async listar() {
            const res = await axios.get("/news");
            this.news = res.data;
        },
        async borrar(id) {
            const res = await axios.delete("/news/" + id);
            this.listar();
        },
        async update(nueva) {
            const res = await axios.put("/news/" + nueva.id, nueva);
            this.tagId = "";
            this.listar();
        },
        async create() {
            const res = await axios.post("/news", this.newCreate);
            console.log(res);
            this.statusCreate = false;
            this.listar();
        },
        modificando: function (event) {
            const atributo = event.currentTarget.getAttribute("data-for");
            this.tagId = atributo;
            setTimeout(() => {
                document.getElementById(atributo).focus();
            }, 1);
        },
        async uploadImage(event, nueva) {
            const URL = "upload/news";
            let data = new FormData();
            data.append("name", "my-picture" + nueva.id);
            data.append("file", event.target.files[0]);
            let temporal = nueva;
            let config = {
                header: {
                    "Content-Type": "image/png",
                },
            };
            await axios.post(URL, data, config).then((response) => {
                temporal.image = response.data[0];
            });            
            await this.update(temporal);
            temporal = "";
            this.rand = Date.now();
        },
        login(){
            this.$parent.login();
        },
        logout(){
            this.$parent.logout();
        },
        goNew(id){
            window.location.href = `noticias/${id}`;
        }

    },
    created() {
        this.listar();
    },
    components: {
        three,
    },
    computed:{
        auth: function(){
            if(this.user){
                return true;
            }else{
                return false;
            }
        },
    },
    props:['user']
};
</script>

<style lang="scss" scoped>
$backgroun : linear-gradient(55deg, rgba(208, 208, 208, 0.06) 0%, rgba(208, 208, 208, 0.06) 20%,rgba(55, 55, 55, 0.06) 20%, rgba(55, 55, 55, 0.06) 40%,rgba(81, 81, 81, 0.06) 40%, rgba(81, 81, 81, 0.06) 60%,rgba(208, 208, 208, 0.06) 60%, rgba(208, 208, 208, 0.06) 80%,rgba(191, 191, 191, 0.06) 80%, rgba(191, 191, 191, 0.06) 100%),linear-gradient(291deg, rgba(190, 190, 190, 0.02) 0%, rgba(190, 190, 190, 0.02) 14.286%,rgba(105, 105, 105, 0.02) 14.286%, rgba(105, 105, 105, 0.02) 28.572%,rgba(230, 230, 230, 0.02) 28.572%, rgba(230, 230, 230, 0.02) 42.858%,rgba(216, 216, 216, 0.02) 42.858%, rgba(216, 216, 216, 0.02) 57.144%,rgba(181, 181, 181, 0.02) 57.144%, rgba(181, 181, 181, 0.02) 71.42999999999999%,rgba(129, 129, 129, 0.02) 71.43%, rgba(129, 129, 129, 0.02) 85.71600000000001%,rgba(75, 75, 75, 0.02) 85.716%, rgba(75, 75, 75, 0.02) 100.002%),linear-gradient(32deg, rgba(212, 212, 212, 0.06) 0%, rgba(212, 212, 212, 0.06) 12.5%,rgba(223, 223, 223, 0.06) 12.5%, rgba(223, 223, 223, 0.06) 25%,rgba(11, 11, 11, 0.06) 25%, rgba(11, 11, 11, 0.06) 37.5%,rgba(86, 86, 86, 0.06) 37.5%, rgba(86, 86, 86, 0.06) 50%,rgba(106, 106, 106, 0.06) 50%, rgba(106, 106, 106, 0.06) 62.5%,rgba(220, 220, 220, 0.06) 62.5%, rgba(220, 220, 220, 0.06) 75%,rgba(91, 91, 91, 0.06) 75%, rgba(91, 91, 91, 0.06) 87.5%,rgba(216, 216, 216, 0.06) 87.5%, rgba(216, 216, 216, 0.06) 100%),linear-gradient(312deg, rgba(113, 113, 113, 0.01) 0%, rgba(113, 113, 113, 0.01) 14.286%,rgba(54, 54, 54, 0.01) 14.286%, rgba(54, 54, 54, 0.01) 28.572%,rgba(166, 166, 166, 0.01) 28.572%, rgba(166, 166, 166, 0.01) 42.858%,rgba(226, 226, 226, 0.01) 42.858%, rgba(226, 226, 226, 0.01) 57.144%,rgba(109, 109, 109, 0.01) 57.144%, rgba(109, 109, 109, 0.01) 71.42999999999999%,rgba(239, 239, 239, 0.01) 71.43%, rgba(239, 239, 239, 0.01) 85.71600000000001%,rgba(54, 54, 54, 0.01) 85.716%, rgba(54, 54, 54, 0.01) 100.002%),linear-gradient(22deg, rgba(77, 77, 77, 0.06) 0%, rgba(77, 77, 77, 0.06) 20%,rgba(235, 235, 235, 0.06) 20%, rgba(235, 235, 235, 0.06) 40%,rgba(215, 215, 215, 0.06) 40%, rgba(215, 215, 215, 0.06) 60%,rgba(181, 181, 181, 0.06) 60%, rgba(181, 181, 181, 0.06) 80%,rgba(193, 193, 193, 0.06) 80%, rgba(193, 193, 193, 0.06) 100%),linear-gradient(80deg, rgba(139, 139, 139, 0.02) 0%, rgba(139, 139, 139, 0.02) 14.286%,rgba(114, 114, 114, 0.02) 14.286%, rgba(114, 114, 114, 0.02) 28.572%,rgba(240, 240, 240, 0.02) 28.572%, rgba(240, 240, 240, 0.02) 42.858%,rgba(221, 221, 221, 0.02) 42.858%, rgba(221, 221, 221, 0.02) 57.144%,rgba(74, 74, 74, 0.02) 57.144%, rgba(74, 74, 74, 0.02) 71.42999999999999%,rgba(201, 201, 201, 0.02) 71.43%, rgba(201, 201, 201, 0.02) 85.71600000000001%,rgba(187, 187, 187, 0.02) 85.716%, rgba(187, 187, 187, 0.02) 100.002%),linear-gradient(257deg, rgba(72, 72, 72, 0.06) 0%, rgba(72, 72, 72, 0.06) 16.667%,rgba(138, 138, 138, 0.06) 16.667%, rgba(138, 138, 138, 0.06) 33.334%,rgba(54, 54, 54, 0.06) 33.334%, rgba(54, 54, 54, 0.06) 50.001000000000005%,rgba(161, 161, 161, 0.06) 50.001%, rgba(161, 161, 161, 0.06) 66.668%,rgba(17, 17, 17, 0.06) 66.668%, rgba(17, 17, 17, 0.06) 83.33500000000001%,rgba(230, 230, 230, 0.06) 83.335%, rgba(230, 230, 230, 0.06) 100.002%),linear-gradient(47deg, rgba(191, 191, 191, 0.01) 0%, rgba(191, 191, 191, 0.01) 16.667%,rgba(27, 27, 27, 0.01) 16.667%, rgba(27, 27, 27, 0.01) 33.334%,rgba(66, 66, 66, 0.01) 33.334%, rgba(66, 66, 66, 0.01) 50.001000000000005%,rgba(36, 36, 36, 0.01) 50.001%, rgba(36, 36, 36, 0.01) 66.668%,rgba(230, 230, 230, 0.01) 66.668%, rgba(230, 230, 230, 0.01) 83.33500000000001%,rgba(93, 93, 93, 0.01) 83.335%, rgba(93, 93, 93, 0.01) 100.002%),linear-gradient(90deg, #96caca,#96caca);
.boton {
    border: none;
    cursor: pointer;
    background: rgb(18, 53, 53);
    font-size: 1rem;
    padding: 1%;
    margin: 3%;
    border-radius: 2rem;
    box-shadow: 0 0 5px rgb(20, 34, 34);
    @media only screen and (max-width: 600px) {
        margin: 6%;
    }
}
.flotante-der {
    position: absolute;
    bottom: 0;
    right: 0;
}
.flotante-izq {
    position: absolute;
    bottom: 0;
    left: 0;
}
input[type="file"] {
    display: none;
}
.label-custom-input {
    cursor: pointer;
    background: #123535;
    color: white;
    font-size: 1rem;
    padding: 1%;
    margin: 3%;
    border-radius: 2rem;
    box-shadow: 0 0 5px rgb(20, 34, 34);
    @media only screen and (max-width: 600px) {
        margin: 6%;
    }
}
#loNuevo{
    background: $backgroun !important ;
    div{
        h1{
            color:paleturquoise !important;
        }
    }
}
</style>