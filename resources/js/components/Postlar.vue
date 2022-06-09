<template>
    <!-- Posts Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <article class="flex flex-col shadow my-4" v-for="post in posts">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img v-bind:src="'storage/' + post.image1" />
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a
                    href="#"
                    class="text-blue-700 text-sm font-bold uppercase pb-4"
                    >Kategori : {{ post.category_name }}</a
                >
                <a
                    href="#"
                    class="text-3xl font-bold hover:text-gray-700 pb-4"
                    >{{ post.title }}</a
                >
                <p href="#" class="text-sm pb-3">
                    Yazar:
                    <a href="#" class="font-semibold hover:text-gray-800"
                        >Çağla Elçin Eren</a
                    >, {{ format_date(post.created_at) }}
                </p>
                <a href="#" class="pb-6" v-html="post.body"></a>
                <a href="#" class="uppercase text-gray-800 hover:text-black"
                    >Okumaya Devam Edin <i class="fas fa-arrow-right"></i
                ></a>
            </div>
        </article>
        <!-- Pagination -->
        <div class="flex items-center py-8">
            <a
                href="#"
                class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center"
                >1</a
            >
            <a
                href="#"
                class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center"
                >2</a
            >
            <a
                href="#"
                class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3"
                >Next <i class="fas fa-arrow-right ml-2"></i
            ></a>
        </div>
    </section>
</template>

<script>
import axios from "axios";
import moment from "moment";

export default {
    data() {
        return {
            posts: [],
        };
    },

    mounted() {
        this.loadPost();
    },

    methods: {
        loadPost: function () {
            axios
                .get("/api/posts")
                .then((response) => {
                    this.posts = response.data;
                })
                .catch(function (error) {
                    console.log(error);
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
