<script>
import axios from "axios";
export default {
	name: "ApiEvents",
	data() {
		return {
			events: [],
		};
	},
	methods: {},
	mounted() {
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
					<div class="card-text">
						<p>Description: {{ event.description }}</p>
						<p>Date: {{ event.date }}</p>
						<p>Location: {{ event.location }}</p>
						<p>User: {{ event.user.name }}</p>

						<div v-if="event.tags && event.tags.length > 0">
							<h6>Tags:</h6>
							<template v-for="(tag, index) in event.tags" :key="index">
								<em
									>{{ tag.name }}
									<span v-if="index < event.tags.length - 1">- </span></em
								>
							</template>
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
