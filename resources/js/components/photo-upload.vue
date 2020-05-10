<template>

<div class="modal is-active">
  <div class="modal-background"></div>
  <div class="modal-content">
            <div v-if="errors">
              <div v-for="error in errors" class="alert alert-danger">{{ error }}</div>
            </div>

            <!-- FORM WITH v-if WILL BE SHOWN BUT THEN HIDDEN AFTER SUCCESS SUBMIT -->
            <form v-if="showForm">

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">FirstName</label>

                <div class="col-md-6">
                  <!-- NOTICE v-model="formData.name" - THAT'S HOW IT GETS ATTACHED TO THE FIELD -->
                  <input v-model="formData.firstname" id="name" type="text" class="form-control" name="firstname" required autocomplete="name" autofocus>
                </div>
              </div>

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">LastName</label>

                <div class="col-md-6">
                  <!-- NOTICE v-model="formData.name" - THAT'S HOW IT GETS ATTACHED TO THE FIELD -->
                  <input v-model="formData.lastname" id="name" type="text" class="form-control" name="lastname" required autocomplete="name" autofocus>
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Address</label>

                <div class="col-md-6">
                  <!-- NOTICE v-model="formData.name" - THAT'S HOW IT GETS ATTACHED TO THE FIELD -->
                  <input v-model="formData.address" id="name" type="text" class="form-control" name="address" required autocomplete="name" autofocus>
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Telephone</label>

                <div class="col-md-6">
                  <!-- NOTICE v-model="formData.name" - THAT'S HOW IT GETS ATTACHED TO THE FIELD -->
                  <input v-model="formData.telephone" id="name" type="text" class="form-control" name="telephone" required autocomplete="name" autofocus>
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                <div class="col-md-6">
                  <input v-model="formData.email" id="email" type="email" class="form-control" name="email" required autocomplete="email">
                </div>
              </div>


              <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Photo</label>
                <div class="col-md-6">
                  <div class="custom-file">
                    <!-- MOST IMPORTANT - SEE "ref" AND "@change" PROPERTIES -->
                    <input type="file" class="custom-file-input" id="customFile" 
                        ref="file" @change="handleFileObject()">
                    <label class="custom-file-label text-left" for="customFile">{{ picture }}</label>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button @click.prevent="submit" type="submit" class="btn btn-primary" >
                    Register
                  </button>
                </div>
              </div>
            </form>

            <div v-if="upload">
              <div class="alert alert-success">Thank You!</div>
              <div>
                <img height="100px" width="auto" :src="upload.picture_url" alt="">
              </div>
              <div>Name : {{ upload.lastname }} {{ upload.firstname }} </div>
              <div>Email : {{ upload.email }}</div>
            </div>  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>



</template>

<script>

  import axios from 'axios'
  import _ from 'lodash'

  export default {
    data() {
      return {
        formData: {
          firstname: null,
          email: null,
          lastname: null,
        },
        picture: null,
        showForm: true,
        upload: null,
        errors: null,
      }
    },
    methods: {
      submit() {
        this.errors = null

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
      },

      handleFileObject() {
        this.picture = this.$refs.file.files[0]
      }
    }

  }

</script>
