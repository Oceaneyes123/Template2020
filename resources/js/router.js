import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from './components/Index'
import Main from './components/Main'




Vue.use(VueRouter)

const router = new VueRouter({
    routes: [{
        path: '/Main',
        component: Main
    }, ]
})

export default router
