<template>
    <NavbarVue />
    <div class="container mx-auto flex flex-wrap py-6">
        <!-- Post Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img v-bind:src="'/storage/' + post.image1" />
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a
                        href="#"
                        class="text-blue-700 text-sm font-bold uppercase pb-4"
                        >{{ post.category }}</a
                    >
                    <a
                        href="#"
                        class="text-3xl font-bold hover:text-gray-700 pb-4"
                        >{{ post.title }}</a
                    >
                    <p href="#" class="text-sm pb-8">
                        Yazar:
                        <a href="#" class="font-semibold hover:text-gray-800"
                            >Çağla Elçin Eren</a
                        >, {{ format_date(post.created_at) }}
                    </p>
                    <p class="pb-3" v-html="post.body"></p>
                </div>
            </article>

            <div class="w-full flex pt-6">
                <a
                    v-bind:href="post.id - 1"
                    class="w-1/2 bg-white shadow hover:shadow-md text-left p-6"
                >
                    <p
                        class="text-lg text-blue-800 font-bold flex items-center"
                    >
                        <i class="fas fa-arrow-left pr-1"></i> Önceki
                    </p>
                    <p class="pt-2">Bir Önceki Yazımı İnceleyin.</p>
                </a>
                <a
                    v-bind:href="post.id + 1"
                    class="w-1/2 bg-white shadow hover:shadow-md text-right p-6"
                >
                    <p
                        class="text-lg text-blue-800 font-bold flex items-center justify-end"
                    >
                        Sonraki <i class="fas fa-arrow-right pl-1"></i>
                    </p>
                    <p class="pt-2">Bir Sonraki Yazımı İnceleyin.</p>
                </a>
            </div>

            <div
                class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6"
            >
                <div
                    class="w-full md:w-1/5 flex justify-center md:justify-start pb-4"
                >
                    <img
                        src="https://source.unsplash.com/collection/1346951/150x150?sig=1"
                        class="rounded-full shadow h-32 w-32"
                    />
                </div>
                <div
                    class="flex-1 flex flex-col justify-center md:justify-start"
                >
                    <p class="font-semibold text-2xl">Çağla Elçin Eren</p>
                    <p class="pt-2">
                        Merhabalar umarım blogumda hem eğlenceli vakit
                        geçirirsiniz hem de size bir şeyler katmayı ve öğrenmeyi
                        başarırım.
                    </p>
                    <div
                        class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4"
                    >
                        <a class="" href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a class="pl-4" href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="pl-4" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="pl-4" href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <SidebarVue />
    </div>
    <FooterVue />
</template>

<script>
import axios from "axios";
import NavbarVue from "./Navbar.vue";
import SidebarVue from "./Sidebar.vue";
import FooterVue from "./Footer.vue";
import moment from "moment";

export default {
    data() {
        return {
            post: [],
        };
    },

    components: {
        NavbarVue,
        SidebarVue,
        FooterVue,
    },

    mounted() {
        this.LoadPost();
        this.HomeDeneme();
    },

    methods: {
        LoadPost: function () {
            axios
                .get(`/api/${this.$route.params.id}`)
                .then((response) => {
                    this.post = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        HomeDeneme: function () {
            if (this.$route.params.id == 0) {
                this.$router.push({ name: "Home" });
            } else if (this.$route.params.id == "NaN") {
                this.$router.push({ name: "Home" });
            }
        },
        format_date(value) {
            if (value) {
                return moment(String(value)).format("DD/MM/YYYY");
            }
        },
    },
};
</script>
