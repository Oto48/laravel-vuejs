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
                            {{ group[0].task_type }}
                        </p>
                        <p class="w-[18%] break-words text-center font-bold">
                            ამოცანის პროდუქტი
                        </p>
                        <p class="w-[18%] break-words text-center font-bold">
                            დაგეგმილი დრო
                        </p>
                        <p class="w-[18%] break-words text-center font-bold">
                            ფაქტიური დრო
                        </p>
                        <p class="w-[18%] break-words text-center font-bold">
                            შესრულების თარიღი
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
                                {{ item.task }}
                            </p>
                            <p class="w-[18%] break-words text-center">
                                {{ item.product }}
                            </p>
                            <p class="w-[18%] break-words text-center">
                                {{ item.scheduled_time }}
                            </p>
                            <p class="w-[18%] break-words text-center">
                                {{ item.actual_time }}
                            </p>
                            <p class="w-[18%] break-words text-center">
                                {{ item.finish_date }}
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
                    <div class="flex px-2">
                        <div class="w-[18%]"></div>
                        <div class="w-[18%]"></div>
                        <div class="w-[18%] text-center font-bold">
                            სულ დრო:
                        </div>
                        <div class="w-[18%] text-center font-bold">
                            {{
                                calculateTotalScheduledTime(
                                    group,
                                    "scheduled_time"
                                )
                            }}
                        </div>
                        <div class="w-[18%] text-center font-bold">
                            {{
                                calculateTotalScheduledTime(
                                    group,
                                    "actual_time"
                                )
                            }}
                        </div>
                        <div class="w-[5%]"></div>
                        <div class="w-[5%]"></div>
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

        closeForm() {
            this.selectedItemId = null;
        },

        deleteItem(itemId) {
            axios
                .delete(`/api/delete-data/${itemId}`)
                .then(() => {
                    this.dataList = this.dataList.filter(
                        (item) => item.id !== itemId
                    );
                })
                .catch((error) => {
                    console.error("Error deleting item:", error);
                });
        },

        calculateTotalScheduledTime(group, type) {
            let totalTime = 0;

            group.forEach((item) => {
                const [hours, minutes, seconds] = item[type]
                    .split(":")
                    .map(Number);

                const totalSeconds = hours * 3600 + minutes * 60 + seconds;

                totalTime += totalSeconds;
            });

            // Convert the cumulative total back to HH:MM:SS format
            const hours = Math.floor(totalTime / 3600);
            const minutes = Math.floor((totalTime % 3600) / 60);
            const seconds = totalTime % 60;

            return `${hours}:${minutes}:${seconds}`;
        },
    },
};
</script>
