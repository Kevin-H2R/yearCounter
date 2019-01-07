<template>
    <!--<v-app>-->
    <!--<v-content>-->
    <!--<v-container>-->
    <div class="title-container">
        <h1 class="title-container__title">Coucou</h1>
        <CounterRow/>
    </div>
    <!--</v-container>-->
    <!--</v-content>-->
    <!--</v-app>-->
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