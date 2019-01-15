<template>
    <v-layout justify-center>
        <v-flex xs12 sm6 md4>
            <v-form v-model="valid" @submit="submit" onSubmit="return false;"
                    ref="form"
            >
                <v-card class="card-form">
                    <v-container fluid class="card-form__container">
                        <v-layout align-center>
                            <v-flex xs9 offset-xs1>
                                <v-text-field
                                        v-model="name"
                                        :rules="nameRules"
                                        label="Name"
                                        required
                                ></v-text-field>
                            </v-flex>
                            <v-flex xs1>
                                <v-card-actions>
                                    <v-btn id="submit-new-counter-button"
                                           fab small type="submit" color="success"
                                           :disabled="!valid"
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
    import {EventBus} from "../event-bus"
    import axios from 'axios'

    export default {
        name: 'new-counter-form',
        watch: {
            name: function () {
            }
        },
        methods: {
            submit: function () {
                this.valid = false
                EventBus.$emit('new-counter-loading');
                let that = this
                axios.post('http://localhost:8000/new-counter', {'name': this.name}).then(function (response) {
                    that.$refs.form.reset()
                    EventBus.$emit('new-counter-added', response.data)
                })
            }
        },
        data: () => ({
            valid: false,
            name: '',
            nameRules: [
                v => !!v || 'Name is required'
            ]
        })
    }
</script>
<style lang="scss">

</style>