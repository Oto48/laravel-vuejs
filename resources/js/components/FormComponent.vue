<template>
    <div class="w-full max-w-[500px] min-w-[460px] my-14 mx-auto">
        <form
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            @submit.prevent="submitForm"
        >
            <div
                v-if="this.startDateInput && this.nameInput"
                class="mb-4 flex gap-3 sm:gap-10"
            >
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

            <div v-for="(field, index) in formFields" :key="index" class="mb-4">
                <template
                    v-if="field.id !== 'start_date' && field.id !== 'name'"
                >
                    <label
                        class="block text-gray-700 text-sm text-center font-bold mb-2"
                        :for="field.id"
                    >
                        {{ field.label }}
                    </label>
                    <template
                        v-if="
                            field.type === 'text' ||
                            field.type === 'date' ||
                            field.type === 'number' ||
                            field.type === 'time'
                        "
                    >
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            :type="field.type"
                            :id="field.id"
                            :placeholder="field.placeholder"
                            v-model="formData[field.name]"
                            :required="field.required"
                        />
                    </template>
                    <template v-else-if="field.type === 'select'">
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            :id="field.id"
                            v-model="formData[field.name]"
                            :required="field.required"
                        >
                            <option
                                v-for="(option, optionIndex) in field.options"
                                :key="optionIndex"
                                :value="option.value"
                            >
                                {{ option.label }}
                            </option>
                        </select>
                    </template>
                </template>
            </div>
            <div class="flex items-center justify-center">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit"
                >
                    {{ submitButtonText }}
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: {
        formFields: {
            type: Array,
            required: true,
        },
        submitButtonText: {
            type: String,
            default: "Submit",
        },
    },
    data() {
        return {
            formData: {},
        };
    },
    computed: {
        startDateInput() {
            return this.formFields.filter((item) => item.id === "start_date");
        },

        nameInput() {
            return this.formFields.filter((item) => item.id === "name");
        },
    },
    methods: {
        submitForm() {
            // axios
            //     .post("/api/add-data", this.formData)
            //     .then((response) => {
            //         console.log("Data added successfully:", response.data);
            //         this.formData = {};
            //         this.$router.push("/tables");
            //     })
            //     .catch((error) => {
            //         console.error("Error adding data:", error);
            //     });

            axios
                .post("/api/add-statistic", this.formData)
                .then((response) => {
                    console.log("Data added successfully:", response.data);
                    this.formData = {};
                    this.$router.push("/tables");
                })
                .catch((error) => {
                    console.error("Error adding data:", error);
                });
        },
    },
};
</script>
