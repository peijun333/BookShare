import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import switch_component from '../components/SwitchComponent.vue'
import r_link            from '../components/RouterLink.vue'

Vue.component('switch-component', switch_component)
Vue.component('r-link', r_link)

import home from '../components/HomeComponent.vue'

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',             
            name: 'home',          
            component: home,          
            meta: {
                name: 'ホーム',   
                icon: 'home'
            }},
  ],
})