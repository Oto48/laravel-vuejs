<template>
    <div>
        <h2>Add Data</h2>
        <form @submit.prevent="submitForm">
            <label for="start_date">Start Date:</label>
            <input
                type="date"
                id="start_date"
                v-model="formData.start_date"
                required
            />

            <label for="name">First Name:</label>
            <input type="text" id="name" v-model="formData.name" required />

            <label for="task">Task:</label>
            <input type="text" id="task" v-model="formData.task" />

            <label for="product">Product:</label>
            <input
                type="text"
                id="product"
                v-model="formData.product"
            />scheduled_time

            <label for="scheduled_time">scheduled_time:</label>
            <input
                type="time"
                id="scheduled_time"
                v-model="formData.scheduled_time"
            />

            <label for="actual_time">actual_time:</label>
            <input
                type="time"
                id="actual_time"
                v-model="formData.actual_time"
            />

            <label for="finish_date">finish_date:</label>
            <input
                type="date"
                id="finish_date"
                v-model="formData.finish_date"
            />

            <button type="submit">Submit</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            formData: {
                start_date: "",
                name: "",
                task: "",
                product: "",
                scheduled_time: "",
                actual_time: "",
                finish_date: "",
            },
        };
    },
    methods: {
        submitForm() {
            console.log(this.formData);
            axios
                .post("/api/add-data", this.formData)
                .then((response) => {
                    console.log("Data added successfully:", response.data);
                })
                .catch((error) => {
                    console.error("Error adding data:", error);
                });
        },
    },
};
</script>
