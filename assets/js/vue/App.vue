<template>
    <v-layout column jusitfy-start class="app-container">
        <v-flex shrink class="app-container__new-counter">
            <NewCounterForm/>
        </v-flex>
        <v-flex>
            <v-layout wrap justify-center>
                <v-flex xs12 sm8 md5
                        v-for="(counter, index) in counterArray"
                        :key="index"
                        class="app-container__counter"
                >
                    <CounterRow v-bind="counter"/>
                </v-flex>
                <v-flex xs12 sm8 md5 class="app-container__counter" v-if="loading">
                    <LoadingRow/>
                </v-flex>
            </v-layout>
        </v-flex>
    </v-layout>
</template>
<script>
    import CounterRow from './CounterRow'
    import {EventBus} from "../event-bus"
    import LoadingRow from './LoadingRow'
    import NewCounterForm from './NewCounterForm'

    export default {
        name: 'App',
        components: {
            CounterRow,
            LoadingRow,
            NewCounterForm
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
    .app-container {
        &__new-counter {
            margin-bottom: 2%;
        }
        &__counter {
            margin: 2px 4px;
        }
    }
</style>