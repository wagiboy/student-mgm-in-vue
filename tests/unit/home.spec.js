import { shallowMount } from '@vue/test-utils'
import { mount } from '@vue/test-utils'

import Vue from "vue"; 
import Vuetify from "vuetify"; 
Vue.config.productionTip = false; 
Vue.use(Vuetify);

import {
  getByText,
  getByTestId,
} from '@testing-library/jest-dom'
import Home from '@/views/Home.vue'


describe('Home test suite', () => {
  // test('sanity test true', () => {
  //   expect(true).toBe(true)
  // })

  // test('sanity test false', () => {
  //   expect(false).toBe(false)
  // })

  // test('show button', () => {
  //   const wrapper = mount(Home)
  //   expect(wrapper.find('button').isVisible()).toBe(false)
  // })

  // test('show ', () => {
  //   const wrapper = mount(Home)
  //   expect(wrapper.html()).toContain('button')
  // }) 

  //#1 - isVisible is depricated
  // test('conditionally turn button off', async () => {
  //   const wrapper = mount(Home)
  //   wrapper.setData({ bShowLogo: false })
  //   await wrapper.vm.$nextTick()
  //   expect(wrapper.find('button').isVisible()).toBe(false)
  // })      
  
  // #2 - getByText
  // test('jest-dom', () => {
  //   const wrapper = mount(Home)
  //   expect(getByText("<span>Dave</span>")).isVisible()
  // })  

  // #3 - getByTestId
  // test('jest-dom', () => {
  //   const wrapper = mount(Home)
  //   expect(getByTestId('button')).toBeVisible()
  // })    

  // #4 findComponent 
  // test('conditionally turn button off - findComponent', async () => {
  //   const wrapper = mount(Home)
  //   const home = wrapper.findComponent(Home)
  //   expect(home.exists()).toBe(true)

  //   // does not work - expect(home.button.exists()).toBe(true)    
  // })   
})
