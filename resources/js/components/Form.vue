<template>
    <div class="w-full max-w-[500px] min-w-[460px] my-14 mx-auto">
        <form
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            @submit.prevent="submitForm"
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
                        v-model="formData.start_date"
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
                        v-model="formData.name"
                        required
                    />
                </div>
            </div>

            <div class="mb-4">
                <label
                    class="block text-gray-700 text-sm font-bold mb-2"
                    for="task"
                >
                    ამოცანის ტიპი
                </label>

                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="task_type"
                    v-model="formData.task_type"
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
                    v-model="formData.task"
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
                    v-model="formData.product"
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
                    v-model="formData.scheduled_time"
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
                    v-model="formData.actual_time"
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
                    v-model="formData.finish_date"
                />
            </div>
            <div class="flex items-center justify-center">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit"
                >
                    Submit
                </button>
            </div>
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
                task_type: "",
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
