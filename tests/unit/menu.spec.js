import { mount } from '@vue/test-utils'
import Vue from "vue"; 
import Vuetify from "vuetify"; 
Vue.config.productionTip = false; 
Vue.use(Vuetify);
import Menu from '@/components/Menu.vue'

describe('Menu test suite', () => {
  test('#1 - click create button', async () => {
    const wrapper = mount(Menu)
    const button = wrapper.find('[data-testid="create-button"]')
    button.trigger('click')
    await wrapper.vm.$nextTick()
    expect(wrapper.html()).toContain("Enter new student's data")
  })    
})
