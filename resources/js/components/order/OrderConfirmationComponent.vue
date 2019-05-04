<template>
	<section class="section confirmation">
		<div class="container mb-5" v-if="order">
			<h1 class="heading">
				<span class="heading-text">Zamówienie nr: # {{ order.id }}</span>
			</h1>

			<p class="lead text-center">
				Dziękujemy! Twoje zamówienie zostało złożone. Wkrótce otrzymasz mailową informację o aktualnym statusie zlecenia.
			</p>
		</div>


	</section>
</template>

<script>
export default {
	name: 'OrderConfirmation',
	data() {
		return {
			order: false,
			error: false,
		}
	},
	created() {
		this.getOrder();
	},

	methods: {

		getOrder() {

			axios.get(`/api/order/${this.$route.params.token}`)
				.then(resp => {
					
					this.order = resp.data;

				}).catch(err => {

					this.error = err.response.data.errors;
				});

		}

	}
}
</script>
