import { createRouter, createWebHistory } from "vue-router";
import form from "../components/Form.vue";

const routes = [
    {
        path: "/",
        component: form,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
