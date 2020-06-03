<template>
    <div class="modal" :class="{ 'is-active': modalIsVisible}">
        <div class="modal-background"></div>
        <div class="modal-inner">
            <div class="modal-content">
                <button class="modal-close-button" aria-label="close" @click.prevent="closeModal()"></button>
                <!-- FORM WITH v-if WILL BE SHOWN BUT THEN HIDDEN AFTER SUCCESS SUBMIT -->
                <form v-if="showForm" class="form">
                    <div class="form__description">
                        A makett igényléséhez kérlek add meg az alábbi adatokat.
                    </div>
                    <div :class="errors.name ? 'form__input-container form__input-container--no-bottom-margin' : 'form__input-container'">
                        <label for="modalNameInput" class="form__label col-md-4 col-form-label text-md-right">Név</label>
    
                        <div class="col-md-6">
                            <!-- NOTICE v-model="formData.name" - THAT'S HOW IT GETS ATTACHED TO THE FIELD -->
                            <input v-model="formData.name" id="modalNameInput" type="text" class="form__input" name="name" required autocomplete autofocus>
                            <div class="form__input-error" v-if="errors.name">{{errors.name}}</div>
                        </div>
                    </div>
    
                    <div :class="errors.email ? 'form__input-container form__input-container--no-bottom-margin' : 'form__input-container'">
                        <label for="modalEmailInput" class="form__label col-md-4 col-form-label text-md-right">E-mail cím</label>
    
                        <div class="col-md-6">
                            <!-- NOTICE v-model="formData.name" - THAT'S HOW IT GETS ATTACHED TO THE FIELD -->
                            <input v-model="formData.email" id="modalEmailInput" type="text" class="form__input" name="email" required autocomplete autofocus>
                            <div class="form__input-error" v-if="errors.email">{{errors.email}}</div>
                        </div>
                    </div>
    
                    <img :src="'/assets/svg/separator.svg'" class="form__separator">
    
                    <div :class="errors.postal ? 'form__input-container form__input-container--no-bottom-margin' : 'form__input-container'">
                        <label for="modalpostalInput" class="form__label col-md-4 col-form-label text-md-right">Irányítószám</label>
    
                        <div class="col-md-6">
                            <!-- NOTICE v-model="formData.name" - THAT'S HOW IT GETS ATTACHED TO THE FIELD -->
                            <input v-model="formData.postal" id="modalpostalInput" type="text" class="form__input" name="postal" required autocomplete autofocus>
                            <div class="form__input-error" v-if="errors.postal">{{errors.postal}}</div>
                        </div>
                    </div>
    
                    <div :class="errors.city ? 'form__input-container form__input-container--no-bottom-margin' : 'form__input-container'">
                        <label for="modalCityInput" class="form__label col-md-4 col-form-label text-md-right">Település</label>
    
                        <div class="col-md-6">
                            <!-- NOTICE v-model="formData.name" - THAT'S HOW IT GETS ATTACHED TO THE FIELD -->
                            <input v-model="formData.city" id="modalCityInput" type="text" class="form__input" name="city" required autocomplete autofocus>
                            <div class="form__input-error" v-if="errors.city">{{errors.city}}</div>
                        </div>
                    </div>
    
                    <div class="form__input-container form__input-container--last-centered">
                        <label for="modaladdressInput" class="form__label col-md-4 col-form-label text-md-right">Utca, házszám</label>
    
                        <div class="col-md-6">
                            <!-- NOTICE v-model="formData.name" - THAT'S HOW IT GETS ATTACHED TO THE FIELD -->
                            <input v-model="formData.address" id="modaladdressInput" type="text" class="form__input" name="address" required autocomplete autofocus>
                            <div class="form__input-error" v-if="errors.address">{{errors.address}}</div>
                        </div>
                    </div>
                        <div class="form__input-container form__input-container--full-width ">
                        <label class="form__label form__label--checkbox">Megismertem, és elfogadom a <a @click.self.prevent="download(`docs/kajla-makett-mese-jatekszabalyzat.pdf`)">jatékszabályzatot és az adatkezelési tájékoztatót</a>
                    <input v-model="formData.terms" type="checkbox" class="form__checkbox" name="terms" value="1">
                    <span class="form__checkmark"></span>
                  </label>
                        <div class="form__input-error" v-if="errors.terms">{{errors.terms}}</div>
                    </div>

                    <div v-if="errors.length > 0" class="form__error-container">
                        <div v-for="(error, index) in errors" :key="index" class="form__error alert alert-danger">{{ error }}</div>
                    </div>
    
                    <div class="form__input-container form__input-container--full-width form__input-container--horizontal-centered form__input-container--bottom-offset">
                        <div class="col-md-6 offset-md-4 column">
                            <button @click.prevent="submit" type="submit" class="btn button is-secondary upload" :disabled="isLoading">
                  Küldés
                </button>
                        </div>
                    </div>
                </form>
    
                <div v-if="upload" class="modal-success yellow-box">
                    <div class="yellow-box__inner">
                        <img class="modal-success-icon" :src="'/assets/svg/success-icon.svg'" alt="">
                        <div class="modal-success-header">A megadott e-mail címre küldtünk egy megerősítő e-mailt. <br>Kérünk, az igénylés véglegesítéséhez kattints a levélben lévő linkre!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import store from '../store.js';

