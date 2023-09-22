<template>
    <nav class="bg-red-700">
        <ul class="flex justify-center items-center gap-60">
            <li><router-link to="/">Form</router-link></li>
            <li><router-link to="/tables">Tables</router-link></li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Navbar",
};
</script>
