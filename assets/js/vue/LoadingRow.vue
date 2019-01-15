<template>
    <v-card class="loading-row">
    </v-card>
</template>
<script>
    export default {
        name: 'loading-row'
    }
</script>
<style lang="scss">

    @keyframes flickerAnimation {
        0% {
            opacity: 1;
        }
        50% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .loading-row {
        height: 58px;
        animation: flickerAnimation 1s infinite;
    }
</style>