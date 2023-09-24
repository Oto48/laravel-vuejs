<template>
    <div>
        <nav class="flex justify-center gap-20 mt-10">
            <p
                @click="showTaskForm"
                class="cursor-pointer text-white text-lg font-bold"
            >
                ამოცანა
            </p>
            <p
                @click="showStatisticsForm"
                class="cursor-pointer text-white text-lg font-bold"
            >
                სტატისტიკა
            </p>
        </nav>
        <div>
            <TaskForm v-if="currentForm === 'task'" />
            <StatisticsForm v-if="currentForm === 'statistics'" />
        </div>
    </div>
</template>

<script>
import TaskForm from "./TaskForm.vue";
import StatisticsForm from "./StatisticsForm.vue";

export default {
    name: "FormPage",
    components: {
        TaskForm,
        StatisticsForm,
    },
    data() {
        return {
            currentForm: "task", // Default to Task Form
        };
    },
    methods: {
        showTaskForm() {
            this.currentForm = "task";
        },
        showStatisticsForm() {
            this.currentForm = "statistics";
        },
    },
};
</script>
