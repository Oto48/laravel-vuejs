<template>
    <div class="mt-14 mx-14">
        <div class="flex flex-col gap-10">
            <div
                class="flex flex-col gap-5"
                v-for="(group, index) in groupedData"
                :key="index"
            >
                <h3 class="font-bold text-xl text-white">
                    {{ group[0].name }} - {{ group[0].start_date }}
                </h3>
                <div class="border flex flex-col gap-1 bg-white rounded">
                    <div class="flex justify-between px-2">
                        <p class="w-[18%] break-words text-center font-bold">
                            დასახელება
                        </p>
                        <p class="w-[18%] break-words text-center font-bold">
                            განზომილება
                        </p>
                        <p class="w-[18%] break-words text-center font-bold">
                            რაოდენობა გასული კვირის
                        </p>
                        <p class="w-[18%] break-words text-center font-bold">
                            კვოტა მიმდინარე კვირის
                        </p>
                        <p class="w-[18%] break-words text-center font-bold">
                            შენიშვნა
                        </p>
                        <p class="w-[5%] break-words text-center"></p>
                        <p class="w-[5%] break-words text-center"></p>
                    </div>

                    <div
                        v-for="item in group"
                        :key="item.id"
                        class="flex border justify-between px-2 w-full"
                    >
                        <div class="flex justify-between px-2 w-full">
                            <p class="w-[18%] break-words text-center">
                                {{ item.statistics_name }}
                            </p>
                            <p class="w-[18%] break-words text-center">
                                {{ item.dimension }}
                            </p>
                            <p class="w-[18%] break-words text-center">
                                {{ item.quantity }}
                            </p>
                            <p class="w-[18%] break-words text-center">
                                {{ item.quota }}
                            </p>
                            <p class="w-[18%] break-words text-center">
                                {{ item.note }}
                            </p>
                            <div class="w-[5%]">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-3 rounded-full"
                                    @click="showUpdateForm(item)"
                                >
                                    Update
                                </button>
                            </div>
                            <div class="w-[5%]">
                                <button
                                    class="bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-3 rounded-full"
                                    @click="deleteItem(item.id)"
                                >
                                    Delete
                                </button>
                            </div>
                        </div>
                        <update-form
                            v-if="item.id === selectedItemId"
                            :item-data="item"
                            :update-data-list="updateDataList"
                            :close-form="closeForm"
                        />
                    </div>
                </div>
            </div>
        </div>
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

    computed: {
        groupedData() {
            const groups = {};

            this.dataList.forEach((item) => {
                const key = `${item.name}-${item.start_date}-${item.task_type}`;

                if (!groups[key]) {
                    groups[key] = [];
                }

                groups[key].push(item);
            });

            const sortedGroups = Object.values(groups).sort(
                (groupA, groupB) => {
                    const dateA = groupA[0].start_date;
                    const dateB = groupB[0].start_date;
                    return dateA.localeCompare(dateB);
                }
            );

            return Object.values(sortedGroups);
        },
    },

    methods: {
        fetchData() {
            axios
                .get("/api/get-statistics")
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

        closeForm() {
            this.selectedItemId = null;
        },

        deleteItem(itemId) {
            axios
                .delete(`/api/delete-statistic/${itemId}`)
                .then(() => {
                    this.dataList = this.dataList.filter(
                        (item) => item.id !== itemId
                    );
                })
                .catch((error) => {
                    console.error("Error deleting item:", error);
                });
        },
    },
};
</script>
