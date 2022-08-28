import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '@/views/LoginView.vue'
import NewAccount from '@/views/NewAccount.vue'
import AssignmentsView from '@/views/AssignmentsView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: LoginView
    },
    {
      path: '/new-account',
      name: 'new-account',
      component: NewAccount
    },
    {
      path: '/assignments',
      name: 'assignments',
      component: AssignmentsView
    }
  ]
})

export default router
