import "./bootstrap";

import { createApp } from "vue";
import MainComponent from "./components/MainComponent.vue";
import PostComponent from "./components/PostComponent.vue";
import Psikoloji from "./components/KategoriPsikoloji.vue";
import Politika from "./components/KategoriPolitika.vue";
import Kültür from "./components/KategoriKültür.vue";
import Felsefe from "./components/KategoriFelsefe.vue";
import Din from "./components/KategoriDin.vue";
import { createRouter, createWebHistory } from "vue-router";

const routes = [
    { path: "/", name: "Home", component: MainComponent },
    {
        path: "/kategori/psikoloji",
        name: "Psikolojikategori",
        component: Psikoloji,
    },
    {
        path: "/kategori/politika",
        name: "PolitikaKategori",
        component: Politika,
    },
    {
        path: "/kategori/kültür",
        name: "Kültürkategori",
        component: Kültür,
    },
    {
        path: "/kategori/din",
        name: "Dinkategori",
        component: Din,
    },
    {
        path: "/kategori/felsefe",
        name: "Felsefekategori",
        component: Felsefe,
    },
    { path: "/post/:id", name: "Showpage", component: PostComponent },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

const app = createApp({});

app.use(router);

app.mount("#app");
