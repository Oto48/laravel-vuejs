import { createRouter, createWebHistory } from "vue-router";
import form from "../components/Form.vue";
import StatisticsForm from "../components/StatisticsForm.vue";
import tables from "../components/Tables.vue";
import StatisticsTable from "../components/StatisticsTable.vue";

const routes = [
    {
        path: "/",
        component: form,
    },
    {
        path: "/statistics",
        component: StatisticsForm,
    },
    {
        path: "/tables",
        component: tables,
    },
    {
        path: "/statisticstable",
        component: StatisticsTable,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
