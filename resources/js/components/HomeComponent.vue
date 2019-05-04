<template>
	<main class="home">
		
		<carousel :per-page="1" :paginationEnabled="false" :autoplay="true" :loop="true" :autoplayTimeout="5000"  v-if="slides" class="carousel">
				<slide v-for="slide in slides" :key="slide.id" class="carousel-container">
					<img :src="slide.image_link" :alt="slide.title" class="img-fluid carousel-image">
				</slide>
		</carousel>

		<section class="container my-5">
			<h1 class="heading">
				<span class="heading-text">Smakowanie życia w 1/100 sekundy</span>
			</h1>

			<div class="row d-flex justify-content-center">

				<div class="col-md-6 col-sm-12 text-center py-4">
					<p class="lead">
					Ogromnie mi miło, że do Nas zaglądasz - tu na naszą stronę.
					Najprawdopodobniej świadczy to o tym, że w Twoim życiu zagościły cudowne dni - planujesz ślub, oczekujesz narodziny dziecka, a może właśnie przyszło ono na świat, tudzież wspólnie rozwijacie się już jako rodzina.
					Każde ważne wydarzenie w Waszym życiu jest opowieścią, którą pragniemy dla Was zapisać w osobisty i unikalny sposób. </p>
					<p class="lead">
					Fotografią chcemy opowiadać Waszą historię, do której będziecie z przyjemnością wracać. Zachwycać się i wzruszać.
					Staramy się, aby zdjęcia wychodzące z naszych rąk były żywe, pełne ekspresji i miłości. Przedstawiały autentyczne emocje, uczucia oraz ludzi takimi, jakimi są.
					Pozwól nam opowiedzieć Twoją historię.</p>
					</p>
				</div>

				<div class="col-md-5 col-sm-12">
					<silentbox-single src="/img/image_01.jpg">
						<img src="/img/thumb_image_01.jpg" class="img-fluid">
					</silentbox-single>
			</div>

		</div>

	</section>
	<section class="sortable">
		
		<div class="container my-5">
			<h1 class="heading">
				<span class="heading-text">Nasze praca</span>
			</h1>
			<nav class="sortable-tags text-center" v-if="groups">
				<button class="btn btn-secondary" @click="resetImages">#wszystkie</button>
				<button v-for="group in groups" class="btn btn-secondary" :class="{'active' : group.active}"  @click="sortImages(group.id)">
					#{{ group.name }}
				</button>
			</nav>
			<div v-masonry transition-duration="0.5s" item-selector=".sortable-image" class="sortable-images row">
				<div v-masonry-tile class="sortable-image col-md-4 col-sm-12"  v-for="image in images" v-if="image.visible" :key="image.id">
					<silentbox-single :src="image.image_link" :description="image.description">
						<img :src="image.image_link" class="img-fluid">
					</silentbox-single>
				</div>
			</div>
		</div>

	</section>
	<section class="comments">
		
		<div class="container py-5">
			
			<h2 class="heading-secondary">Opinie</h2>

			
			<div class="row d-flex justify-content-center">

				<div class="col-md-9 col-sm-12">
					<carousel :perPage="1" paginationColor="#999999" :paginationEnabled="true" :autoplay="true" :loop="true" :autoplayTimeout="5000" paginationActiveColor="#000000" :paginationPadding="8" :centerMode="true" :paginationSize="8">
						<slide class="comment">
							<p class="comment-text">"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque earum beatae ex est numquam reprehenderit, mollitia ea, quod id dignissimos atque optio. Odit illo autem ut velit similique eaque dolorum."</p>
							<img class="comment-avatar img-fluid" src="/img/avatar_1.png" width="60" height="60" />
							<h4 class="comment-author">Kasia i Radek</h4>

						</slide>
						<slide class="comment">
							<p class="comment-text">"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque earum beatae ex est numquam reprehenderit, mollitia ea, quod id dignissimos atque optio. Odit illo autem ut velit similique eaque dolorum."</p>
							<img class="comment-avatar img-fluid" src="/img/avatar_2.png" width="60" height="60" />
							<h4 class="comment-author">Ania i Wojtek</h4>

						</slide>
					</carousel>
				</div>
			</div>
			
		</div>

	</section>

</main>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';

export default {
	name: 'home',
	components: {
		Carousel,
		Slide
	},
	data() {
		return {
			slides: false,
			images: false,
			groups: false,
			sort: false
		}
	},
	metaInfo () {
      return {
        	titleTemplate: `%s | Strona główna`,
		}
	},
	mounted() {
		this.getSlides();
		this.getImagesGroups();
	},
	methods: {

		getSlides() {

			axios('/api/slides')
			.then(resp => resp.data)
			.then(resp => {
				this.slides = resp;
			});

		},

		getImagesGroups() {
			axios('/api/groups')
			.then(resp => resp.data)
			.then(resp => {

				resp.groups.map(group => {
					group.active = false;
				});
				resp.images.map(image => {

					image.tags = [];
					image.visible = true;

					image.groups.map(group => {

						image.tags.push(group.id);

					});

				});
				
				this.groups = resp.groups;
				this.images = resp.images;

			});
		},

		getImages() {



		},

		sortImages(id_group) {

			this.groups.map(group => {

				group.active = false;

				if(group.id == id_group) {

					group.active = true;

				}

			});

			this.images.map(image => {

				image.visible = true;

				if(!image.tags.includes(id_group)) {
						image.visible = false;
				}

			});

			this.sort = true;
		},

		resetImages() {

			this.groups.map(group => {
				group.active = false;
			});
			
			this.images.map(image => {

				image.visible = true;

			});	
			this.sort = false;
		}

	}
}
</script>
