<template>
	<main class="section page">
		
		<div class="loading" v-if="loading">
			Loading...
		</div>
		
		<div v-if="error" class="error">
			{{ error }}
		</div>
			<transition name="fade" mode="out-in">
			<div class="page-content" v-if="page" :key="page.id">

				<div class="container mb-5">
					<h1 class="heading">
						<span class="heading-text" v-text="page.title"></span>
					</h1>
					<div class="text-center" v-html="page.content"></div>
				</div>

				<div class="maps" v-if="page.id == 1"></div>

			</div>
			</transition>
	</main>
</template>

<script>
export default {
	name: 'page',
	data () {
		return {
			page: null,
			error: null,
			loading: null,
			title: false,
		}
	},
	metaInfo () {
      return {
        	titleTemplate: `%s | ${this.title}`,
		}
	},
	beforeRouteEnter (to, from, next) {
		axios(`/api/page/${to.params.id}`)
		.then(resp => resp.data)
		.then(resp => {
			next(vm => {
				vm.page = resp;
				vm.title = resp.title;
			});
		});
	},
	beforeRouteUpdate (to, from, next) {
		this.page = null
		axios(`/api/page/${to.params.id}`)
		.then(resp => resp.data)
		.then(resp => {
			this.page = resp;
			this.title = resp.title;
			next()
		});
	},
}
</script>
