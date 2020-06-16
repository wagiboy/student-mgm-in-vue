import axios from 'axios'
import store from '@/store.js'

const apiClient = axios.create({
  baseURL: 'http://127.0.0.1/api/student',
  withCredentials: false,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json'
  }
})

export default {
  /* ---------------------------------------------------------------
   * gets all students to list
   * --------------------------------------------------------------- */
  async list() {
    try {
      // console.log('apiClient::list()')      
      const response = await apiClient.get('/list')
      if (response.data.status == 'error') {
        console.log("axios response.status='error' upon GET /list. errmsg='" + response.data.errmsg+"'")
      } 
      else {
        // console.log("response: " + JSON.stringify(response))   
        store.students = response.data
        console.log("success GET /list")
      }
    }
    catch (error) {
      console.log("Caught exception in GET /list " + error.response)
    }
  },

  /* -------------------
   * POST create  
   * ------------------- */
  async create() {
    try {
      let payload = {
        name: store.name,
        major: store.major,
        GPA: store.GPA
      }
      console.log('apiClient.create()')
      const response = await apiClient.post('/create', payload)
      // console.log("response: " + JSON.stringify(response))
      if (response.data.status == 'error') {
        console.log("axios response.status='error' upon POST /create. errmsg='" + response.data.errmsg+"'")
        console.log("response: " + JSON.stringify(response))
      } 
      else {
        console.log('success POST /create')
      }
    } 
    catch (error) {
      console.log("Caught exception in POST /create: " + error.response)    
    }    
  },

  /* -------------------
   * POST edit  
   * ------------------- */
  async edit() {
    try {
      let payload = {
        id: store.id,
        name: store.name,
        major: store.major,
        GPA: store.GPA
      }
      const response = await apiClient.post('/edit', payload)
      if (response.data.status == 'error') {
        console.log("axios response.status='error' upon POST /edit. errmsg='" + response.data.errmsg+"'")
        console.log("response: " + JSON.stringify(response))
      }
      else {
        console.log('success POST /edit')
      }
    } 
    catch (error) {
      console.log("Caught exception in POST /edit: " + error.response)    
    }    
  },

  /* -------------------
   * POST delete
   * ------------------- */
  async delete(id) {
    try {
      console.log('apiClient::delete() id='+id)  
      let payload = {
          id: id
      }            
      const response = await apiClient.post('/delete', payload)
      if (response.data.status == 'error') {
        console.log("axios response.status='error' upon POST /delete. errmsg='" + response.data.errmsg+"'")
        console.log("response: " + JSON.stringify(response))
      } 
      else {
        console.log('success POST /delete')
      }      
    }
    catch(error) {
      console.log("Error posting /delete. " + error.response)
    }
  }
}
