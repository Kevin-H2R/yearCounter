<template>
    <v-layout column class="title-container">
        <h1 class="title-container__title">Coucou</h1>
        <v-layout v-for="(counter, index) in counters"
                  :key="index">
            <v-flex xs12 sm8 offset-sm2>
                <CounterRow v-bind="counter"/>
            </v-flex>
        </v-layout>
    </v-layout>
</template>
<script>
    import CounterRow from './CounterRow'

    export default {
        name: 'App',
        components: {
            CounterRow
        },
        props: {
            counters: {
                type: Array,
                required: true
            }
        },
        mounted: function () {
            console.log(this.$vuetify.breakpoint)
        }
    }
</script>
<style lang="scss">
    .title-container {
        &__title {
            color: red;
        }
    }
</style>