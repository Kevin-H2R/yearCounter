<template>
    <v-layout column class="main-container">
        <v-layout v-for="(counter, index) in counterArray" class="main-container__counter"
                  :key="index">
            <v-flex xs12 sm8 offset-sm2>
                <CounterRow v-bind="counter"/>
            </v-flex>
        </v-layout>
    </v-layout>
</template>
<script>
    import CounterRow from './CounterRow'
    import {EventBus} from "../event-bus";

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
        created: function () {
            EventBus.$on('new-counter-added', (newCounter) => {
                this.counterArray.push(JSON.parse(newCounter))
            })
        },
        data: function () {
            return {
                counterArray: this.counters
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