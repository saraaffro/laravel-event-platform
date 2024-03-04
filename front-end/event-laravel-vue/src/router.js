// importa router e cronologia
import { createRouter, createWebHistory } from "vue-router";
import Home from "./pages/Home.vue";
import EventDetail from "./components/EventDetail.vue";

const router = createRouter({
	history: createWebHistory(),
	routes: [
		{
			path: "/",
			name: "index",
			component: Home,
		},
		{
			path: "/event/details",
			name: "Details",
			component: EventDetail,
		},
	],
});
export { router };