import axios from 'axios'
import _ from 'lodash'

export default {
    props: {
        isOpen: Boolean,
        default: false,
    },
    data() {
        return {
            formData: {
                name: null,
                email: null,
                postal: null,
                city: null,
                terms: false,
                address: null,
            },
            showForm: true,
            upload: null,
            errors: {},
            isLoading: false
        }
    },
    methods: {
        submit() {
            this.errors = {}

            const isFromOk = this.checkForm();

            if (isFromOk) {
                let formData = new FormData()
                formData.append('picture', this.picture)
                    this.isLoading = true;

                _.each(this.formData, (value, key) => {
                    formData.append(key, value)
                })
                axios.post('/api/kit-request', formData, {
                    headers: {
                        'Content-Type': "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2)
                    }
                }).then(response => {
                    this.showForm = false
                    this.upload = response.data
                    this.isLoading = false;

                }).catch(err => {
                    if (err.response.status === 422) {
                        this.errors = {}

                        for (let [key, value] of Object.entries(err.response.data.errors)) {
                            this.errors[key] = value[0]
                        }

                    }

                    this.isLoading = false;

                });
            } else {
                return;
            }
        },

        checkForm() {
            this.errors = {};

            if (!this.formData.name) {
                this.errors.name = 'Kötelezően kitöltendő';
            }
            if (!this.formData.email) {
                this.errors.email = 'Kötelezően kitöltendő';
            }
            if (this.formData.email && !this.emailIsValid(this.formData.email)) {
                this.errors.email = 'Nem megfelelő e-mail cím';
            }
            if (!this.formData.postal) {
                this.errors.postal = 'Kötelezően kitöltendő';
            }
            if (this.formData.postal && !this.postcodeIsValid(this.formData.postal)) {
                this.errors.postal = 'Nem megfelelő irányítószám';
            }
            if (!this.formData.city) {
                this.errors.city = 'Kötelezően kitöltendő';
            }
            if (!this.formData.address) {
                this.errors.address = 'Kötelezően kitöltendő';
            }
            if (!this.formData.terms) {
                this.errors.terms = 'Nem fogadtad el a feltételeket';
            }


            if (Object.keys(this.errors).length === 0) {
                return true;
            } else {
                return false;
            }
        },

        resetForm() {
            this.formData = {
                name: null,
                email: null,
                postal: null,
                city: null,
                terms: null,
                address: null,
            }
            this.showForm = true,
                this.upload = null,
                this.errors = []
        },

        emailIsValid(email) {
            const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return emailRegex.test(email);
        },

        postcodeIsValid(postcode) {
            const postcodeRegex = /^[0-9]{4}?$/;
            return postcodeRegex.test(postcode);
        },


        closeModal() {
            this.resetForm()
            this.$emit('onClose')
        },
        download: function (url) {   
          window.open(url, "_blank");    
        }

    },
    computed: {
        modalIsVisible() {
            return store.kitRequestModalIsVisible
        }
    }

}
</script>
