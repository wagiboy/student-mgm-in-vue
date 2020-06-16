<template>
  <v-container>
    <v-row>
      <v-col 
        xs="12" 
        sm="6" 
        md="4" 
        lg="3" 
        xl="2" 
        v-for="student in students"
        :key="student.id"
      >
        <v-card class="ma-3" >
          <v-card-title class="orange lighten-1">
            <div class="grey--text">{{ student.name }}</div>          
          </v-card-title>
          <v-card-text class="text-center pt-4">
            <div class="grey--text">{{ student.id }}</div>
            <div class="grey--text">{{ student.major }}</div>            
            <div class="grey--text">{{ student.GPA }}</div>            
          </v-card-text>
          <v-card-actions>
            <v-btn text :to="`/edit/${student.id}`">
              <v-icon small left>mdi-pencil</v-icon>
              <span>edit</span>
            </v-btn>
            <v-spacer></v-spacer>
            <v-btn @click="deleteStudent(student.id)" text>
              <v-icon small left>mdi-delete</v-icon>
              <span>delete</span>
            </v-btn>           
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  import store from '@/store.js' 
  import apiClient from '@/apiClient.js' 

  export default {
    created() {
      apiClient.list()  
    },
    computed: {
      students() {
        return store.students
      }
    },
    methods: {
      deleteStudent(id) {
        console.log("deleting student with id="+id)
        apiClient.delete(id)
        store.deleteStudent(id)
      }
    }    
  }
</script>
