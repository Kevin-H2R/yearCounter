<template>
    <v-layout column class="main-container">
        <v-layout v-for="(counter, index) in counterArray" class="main-container__counter"
                  :key="index">
            <v-flex xs12 sm8 offset-sm2>
                <CounterRow v-bind="counter"/>
            </v-flex>
        </v-layout>
        <v-layout class="layout main-container__counter" v-if="loading">
            <v-flex xs12 sm8 offset-sm2>
                <LoadingRow/>
            </v-flex>
        </v-layout>
    </v-layout>
</template>
<script>
    import CounterRow from './CounterRow'
    import {EventBus} from "../event-bus"
    import LoadingRow from './LoadingRow'


    export default {
        name: 'App',
        components: {
            CounterRow,
            LoadingRow
        },
        props: {
            counters: {
                type: Array,
                required: true
            }
        },
        created: function () {
            EventBus.$on('new-counter-loading', () => {
                this.loading = true
            });
            EventBus.$on('new-counter-added', (newCounter) => {
                this.counterArray.push(JSON.parse(newCounter))
                this.loading = false
            })
        },
        data: function () {
            return {
                counterArray: this.counters,
                loading: false
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