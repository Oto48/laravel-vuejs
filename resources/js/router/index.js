import { createRouter, createWebHistory } from "vue-router";
import tables from "../components/Tables.vue";
import StatisticsTable from "../components/StatisticsTable.vue";
import FormPage from "../components/FormPage.vue";

const routes = [
    {
        path: "/",
        component: FormPage,
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
