<template>
	<header class="header" :class="{ 'header-sticky': stickyHeader }">
		
		<div class="nav">

			<div class="nav-content" :class="{ 'active': menuActive }">
				<button class="nav-button" :class="{ 'active': menuActive }" @click="toggleMenu">
					<span class="nav-button__toggle"></span>
				</button>
				<router-link to="/" class="nav-logo__mobile" exact>
					<img src="/img/logo.png" class="logo img-fluid" width="140" height="30" />
				</router-link>
				<router-link to="/" class="nav-link" exact>Strona główna</router-link>
				<router-link to="/5-oferta" class="nav-link" exact>Oferta</router-link>
				<router-link to="/2-o-nas" class="nav-link" exact>O nas</router-link>
				<router-link to="/" class="nav-logo" exact>
					<img src="/img/logo.png" class="logo img-fluid" :class="{ 'logo-sticky': stickyHeader }" width="250" height="52" />
				</router-link>
				<router-link to="/3-cennik" class="nav-link" exact>Cennik</router-link>
				<router-link to="/1-kontakt" class="nav-link" exact>Kontakt</router-link>
				<router-link to="/zamowienie" class="nav-link" exact>Zamów zdjęcia</router-link>
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
