/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "bootstrap";
import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import dropdown from "vue-dropdowns";

// import component
import App from "./components/App.vue";
import dashboard from "./components/dashboard.vue";

import grade from "./components/grade/grade.vue";
import gradeIndex from "./components/grade/gradeIndex.vue";
import gradeAdd from "./components/grade/gradeAdd.vue";

import murid from "./components/murid/murid.vue";
import muridIndex from "./components/murid/muridIndex.vue";
import muridAdd from "./components/murid/muridAdd.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: "/", component: dashboard },

        { path: "/grades", component: gradeIndex },
        { path: "/grades/create", component: gradeAdd },
        { path: "/grades/:id", component: grade },
        { path: "/grades/:id/edit", component: gradeAdd },

        { path: "/murids", component: muridIndex },
        { path: "/murids/create", component: muridAdd },
        { path: "/murids/:id", component: murid },
        { path: "/murids/:id/edit", component: muridAdd },
    ],
});

const app = createApp(App);
app.use(router);
app.mount("#app");
