import { createRouter, createWebHistory } from 'vue-router'
import store from '../store';
import Home from '../views/Home.vue'

const routes = [{
        path: '/home',
        name: 'home',
        component: Home,
        meta: {
            title: 'Home | Tech Test',
            requiresAuth: true
        }
    },
    {
        path: '/',
        name: 'main',
        component: Home,
        meta: {
            title: 'Home | Tech Test',
            requiresAuth: true
        }
    },
    {
        path: '/order',
        name: 'order',
        meta: {
            title: 'Order | Tech Test',
            requiresAuth: true
        },
        component: () =>
            import ('../views/Order/Index.vue')
    },
    // guest
    {
        path: '/login',
        name: 'login',
        meta: {
            title: 'Login | Tech Test'
        },
        component: () =>
            import ('../views/Auth/Login.vue')
    },
    {
        path: '/register',
        name: 'register',
        meta: {
            title: 'Register | Tech Test'
        },
        component: () =>
            import ('../views/Auth/Register.vue'),
    },
    // not found
    {
        path: '/:pathMatch(.*)*',
        name: '404',
        meta: {
            title: '404 Not Found | Tech Test'
        },
        component: () =>
            import ('../views/NotFound.vue'),
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    linkActiveClass: 'active',
    linkExactActiveClass: 'active',
    pathToRegexpOptions: {
        strict: true
    },
    routes,
    scrollBehavior() {
        window.scrollTo(0, 0)
    }
})

router.beforeEach((to, from, next) => {
    const nearestWithTitle = to.matched.slice().reverse().find(r => r.meta && r.meta.title);
    if (nearestWithTitle) document.title = nearestWithTitle.meta.title;
    if (to.meta.requiresAuth == true && to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isLoggedIn) {
            next();
        } else {
            next({
                name: 'login'
            });
        }
    } else {
        next();
    }
});

export default router;