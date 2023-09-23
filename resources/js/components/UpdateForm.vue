<template>
    <div>
        <h2>Update Data</h2>
        <form @submit.prevent="updateData">
            <label for="start_date">Start Date:</label>
            <input
                type="date"
                id="start_date"
                v-model="updatedData.start_date"
                required
            />

            <label for="name">First Name:</label>
            <input type="text" id="name" v-model="updatedData.name" required />

            <label for="task">Task Type:</label>
            <input type="text" id="task_type" v-model="updatedData.task_type" />

            <label for="task">Task:</label>
            <input type="text" id="task" v-model="updatedData.task" />

            <label for="product">Product:</label>
            <input
                type="text"
                id="product"
                v-model="updatedData.product"
            />scheduled_time

            <label for="scheduled_time">scheduled_time:</label>
            <input
                type="time"
                id="scheduled_time"
                v-model="updatedData.scheduled_time"
            />

            <label for="actual_time">actual_time:</label>
            <input
                type="time"
                id="actual_time"
                v-model="updatedData.actual_time"
            />

            <label for="finish_date">finish_date:</label>
            <input
                type="date"
                id="finish_date"
                v-model="updatedData.finish_date"
            />

            <button type="submit">Update</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: {
        itemData: Object,
        updateDataList: Function,
    },
    data() {
        return {
            updatedData: { ...this.itemData },
        };
    },
    methods: {
        updateData() {
            if (this.updatedData.scheduled_time.length === 5) {
                this.updatedData.scheduled_time += ":00";
            }

            if (this.updatedData.scheduled_time.length === 5) {
                this.updatedData.actual_time += ":00";
            }

            const updatedData = this.updatedData;

            axios
                .put(`/api/update-data/${this.itemData.id}`, updatedData)
                .then((response) => {
                    console.log("Data updated successfully:", response.data);
                    this.updateDataList(updatedData);
                })
                .catch((error) => {
                    console.error("Error updating data:", error);
                });
        },
    },
};
</script>
