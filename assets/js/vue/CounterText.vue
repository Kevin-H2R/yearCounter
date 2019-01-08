<template>
    <v-layout column class="counter-text">
        <v-flex xs7 class="counter-text__name">{{ name }}</v-flex>
        <v-flex xs5 class="counter-text__counter">{{ count }}</v-flex>
    </v-layout>
</template>
<script>
    export default {
        name: 'CounterText',
        props: {
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
    .counter-text {
        &__name {
            font-weight: bold;
        }
        &__counter {

        }
    }
</style>