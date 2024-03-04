<script>
import axios from "axios";
import { store } from "../store";
export default {
	name: "ApiEvents",
	data() {
		return {
			events: [],
			store,
		};
	},
	methods: {
		IdSearch(index) {
			this.events.forEach((event) => {
				if (event.id == index) {
					store.eventDetails = event;
					console.log(store.eventDetails);
				}
			});
		},
	},
	mounted() {
		console.log(store.eventDetails);
		axios
			.get("http://localhost:8000/api/v1/events")
			.then((res) => {
				console.log(res.data);
				this.events = res.data.events;
			})
			.catch((err) => {
				console.log(err);
			});
	},
};
</script>

<template>
	<div class="container mt-3 mb-5">
		<h1 class="pb-3 text-center">Events</h1>
		<div class="row d-flex gy-4">
			<div class="col-4" v-for="event in events" :key="event.id">
				<div class="card my-2">
					<div class="card-title text-center">
						<h4>
							{{ event.name }}
						</h4>
					</div>
					<div class="card-text" style="height: 200px">
						<p>Description: {{ event.description }}</p>

						<div v-if="event.tags && event.tags.length > 0">
							<!-- <div v-for="(tag, index) in event.tags" :key="index">
								<em
									>{{ tag.name }}
									<span v-if="index < event.tags.length - 1">- </span></em
								>
							</div> -->
						</div>
					</div>
					<div class="row justify-content-center align-items-center">
						<div class="col-5">
							<router-link :to="'/event/details/'" @click="IdSearch(event.id)">
								Dettagli evento
							</router-link>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped lang="scss">
@use "../scss/general.scss" as *;
</style>
