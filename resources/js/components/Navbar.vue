<template>
    <nav class="bg-semiDarkBlue">
        <ul
            class="flex justify-center h-16 items-center gap-60 text-white text-lg font-bold"
        >
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
