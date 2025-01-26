import { createRouter, createWebHashHistory } from "vue-router";
import Home from "../components/Home.vue";
import About from "../components/About.vue";
import Notfound from "../components/Notfound.vue";
import Products from "../components/Products.vue";
import UserLogin from "../components/user/Login.vue";
const routes = [
    {
        path : '/',
        component : Home
    },
    {
        path : '/products',
        component : Products
    },
    {
        path : '/:pathMatch(.*)*',
        component : Notfound
    },
    {
        path : '/about',
        component : About
    },
    {
        path : '/user/login',
        component : UserLogin
    },
    {
        path : '/user/register',
        component : () => import('../components/user/Register.vue')
    }
];

const router = createRouter({
    history : createWebHashHistory(),
    routes
});

export default router;