<script>
import NavbarVue from "./Navbar.vue";
import PostlarVue from "./Postlar.vue";
import SidebarVue from "./Sidebar.vue";
import FooterVue from "./Footer.vue";

export default {
    components: {
        NavbarVue,
        PostlarVue,
        SidebarVue,
        FooterVue,
    },
};
</script>

<template>
    <NavbarVue />
    <div class="container mx-auto flex flex-wrap py-6">
        <PostlarVue />
        <SidebarVue />
    </div>
    <FooterVue />
</template>
