import { createWebHistory, createRouter } from "vue-router";
import BookList from "./components/book/List.vue";
import BookCreate from "./components/book/Add.vue";
import BookEdit from "./components/book/Edit.vue";

const routes = [
    {
        name: 'bookList',
        path: '/book',
        component: BookList
    },
    {
        name: 'bookEdit',
        path: '/book/:id/edit',
        component: BookEdit
    },
    {
        name: 'bookAdd',
        path: '/book/add',
        component: BookCreate
    }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;