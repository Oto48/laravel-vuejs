<template>
    <div>
        <form-component
            :formFields="formFields"
            :submitButtonText="submitButtonText"
        ></form-component>
    </div>
</template>

<script>
import FormComponent from "@/components/FormComponent.vue";

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
                    name: "statistics_name",
                    id: "statistics_name",
                    type: "text",
                    label: "დასახელება",
                    placeholder: "",
                    required: true,
                },
                {
                    name: "dimension",
                    id: "dimension",
                    type: "text",
                    label: "განზომილება",
                    placeholder: "",
                    required: true,
                },
                {
                    name: "quantity",
                    id: "quantity",
                    type: "number",
                    label: "რაოდენობა გასული კვირის",
                    placeholder: "",
                },
                {
                    name: "quota",
                    id: "quota",
                    type: "text",
                    label: "კვოტა მიმდინარე კვირის",
                    placeholder: "",
                },
                {
                    name: "note",
                    id: "note",
                    type: "text",
                    label: "შენიშვნა",
                    placeholder: "",
                },
            ],
            submitButtonText: "Submit",
        };
    },
};
</script>
