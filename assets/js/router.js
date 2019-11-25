import Vue from "vue"
import Router from "vue-router"
import Home from './views/Home.vue'
import AuthorBooks from './views/AuthorBooks.vue'

Vue.use(Router)

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/authors/:id/',
            name: 'author',
            component: AuthorBooks,
            props: true
        },
    ]
})