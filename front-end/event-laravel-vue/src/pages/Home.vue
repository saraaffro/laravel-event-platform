<script>
import ApiEvents from "../components/ApiEvents.vue";
import EventDetail from "../components/EventDetail.vue";
export default {
	name: "events",
	components: {
		ApiEvents,
		EventDetail,
	},
};
</script>

<template>
	<ApiEvents />
	<EventDetail />
</template>

<style scoped lang="scss">
@use "../scss/general.scss" as *;
</style>
