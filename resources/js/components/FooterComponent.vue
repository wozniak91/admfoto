<template>
 <footer class="footer">
	<div class="container py-5">
			<div class="row justify-content-between">
			<div class="col-md-5 col-sm-12">
				<router-link to="/" exact class="footer-link">
					<img v-lazy="'/img/logo.png'" width="280" height="58" alt="FotoAdamski" class="footer-logo">
				</router-link>
				<blockquote class="footer-text">
					<p class="mb-1">„Fotografia to smakowanie życia w 1/100 sekundy"</p> 
					Marc Riboud.
				</blockquote>
			</div>
			<div class="col-md-3 col-sm-12">
					<h3 class="footer-title">Obsługa klienta</h3>
					<router-link to="/3-cennik" exact class="footer-link">Cennik</router-link>
					<router-link to="/1-kontakt" exact class="footer-link">Kontakt</router-link>
					<router-link to="/5-oferta" exact class="footer-link">Oferta</router-link>
					<router-link to="/4-regulamin" exact class="footer-link">Regulamin</router-link>
			</div>
			<div class="col-md-3 col-sm-12">
					<h3 class="footer-title">Znajdziesz nas</h3>
					<p class="footer-text">FotoAdamski</p>
					<p class="footer-text">Sklep i Zakład Fotograficzny</p>
					<p class="footer-text">ul. Poniatowskiego 22</p>
					<p class="footer-text">63-600 - Kępno</p>
					<p class="footer-text">Telefon: <a href="tel:695986807" class="footer-link d-inline">695-986-807</a></p>
					<p class="footer-text">e-mail: <a href="mailto:kontakt@admfoto.pl" class="footer-link d-inline">kontakt@admfoto.pl</a></p>
				</nav>
			</div>
		</div>
	</div>
	<div class="socials">
		<div class="container py-3">
			

		<div class="row d-flex justify-content-between align-items-center">
			
			<div class="col-md-8 col-sm-12">
				<span class="copyright my-2">© FotoAdamski Sklep i Zakład Fotograficzny | Fotografia ślubna | Fotograf Kępno</span>
			</div>
			
			<div class="col-md-4 col-sm-12">
			<nav class="social text-right my-2">
				<a aria-label="Facebook" href="https://www.facebook.com/fotokepno/" target="_blank" rel="noreferrer noopener nofallow" class="social-link">
					<i class="icon-facebook social-icon"></i>
				</a>
				<a aria-label="Instagram" href="https://www.instagram.com/fotoadamski/" target="_blank" rel="noreferrer noopener nofallow" class="social-link">
					<i class="icon-instagram social-icon"></i>
				</a>
			</nav>	
			</div>
		</div>



		</div>
	</div>
 </footer>
</template>

<script>
    export default {
        name: 'FooterComponent',
    }
</script>
