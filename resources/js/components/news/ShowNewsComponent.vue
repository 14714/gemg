<template>
    <v-app class="fondo">
        <v-card :loading="loading" class="my-12 mx-12">
            <v-responsive :aspect-ratio="16/9">
                        <template slot="progress">
                            <v-progress-linear color="deep-purple" height="10" indeterminate></v-progress-linear>
                        </template>

                        <v-parallax
                            height="250"                    
                            :src="`../upload/${noticia.image}`"
                        ></v-parallax>

                        <v-card-title>{{noticia.titulo}}</v-card-title>

                        <v-card-text>
                            <v-row align="center" class="mx-0">
                                <v-rating
                                    :value="4.5"
                                    color="amber"
                                    dense
                                    half-increments
                                    readonly
                                    size="14"
                                ></v-rating>

                                <div class="grey--text ms-4">4.5 (413)</div>
                            </v-row>

                            <div class="my-4 text-subtitle-1">Author: {{noticia.author}} </div>

                            <div> {{noticia.descrip}} </div>
                        </v-card-text>

                        <v-divider class="mx-4"></v-divider>

                        <v-card-actions>
                            <v-btn color="deep-purple lighten-2" text >
                                <v-icon>mdi-heart</v-icon>
                            </v-btn>
                            <v-btn color="grey" text >
                                <v-icon>mdi-thumb-down</v-icon>
                            </v-btn>
                        </v-card-actions>
            </v-responsive>
        </v-card>
    </v-app>
</template>
            </v-responsive>
        </v-card>
    </v-app>
</template>

<script>
export default {
    props: ["noticia"],
};
</script>

