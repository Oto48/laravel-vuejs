<template>
    <div>
        <h2>Data List</h2>
        <ul>
            <li v-for="item in dataList" :key="item.id">
                {{ item.start_date }} {{ item.name }} {{ item.start_date }}
                {{ item.task }} {{ item.product }} {{ item.scheduled_time }}
                {{ item.actual_time }} {{ item.finish_date }}
                <button @click="showUpdateForm(item)">Update</button>
                <update-form
                    v-if="item.id === selectedItemId"
                    :item-data="item"
                    :update-data-list="updateDataList"
                />
            </li>
        </ul>
    </div>
</template>

<script>
import UpdateForm from "./UpdateForm.vue";
import axios from "axios";

export default {
    data() {
        return {
            dataList: [],
            selectedItemId: null,
        };
    },
    created() {
        this.fetchData();
    },
    components: {
        UpdateForm,
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

        showUpdateForm(item) {
            this.selectedItemId = item.id;
        },

        updateDataList(updatedItem) {
            const index = this.dataList.findIndex(
                (item) => item.id === updatedItem.id
            );

            if (index !== -1) {
                // Update the dataList with the updatedItem
                this.dataList.splice(index, 1, updatedItem);
            }

            // Clear the selectedItemId to close the update form
            this.selectedItemId = null;
        },
    },
};
</script>
