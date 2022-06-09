<template>
    <NavbarVue />
    <div class="container mx-auto flex flex-wrap py-6">
        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            <article
                class="flex flex-col shadow my-4"
                v-for="post in posts.data"
            >
                <!-- Article Image -->
                <a v-bind:href="'/post/' + post.id" class="hover:opacity-75">
                    <img v-bind:src="'/storage/' + post.image1" />
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a
                        v-bind:href="'/post/' + post.id"
                        class="text-blue-700 text-sm font-bold uppercase pb-4"
                        >Kategori : {{ post.category_name }}</a
                    >
                    <a
                        v-bind:href="'/post/' + post.id"
                        class="text-3xl font-bold hover:text-gray-700 pb-4"
                        >{{ post.title }}</a
                    >
                    <p v-bind:href="'/post/' + post.id" class="text-sm pb-3">
                        Yazar:
                        <a
                            v-bind:href="'/post/' + post.id"
                            class="font-semibold hover:text-gray-800"
                            >Çağla Elçin Eren</a
                        >, {{ format_date(post.created_at) }}
                    </p>
                    <a
                        v-bind:href="'/post/' + post.id"
                        class="pb-6"
                        v-html="post.body.substring(0, 200) + '...'"
                    ></a>
                    <a
                        v-bind:href="'/post/' + post.id"
                        class="uppercase text-gray-800 hover:text-black"
                        >Okumaya Devam Edin <i class="fas fa-arrow-right"></i
                    ></a>
                </div>
            </article>
            <!-- Pagination -->
            <pagination :data="posts" @pagination-change-page="list">
                <template #prev-nav>
                    <a
                        class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3 left"
                        >Önceki Sayfa <i class="fas fa-arrow-left ml-2"></i
                    ></a>
                </template>
                <template #next-nav>
                    <a
                        class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3 right"
                        >Sonraki Sayfa <i class="fas fa-arrow-right ml-2"></i
                    ></a>
                </template>
            </pagination>
        </section>
        <SidebarVue />
    </div>
    <FooterVue />
</template>

<script>
import axios from "axios";
import moment from "moment";
import pagination from "laravel-vue-pagination";
import SidebarVue from "./Sidebar.vue";
import FooterVue from "./Footer.vue";
import NavbarVue from "./Navbar.vue";

export default {
    components: {
        pagination,
        NavbarVue,
        SidebarVue,
        FooterVue,
    },
    data() {
        return {
            posts: [],
        };
    },

    mounted() {
        this.list();
    },

    methods: {
        async list(page = 1) {
            await axios
                .get(`/api/category/kültür?page=${page}`)
                .then(({ data }) => {
                    this.posts = data;
                })
                .catch(({ response }) => {
                    console.error(response);
                });
        },
        format_date(value) {
            if (value) {
                return moment(String(value)).format("DD/MM/YYYY");
            }
        },
    },
};
</script>

<style>
.pagination {
    margin-bottom: 0;
    display: flex;
    padding-top: 2rem;
    gap: 0.5rem;
}

.right {
    margin-left: 2rem;
}
.left {
    margin-right: 2rem;
}
</style>
