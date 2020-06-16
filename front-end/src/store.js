import Vue from 'vue'

const store = Vue.observable({ 
  /* --- state variables --- */
  id: '',
  name: '',
  major: '',
  GPA: '',
  students: [],

  /* --- methods ---- */
  getStudent(id) {
    for (var index = 0; index < this.students.length; index++) { 
      if (id == this.students[index].id) {
        console.log('found student='+this.students[index]);
        return this.students[index]
      }
    } 
  },
  deleteStudent(id) {
    for (var i = 0; i < this.students.length; i++) { 
      if (this.students[i].id == id) { 
        this.students.splice(i, 1); 
      }
    } 
  }
})

export default store;