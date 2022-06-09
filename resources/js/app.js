import "./bootstrap";

import { createApp } from "vue";
import MainComponent from "./components/MainComponent.vue";
import ProductComponent from "./components/ProductComponent.vue";
import PostComponent from "./components/PostComponent.vue";
import PostProduct from "./components/PostProduct.vue";
import { createRouter, createWebHistory } from "vue-router";

const routes = [
    { path: "/", name: "Home", component: MainComponent },
    { path: "/:id", name: "Showpage", component: PostComponent },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

const app = createApp({});

app.use(router);

app.mount("#app");
