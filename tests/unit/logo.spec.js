import { shallowMount } from '@vue/test-utils'
import { mount } from '@vue/test-utils'
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
  
  test('conditionally show Vuetify logo', async () => {
    const wrapper = mount(Home)
    wrapper.setData({ bShowLogo: false })
    await wrapper.vm.$nextTick()
    expect(wrapper.find('button').isVisible()).toBe(false)
  })    
})
