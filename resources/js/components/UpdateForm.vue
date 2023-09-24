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
                    for="task_type"
                >
                    ამოცანის ტიპი
                </label>

                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="task_type"
                    v-model="updatedData.task_type"
                    required
                >
                    <option value="ამოცანები პროგრამებისა და პროექტებისთვის">
                        ამოცანები პროგრამებისა და პროექტებისთვის
                    </option>
                    <option value="კვოტის მისაღწევად საჭირო ამოცანები">
                        კვოტის მისაღწევად საჭირო ამოცანები
                    </option>
                    <option value="რეგულარული ამოცანები">
                        რეგულარული ამოცანები
                    </option>
                    <option value="ამოცანები ტრენინგებთან მიმართებაში">
                        ამოცანები ტრენინგებთან მიმართებაში
                    </option>
                    <option value="დაუგეგმავი ამოცანები">
                        დაუგეგმავი ამოცანები
                    </option>
                </select>
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="task"
                >
                    ამოცანა
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    id="task"
                    v-model="updatedData.task"
                    required
                />
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="product"
                >
                    ამოცანის პროდუქტი
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    id="product"
                    v-model="updatedData.product"
                    required
                />
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="scheduled_time"
                >
                    დაგეგმილი დრო
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="time"
                    id="scheduled_time"
                    v-model="updatedData.scheduled_time"
                />
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="actual_time"
                >
                    ფაქტიური დრო
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="time"
                    id="actual_time"
                    v-model="updatedData.actual_time"
                />
            </div>

            <div class="mb-6">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="finish_date"
                >
                    შესრულების თარიღი
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="date"
                    id="finish_date"
                    v-model="updatedData.finish_date"
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
            if (this.updatedData.scheduled_time.length === 5) {
                this.updatedData.scheduled_time += ":00";
            }

            if (this.updatedData.actual_time.length === 5) {
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

        closeUpdateForm() {
            this.closeForm();
        },
    },
};
</script>
