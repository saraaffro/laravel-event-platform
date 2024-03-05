<script>
import axios from "axios";
import { store } from "../store";
export default {
	name: "EventDetail",
	data() {
		return {
			store,
		};
	},
};
</script>

<template>
	<div class="container my-3">
		<div class="row justify-content-center">
			<div class="col-8 text-center border py-3 bg-success">
				<h3>ID Evento: {{ store.eventDetails.id }}</h3>

				<h4>
					Nome Evento: <br />
					{{ store.eventDetails.name }}
				</h4>
				<h4>
					Descizione Evento: <br />
					{{ store.eventDetails.description }}
				</h4>
				<h4>
					Data Evento: <br />
					{{ store.eventDetails.date }}
				</h4>
				<h4>
					Luogo Evento: <br />
					{{ store.eventDetails.location }}
				</h4>

				<h2>Tag</h2>
				<router-link to="/" class="btn btn-secondary">Home</router-link>
			</div>
		</div>
	</div>
</template>
