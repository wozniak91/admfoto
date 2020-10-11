<template>
	<header class="header" :class="{ 'header-sticky': stickyHeader }">
		
		<div class="nav">

			<div class="nav-content" :class="{ 'active': menuActive }">
				<button class="nav-button" aria-label="Pokaż menu" :class="{ 'active': menuActive }" @click="toggleMenu">
					<span class="nav-button__toggle"></span>
				</button>

				<router-link to="/" class="nav-logo__mobile" exact aria-label="FotoAdamski">
					<img src="/img/logo.png" class="logo img-fluid" alt="FotoAdamski" width="140" height="30" />
				</router-link>

				<div class="nav-wrapper d-lg-flex justify-content-end">
					<router-link to="/" class="nav-link" exact @click.native="menuActive = false">Strona główna</router-link>
					<router-link to="/5-oferta" class="nav-link" exact @click.native="menuActive = false">Oferta</router-link>
				</div>
				<!-- <router-link to="/2-o-nas" class="nav-link" exact>O nas</router-link> -->
				<router-link to="/" class="nav-logo" exact aria-label="FotoAdamski">
					<img src="/img/logo.png" class="logo img-fluid" alt="FotoAdamski" :class="{ 'logo-sticky': stickyHeader }" width="250" height="52" />
				</router-link>
				<div class="nav-wrapper d-lg-flex justify-content-start">
					<router-link to="/3-cennik" class="nav-link" exact @click.native="menuActive = false">Cennik</router-link>
					<router-link to="/1-kontakt" class="nav-link" exact @click.native="menuActive = false">Kontakt</router-link>
					<router-link to="/zamowienie" class="nav-link" exact @click.native="menuActive = false">Zamów zdjęcia</router-link>
				</div>
			</div>
		</div>
	</header>
</template>

<script>
export default {
	name: 'HeaderComponent',
	data() {
		return {
			stickyHeader: false,
			menuActive: false,
		}
	},
	created() {
		window.addEventListener('scroll', this.handleScroll)
	},
	beforeUpdate () {
		window.addEventListener('scroll', this.handleScroll)
	},
	methods: {
		handleScroll () {
			if (window.scrollY >= 80) {
				this.stickyHeader = true
			} else {
				this.stickyHeader = false
			}
		},

		toggleMenu() {
			if (this.menuActive) {
				this.menuActive = false;
			} else {
				this.menuActive = true;
			}
		}
	},
}
</script>
