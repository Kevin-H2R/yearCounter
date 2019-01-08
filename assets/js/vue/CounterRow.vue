<template>
    <v-card class="counter-row">
        <v-container class="counter-row__container">
            <v-layout align-center justify-center>
                <v-flex xs2>
                    <v-btn flat icon color="primary">
                        <v-icon dark>remove</v-icon>
                    </v-btn>
                </v-flex>
                <v-flex xs8 class="counter-row__text">
                    <CounterText :name="name" :count="count"/>
                </v-flex>
                <v-flex xs2 class="counter-row__right-button">
                    <v-btn flat icon color="primary">
                        <v-icon dark>add</v-icon>
                    </v-btn>
                </v-flex>
            </v-layout>
        </v-container>
    </v-card>
</template>
<script>
    import CounterText from './CounterText'

    export default {
        name: 'CounterRow',
        components: {CounterText},
        props: {
            id: {
                type: Number,
                required: true
            },
            name: {
                type: String,
                required: true
            },
            count: {
                type: Number,
                required: true
            }
        }
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
        &__right-button {
            text-align: right;
        }
    }
</style>