<template>

<div class="modal" :class="{ 'is-active': modalIsVisible}">
  <div class="modal-background"></div>
  <div class="modal-inner">
    <div class="modal-content">
      <button class="modal-close-button" aria-label="close" @click.prevent="closeModal()"></button>
      <!-- FORM WITH v-if WILL BE SHOWN BUT THEN HIDDEN AFTER SUCCESS SUBMIT -->
      <form v-if="showForm" class="form">
        <div class="form__description">
          A kép feltöltéséhez kérlek add meg a neved, e-mail címed és feltöltött kép címét
        </div>
        <div class="form__input-container">
          <label for="modalNameInput" class="form__label col-md-4 col-form-label text-md-right">Név</label>

          <div class="col-md-6">
            <!-- NOTICE v-model="formData.name" - THAT'S HOW IT GETS ATTACHED TO THE FIELD -->
            <input v-model="formData.name" id="modalNameInput" type="text" class="form__input" name="name" required autocomplete autofocus>
          </div>
        </div>

        <div class="form__input-container">
          <label for="modalEmailInput" class="form__label col-md-4 col-form-label text-md-right">E-mail cím</label>

          <div class="col-md-6">
            <!-- NOTICE v-model="formData.name" - THAT'S HOW IT GETS ATTACHED TO THE FIELD -->
            <input v-model="formData.email" id="modalEmailInput" type="text" class="form__input" name="email" required autocomplete autofocus>
          </div>
        </div>
        <div class="form__input-container form__input-container--full-width">
          <label for="modalImageTitleInput" class="form__label col-md-4 col-form-label text-md-right">Kép címe</label>

          <div class="col-md-6">
            <!-- NOTICE v-model="formData.name" - THAT'S HOW IT GETS ATTACHED TO THE FIELD -->
            <input v-model="formData.caption" id="modalImageTitleInput" type="text" class="form__input form__input--full-width" name="caption" required autocomplete autofocus>
          </div>
        </div>
        <div class="form__input-container form__input-container--full-width">
          <label class="form__label form__label--checkbox">Megismertem, és elfogadom a jatékszabályzatot és az adatkezelési tájékoztatót
            <input v-model="formData.terms" type="checkbox" class="form__checkbox" name="terms" value="1">
            <span class="form__checkmark"></span>
          </label>
        </div>

        <div v-if="errors.length > 0">
          <div v-for="(error, index) in errors" :key="index" class="form__error alert alert-danger">{{ error }}</div>
        </div>

        <div class="form__input-container form__input-container--full-width form__input-container--horizontal-centered">
          <div class="col-md-6">
            <div class="custom-file">
              <!-- MOST IMPORTANT - SEE "ref" AND "@change" PROPERTIES -->
              <input type="file" class="custom-file-input form__input--hidden" id="customFile" 
                  ref="file" @change="handleFileObject()">
              <label class="form__input-button-container custom-file-label text-left" for="customFile">
                <img class="form__input-button" src="/assets/svg/button-primary-picture.svg"/>
                <div class="form__image-preview-container">
                  <img v-if="picture" :src="pictureUrl" class="form__image-preview">
                </div>
                </label>
            </div>
          </div>
        </div>

        <div class="form__input-container form__input-container--full-width form__input-container--horizontal-centered form__input-container--bottom-offset">
          <div class="col-md-6 offset-md-4 column">
            <button @click.prevent="submit" type="submit" class="btn button is-secondary upload" >
            </button>
          </div>
        </div>
      </form>

      <div v-if="upload">
        <div class="alert alert-success">Thank You!</div>
        <div>
          <img height="100px" width="auto" :src="upload.picture_url" alt="">
        </div>
        <div>Name : {{ upload.name }}</div>
        <div>Email : {{ upload.email }}</div>
      </div>
    </div>
  </div>
</div>



</template>

<script>

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
          terms: true,
          caption: null,
        },
        picture: null,
        pictureUrl: null,
        showForm: true,
        upload: null,
        uploadWasSuccess: null,
        errors: [],
      }
    },
    methods: {
      submit() {
        this.errors = []

        const isFromOk = this.checkForm();

        if (isFromOk) {
          let formData = new FormData()
          formData.append('picture', this.picture)

          _.each(this.formData, (value, key) => {
            formData.append(key, value)
          })
          axios.post('/api/upload-photo', formData, {
              headers: {
                'Content-Type': "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2)
              }
            }
          ).then(response => {
            this.showForm = false 
            this.upload = response.data.data
          }).catch(err => {
            if (err.response.status === 422) {
              this.errors = []

              _.each(err.response.data.errors, error => {
                _.each(error, e => {
                  this.errors.push(e)
                })
              })

            }
          });
        } else {
          return;
        }
      },

      checkForm() {
        this.errors = [];

        if (!this.formData.name) {
          this.errors.push("Név megadása kötelező");
        }
        if (!this.formData.email) {
          this.errors.push('E-mail cím megadása kötelező.');
        } else if (!this.validEmail(this.formData.email)) {
          this.errors.push('Nem megfelelő e-mail cím.');
        }
        if(!this.formData.terms) {
          this.errors.push("A játékszabályzat és az adatkezelési tájékoztató elfogadása kötelező.");
        }
        if(!this.picture) {
          this.errors.push("Nem adtál hozzá képet");
        }

        if (!this.errors.length) {
          return true;
        } else {
          return false;
        }
      },

      resetForm() {
        this.formData = {
          name: null,
          email: null,
          terms: true,
          caption: null,
        }
        this.picture = null,
        this.pictureUrl = null,
        this.showForm = true,
        this.upload = null,
        this.errors = []
      },

      validEmail(email) {
      const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return emailRegex.test(email);
      },

      handleFileObject() {
        this.picture = this.$refs.file.files[0]
        this.pictureUrl = URL.createObjectURL(this.picture);
      },
      closeModal() {
        this.resetForm()
        this.$emit('onClose')
      }
    },
    computed: {
      modalIsVisible() {
        return this.isOpen
      }
    }

  }

</script>
