<template>
    <div class="w-full h-full absolute top-0 left-0 bg-black-70">
        <div
            class="w-8 h-8 absolute right-80 top-10 cursor-pointer"
            @click="closeUpdateForm"
        >
            <div
                class="absolute bg-slate-50 w-10 h-1 bg-black transform rotate-45 top-1/3 left-1/6"
            ></div>
            <div
                class="absolute bg-slate-50 w-10 h-1 bg-black transform -rotate-45 top-1/3 left-1/6"
            ></div>
        </div>
        <form
            class="bg-white max-w-[500px] min-w-[460px] mx-auto mt-28 shadow-md rounded px-8 pt-6 pb-8 mb-4"
            @submit.prevent="updateData"
        >
            <div class="mb-4 flex gap-3 sm:gap-10">
                <div class="flex-1">
                    <label
                        class="block text-gray-700 text-sm text-center font-bold mb-2"
                        for="start_date"
                    >
                        კვირის საწყისი თარიღი
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="date"
                        id="start_date"
                        v-model="updatedData.start_date"
                        required
                    />
                </div>

                <div class="flex-1">
                    <label
                        class="block text-gray-700 text-sm text-center font-bold mb-2"
                        for="name"
                    >
                        სახელი გვარი
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text"
                        id="name"
                        v-model="updatedData.name"
                        required
                    />
                </div>
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="statistics_name"
                >
                    დასახელება
                </label>

                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    id="statistics_name"
                    v-model="updatedData.statistics_name"
                    required
                />
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="dimension"
                >
                    განზომილება
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    id="dimension"
                    v-model="updatedData.dimension"
                    required
                />
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="quantity"
                >
                    რაოდენობა გასული კვირის
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="number"
                    id="quantity"
                    v-model="updatedData.quantity"
                    required
                />
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="quota"
                >
                    კვოტა მიმდინარე კვირის
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    id="quota"
                    v-model="updatedData.quota"
                />
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="note"
                >
                    quota
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    id="note"
                    v-model="updatedData.note"
                />
            </div>

            <div class="flex items-center justify-center gap-5">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit"
                >
                    Submit
                </button>
                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    @click="closeUpdateForm"
                >
                    Close
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: {
        itemData: Object,
        updateDataList: Function,
        closeForm: Function,
    },
    data() {
        return {
            updatedData: { ...this.itemData },
        };
    },
    methods: {
        updateData() {
            const updatedData = this.updatedData;

            axios
                .put(`/api/update-statistic/${this.itemData.id}`, updatedData)
                .then((response) => {
                    console.log("Data updated successfully:", response.data);
                    this.updateDataList(updatedData);
                })
                .catch((error) => {
                    console.error("Error updating data:", error);
                });
        },

        closeUpdateForm() {
            this.closeForm();
        },
    },
};
</script>
