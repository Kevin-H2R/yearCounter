<template>
    <v-layout column class="main-container">
        <v-layout v-for="(counter, index) in counters" class="main-container__counter"
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
        }
    }
</script>
<style lang="scss">
    .main-container {
        &__counter {
            margin: 4px 0;
        }
    }
</style>