<template>
    <div>
        <h2>Data List</h2>
        <ul>
            <li v-for="item in dataList" :key="item.id">
                {{ item.start_date }} {{ item.name }} {{ item.start_date }}
                {{ item.task }} {{ item.product }} {{ item.scheduled_time }}
                {{ item.actual_time }} {{ item.finish_date }}
            </li>
        </ul>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            dataList: [],
        };
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            axios
                .get("/api/get-data")
                .then((response) => {
                    this.dataList = response.data;
                })
                .catch((error) => {
                    console.error("Error fetching data:", error);
                });
        },
    },
};
</script>
