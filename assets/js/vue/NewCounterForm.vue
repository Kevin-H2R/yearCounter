<template>
    <v-layout>
        <v-flex xs12 sm6 offset-sm3>
            <v-form>
                <v-card class="card-form">
                    <v-container fluid class="card-form__container">
                        <v-layout align-center>
                            <v-flex xs9 offset-xs1>
                                <v-text-field></v-text-field>
                            </v-flex>
                            <v-flex xs1>
                                <v-card-actions>
                                    <v-btn id="submit-new-counter-button"
                                           fab small type="submit" color="success"
                                           disabled
                                    >
                                        <v-icon dark>check</v-icon>
                                    </v-btn>
                                </v-card-actions>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card>
            </v-form>
        </v-flex>
    </v-layout>
</template>
<script>
    export default {
        name: 'new-counter-form'
    }
</script>
<style lang="scss">

</style>