<style lang="scss" scoped>
$backgroun : linear-gradient(55deg, rgba(208, 208, 208, 0.06) 0%, rgba(208, 208, 208, 0.06) 20%,rgba(55, 55, 55, 0.06) 20%, rgba(55, 55, 55, 0.06) 40%,rgba(81, 81, 81, 0.06) 40%, rgba(81, 81, 81, 0.06) 60%,rgba(208, 208, 208, 0.06) 60%, rgba(208, 208, 208, 0.06) 80%,rgba(191, 191, 191, 0.06) 80%, rgba(191, 191, 191, 0.06) 100%),linear-gradient(291deg, rgba(190, 190, 190, 0.02) 0%, rgba(190, 190, 190, 0.02) 14.286%,rgba(105, 105, 105, 0.02) 14.286%, rgba(105, 105, 105, 0.02) 28.572%,rgba(230, 230, 230, 0.02) 28.572%, rgba(230, 230, 230, 0.02) 42.858%,rgba(216, 216, 216, 0.02) 42.858%, rgba(216, 216, 216, 0.02) 57.144%,rgba(181, 181, 181, 0.02) 57.144%, rgba(181, 181, 181, 0.02) 71.42999999999999%,rgba(129, 129, 129, 0.02) 71.43%, rgba(129, 129, 129, 0.02) 85.71600000000001%,rgba(75, 75, 75, 0.02) 85.716%, rgba(75, 75, 75, 0.02) 100.002%),linear-gradient(32deg, rgba(212, 212, 212, 0.06) 0%, rgba(212, 212, 212, 0.06) 12.5%,rgba(223, 223, 223, 0.06) 12.5%, rgba(223, 223, 223, 0.06) 25%,rgba(11, 11, 11, 0.06) 25%, rgba(11, 11, 11, 0.06) 37.5%,rgba(86, 86, 86, 0.06) 37.5%, rgba(86, 86, 86, 0.06) 50%,rgba(106, 106, 106, 0.06) 50%, rgba(106, 106, 106, 0.06) 62.5%,rgba(220, 220, 220, 0.06) 62.5%, rgba(220, 220, 220, 0.06) 75%,rgba(91, 91, 91, 0.06) 75%, rgba(91, 91, 91, 0.06) 87.5%,rgba(216, 216, 216, 0.06) 87.5%, rgba(216, 216, 216, 0.06) 100%),linear-gradient(312deg, rgba(113, 113, 113, 0.01) 0%, rgba(113, 113, 113, 0.01) 14.286%,rgba(54, 54, 54, 0.01) 14.286%, rgba(54, 54, 54, 0.01) 28.572%,rgba(166, 166, 166, 0.01) 28.572%, rgba(166, 166, 166, 0.01) 42.858%,rgba(226, 226, 226, 0.01) 42.858%, rgba(226, 226, 226, 0.01) 57.144%,rgba(109, 109, 109, 0.01) 57.144%, rgba(109, 109, 109, 0.01) 71.42999999999999%,rgba(239, 239, 239, 0.01) 71.43%, rgba(239, 239, 239, 0.01) 85.71600000000001%,rgba(54, 54, 54, 0.01) 85.716%, rgba(54, 54, 54, 0.01) 100.002%),linear-gradient(22deg, rgba(77, 77, 77, 0.06) 0%, rgba(77, 77, 77, 0.06) 20%,rgba(235, 235, 235, 0.06) 20%, rgba(235, 235, 235, 0.06) 40%,rgba(215, 215, 215, 0.06) 40%, rgba(215, 215, 215, 0.06) 60%,rgba(181, 181, 181, 0.06) 60%, rgba(181, 181, 181, 0.06) 80%,rgba(193, 193, 193, 0.06) 80%, rgba(193, 193, 193, 0.06) 100%),linear-gradient(80deg, rgba(139, 139, 139, 0.02) 0%, rgba(139, 139, 139, 0.02) 14.286%,rgba(114, 114, 114, 0.02) 14.286%, rgba(114, 114, 114, 0.02) 28.572%,rgba(240, 240, 240, 0.02) 28.572%, rgba(240, 240, 240, 0.02) 42.858%,rgba(221, 221, 221, 0.02) 42.858%, rgba(221, 221, 221, 0.02) 57.144%,rgba(74, 74, 74, 0.02) 57.144%, rgba(74, 74, 74, 0.02) 71.42999999999999%,rgba(201, 201, 201, 0.02) 71.43%, rgba(201, 201, 201, 0.02) 85.71600000000001%,rgba(187, 187, 187, 0.02) 85.716%, rgba(187, 187, 187, 0.02) 100.002%),linear-gradient(257deg, rgba(72, 72, 72, 0.06) 0%, rgba(72, 72, 72, 0.06) 16.667%,rgba(138, 138, 138, 0.06) 16.667%, rgba(138, 138, 138, 0.06) 33.334%,rgba(54, 54, 54, 0.06) 33.334%, rgba(54, 54, 54, 0.06) 50.001000000000005%,rgba(161, 161, 161, 0.06) 50.001%, rgba(161, 161, 161, 0.06) 66.668%,rgba(17, 17, 17, 0.06) 66.668%, rgba(17, 17, 17, 0.06) 83.33500000000001%,rgba(230, 230, 230, 0.06) 83.335%, rgba(230, 230, 230, 0.06) 100.002%),linear-gradient(47deg, rgba(191, 191, 191, 0.01) 0%, rgba(191, 191, 191, 0.01) 16.667%,rgba(27, 27, 27, 0.01) 16.667%, rgba(27, 27, 27, 0.01) 33.334%,rgba(66, 66, 66, 0.01) 33.334%, rgba(66, 66, 66, 0.01) 50.001000000000005%,rgba(36, 36, 36, 0.01) 50.001%, rgba(36, 36, 36, 0.01) 66.668%,rgba(230, 230, 230, 0.01) 66.668%, rgba(230, 230, 230, 0.01) 83.33500000000001%,rgba(93, 93, 93, 0.01) 83.335%, rgba(93, 93, 93, 0.01) 100.002%),linear-gradient(90deg, #96caca,#96caca);
.fondo{
    background: $backgroun;
}
</style>