<template>
    <v-layout>
        <v-flex xs12 sm6 offset-sm3>
            <v-card class="counter-row">
                <v-container class="counter-row__container">
                    <v-layout align-center justify-center>
                        <v-flex xs1>
                            <v-btn fab dark small color="primary">
                                <v-icon dark>remove</v-icon>
                            </v-btn>
                        </v-flex>
                        <v-flex xs10 class="counter-row__text">
                            <CounterText/>
                        </v-flex>
                        <v-flex xs1>
                            <v-btn fab dark small color="primary">
                                <v-icon dark>add</v-icon>
                            </v-btn>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-card>
        </v-flex>
    </v-layout>
</template>
<script>
    import CounterText from './CounterText'

    export default {
        name: 'CounterRow',
        components: {CounterText}
    }
</script>
<style lang="scss">
    .counter-row {
        &__container {
            padding: 5px 10px !important;
        }
        &__text {
            text-align: center;
        }
    }
</style>