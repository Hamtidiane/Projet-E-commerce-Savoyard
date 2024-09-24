import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ProductView from '../views/ProductsView.vue'
import ProductOneView from "@/views/ProductOneView.vue";
import NewUserView from "@/views/NewUserView.vue";
import LoginView from "@/views/LoginView.vue";
import UserHomeView from"@/views/UserHomeView.vue"


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/products/:id',
      name: 'product-one-view',
      component: ProductOneView
    },
    {
      path: '/products',
      name: 'products',
      component: ProductView
    },
    {
      path: '/inscription',
      name: 'inscription',
      component: NewUserView
    },
    {
      path:'/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/userhomeview',
      name: 'userhomeview',
      component: UserHomeView

    }


  ]
})

export default router
