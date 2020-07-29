import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import router from './router.js'


import Index from './components/Index.vue'


Vue.use(Vuetify)




const app = new Vue({
    el: '#app',
    template: '<Index></Index>',
    components: {
        Index
    },
    router,
    vuetify: new Vuetify(),
})
