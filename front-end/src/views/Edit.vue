<template>
  <v-container>
    <v-card class="mx-auto mt-10 pa-3" max-width="500">    
      <p class="text-center subtitle grey--text text--darken-2 ">Edit the student's data</p>
      <v-form>

        <!-- name -->
        <v-text-field
          outlined
          label="Name"
          prepend-icon="mdi-account"
          v-model="student.name"
          ref="name"
          @blur="validate"
          :error-messages="errMsg"
          :append-icon="appendIcon"          
        />

        <!-- major -->
        <v-text-field
          outlined
          label="Major"
          prepend-icon="mdi-bookshelf"
          v-model="student.major"
        />

        <!-- GPA -->
        <v-text-field
          outlined
          label="GPA"
          prepend-icon="mdi-numeric"
          v-model="student.GPA"
        />

        <!-- submit button -->
        <v-btn 
          x-large 
          block 
          color="orange lighten-2" 
          class="grey--text text--darken-2 text-capitalize" 
          @click="submit"
        >Submit →</v-btn>          
      </v-form>
    </v-card>
  </v-container>
</template>

<script>
  import store from '@/store.js'
  import apiClient from '@/apiClient.js'
  import router from '@/router/index.js'
  
  export default {
    props: ["id"],
    data() {
      return {
        student: {},
        appendIcon: '',
        errMsg: ''
      }
    },
    methods: {
      validate() {
        console.log('validate() name='+this.name)
        if (this.student.name.length == 0) {
          // empty
          this.appendIcon = 'mdi-exclamation'
          this.errMsg = "Please enter the student's name."
          console.log('validation failure')
          return false
        }
        else {
          // ok
          this.appendIcon = 'mdi-check'
          this.errMsg = ''
          console.log('validation success')
          return true
        }
      },
      submit() {
        console.log('submit()')
        if (this.validate()) {
          store.id = this.student.id
          store.name = this.student.name
          store.major = this.student.major
          store.GPA = this.student.GPA
          console.log('editting name='+store.name+' major='+store.major+' GPA='+store.GPA)
          apiClient.edit()
          this.name = ''
          this.major = ''
          this.GPA = ''
          router.push({ path:'/list' })
        }
      },      
    },
    mounted() {
      this.student = store.getStudent(this.id)
      console.log('got student:'+this.student.id + ' ' + this.student.name + ' ' + this.student.major)
      this.$refs.name.focus()
    }
  }
</script>