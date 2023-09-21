import { createRouter, createWebHistory } from "vue-router";
import form from "../components/Form.vue";
import tables from "../components/Tables.vue";

const routes = [
    {
        path: "/",
        component: form,
    },
    {
        path: "/tables",
        component: tables,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
