<template>
    <div>
        <form-component
            :formFields="formFields"
            :submitButtonText="submitButtonText"
            :taskForm="true"
        ></form-component>
    </div>
</template>

<script>
import FormComponent from "./formComponent.vue";

export default {
    components: {
        FormComponent,
    },
    data() {
        return {
            formFields: [
                {
                    name: "start_date",
                    id: "start_date",
                    type: "date",
                    label: "კვირის საწყისი თარიღი",
                    placeholder: "",
                    required: true,
                },
                {
                    name: "name",
                    id: "name",
                    type: "text",
                    label: "სახელი გვარი",
                    placeholder: "",
                    required: true,
                },
                {
                    name: "task_type",
                    id: "task_type",
                    type: "select",
                    label: "ამოცანის ტიპი",
                    required: true,
                    options: [
                        {
                            value: "ამოცანები პროგრამებისა და პროექტებისთვის",
                            label: "ამოცანები პროგრამებისა და პროექტებისთვის",
                        },
                        {
                            value: "კვოტის მისაღწევად საჭირო ამოცანები",
                            label: "კვოტის მისაღწევად საჭირო ამოცანები",
                        },
                        {
                            value: "რეგულარული ამოცანები",
                            label: "რეგულარული ამოცანები",
                        },
                        {
                            value: "ამოცანები ტრენინგებთან მიმართებაში",
                            label: "ამოცანები ტრენინგებთან მიმართებაში",
                        },
                        {
                            value: "დაუგეგმავი ამოცანები",
                            label: "დაუგეგმავი ამოცანები",
                        },
                    ],
                },
                {
                    name: "task",
                    id: "task",
                    type: "text",
                    label: "ამოცანა",
                    placeholder: "",
                    required: true,
                },
                {
                    name: "product",
                    id: "product",
                    type: "text",
                    label: "ამოცანის პროდუქტი",
                    placeholder: "",
                    required: true,
                },
                {
                    name: "scheduled_time",
                    id: "scheduled_time",
                    type: "time",
                    label: "დაგეგმილი დრო",
                    placeholder: "",
                },
                {
                    name: "actual_time",
                    id: "actual_time",
                    type: "time",
                    label: "ფაქტიური დრო",
                    placeholder: "",
                },
                {
                    name: "finish_date",
                    id: "finish_date",
                    type: "date",
                    label: "შესრულების თარიღი",
                    placeholder: "",
                },
            ],
            submitButtonText: "Submit",
        };
    },
};
</script>
