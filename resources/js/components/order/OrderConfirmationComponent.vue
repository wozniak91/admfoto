<template>
	<section class="section confirmation">
		<div class="container mb-5" v-if="order">
			<h1 class="heading">
				<span class="heading-text">Zamówienie nr: # {{ order.id }}</span>
			</h1>

			<p class="lead text-center">
				Dziękujemy! Twoje zamówienie zostało złożone. Wkrótce otrzymasz mailową informację o aktualnym statusie zlecenia.
			</p>

			<div v-if="order.payment_id == 2">
				<p class="lead text-center">
					Dane do przelewu:
				</p>
				<p class="lead text-center">Sklep i Zakład Fotograficzny Michał Adamski</p>
				<p class="lead text-center">ul. Poniatowskiego 22</p>
				<p class="lead text-center">63-600 - Kępno</p>
				<p class="lead text-center">Numer rachunku: 13 1020 2241 0000 2502 0033 8434</p>
				<p class="lead text-center">Kwota: {{ order.total_price/100}}zł</p>	
				<p class="lead text-center">Zapłata za zamówienie nr: # {{ order.id }}</p>		
			</div>
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
