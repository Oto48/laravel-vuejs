<template>
    <div>
        <nav class="flex justify-center gap-20 mt-10">
            <p
                @click="showTaskTable"
                class="cursor-pointer text-white text-lg font-bold"
            >
                ამოცანა
            </p>
            <p
                @click="showStatisticsTable"
                class="cursor-pointer text-white text-lg font-bold"
            >
                სტატისტიკა
            </p>
        </nav>
        <div>
            <TaskTable v-if="currentTable === 'task'" />
            <StatisticsTable v-if="currentTable === 'statistics'" />
        </div>
    </div>
</template>

<script>
import TaskTable from "./TaskTable.vue";
import StatisticsTable from "./StatisticsTable.vue";

export default {
    name: "TablePage",
    components: {
        TaskTable,
        StatisticsTable,
    },
    data() {
        return {
            currentTable: "task",
        };
    },
    methods: {
        showTaskTable() {
            this.currentTable = "task";
        },
        showStatisticsTable() {
            this.currentTable = "statistics";
        },
    },
};
</script>
