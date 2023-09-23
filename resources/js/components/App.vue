<template>
    <div class="min-h-screen bg-darkBlue">
        <Navbar />
        <router-view />
    </div>
</template>
<script>
import Navbar from "./Navbar.vue";

export default {
    name: "app",
    components: {
        Navbar,
    },
};
</script>
