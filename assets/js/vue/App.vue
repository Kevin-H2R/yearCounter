<template>
    <div class="title-container">
        <h1 class="title-container__title">Coucou</h1>
        <span v-for="(counter, index) in counters" :key="index">
            <CounterRow v-bind="counter"/>
        </span>
    </div>
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
    .title-container {
        &__title {
            color: red;
        }
    }
</style>