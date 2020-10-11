<template>
  <main class="home">
    <carousel
      :per-page="1"
      :paginationEnabled="false"
      :autoplay="true"
      :loop="true"
      :autoplayTimeout="5000"
      class="carousel"
    >
      <slide v-for="slide in slides" :key="slide.id" class="carousel-container">
        <img
          v-lazy="slide.image_link"
          :alt="slide.title"
          class="img-fluid carousel-image"
        />
      </slide>
    </carousel>

    <section class="container my-5">
      <h1 class="heading">
        <span class="heading-text">O nas</span>
      </h1>

      <div class="d-flex justify-content-center">
        <div class="text-center py-1">
          <p class="lead">Witaj!</p>
          <p class="lead">
            Miło mi, że spotykamy się - tu na Naszej stronie online.
          </p>
          <p class="lead">
            Myślę, że świadczy to o tym, że wkrótce nadejdą dla Ciebie wyjątkowe
            chwile, a może właśnie trwają. Zdajesz sobie sprawę z ich ulotności
            i chcesz je zatrzymać jak najdłużej. Pozwól, że Ci w tym pomożemy.
            Każde ważne wydarzenie w Twoim życiu jest opowieścią, którą chcemy
            dla Ciebie zapisać w formie fotografii, do której będziesz z
            przyjemnością wracać. Staramy się, aby zdjęcia wychodzące z naszych
            rąk były żywe, pełne ekspresji i miłości. Przedstawiamy autentyczne
            emocje, uczucia oraz ludzi takimi, jakimi są. Tworzymy z pasją, a
            nie z obowiązku.
          </p>
          <p class="lead">Dlaczego My?</p>
          <p class="lead">
            Jesteśmy na rynku od 30 lat i mimo dużego doświadczenia, rozwijamy
            się poprzez udział w szkoleniach fotograficznych. Posiadamy duże i
            funkcjonalne studio oraz najnowszy sprzęt, dzięki któremu wytwarzane
            przez nas produkty są wysokiej jakości. Cieszymy się zaufaniem i
            dobrą opinią wśród naszych Klientów.
          </p>
          <p class="lead">
            Sprawdź naszą ofertę. Zamów odbitki. Zyskaj pamiątkę na długie lata.
            Do zobaczenia.
          </p>
        </div>

        <!-- <div class="col-md-5 col-sm-12 py-5">
					<silentbox-single src="/img/image_01.jpg">
						<img src="/img/thumb_image_01.jpg" class="img-fluid">
					</silentbox-single>
				</div> -->
      </div>
    </section>
    <section class="sortable">
      <div class="container my-5">
        <h1 class="heading">
          <span class="heading-text">Nasze prace</span>
        </h1>
        <!-- <nav class="sortable-tags text-center" v-if="groups">
				<button class="btn btn-secondary" @click="resetImages">#wszystkie</button>
				<button v-for="group in groups" v-if="group.images_nb > 0" :key="group.id" class="btn btn-secondary" :class="{'active' : group.active}"  @click="sortImages(group.id)">
					#{{ group.name }}
				</button>
			</nav> -->
        <silentbox-group
          v-masonry
          transition-duration="0.5s"
          item-selector=".sortable-image"
          class="sortable-images row"
        >
          <silentbox-item
            v-masonry-tile
            class="sortable-image col-md-4 col-sm-12"
            v-for="image in images"
            :key="image.id"
            :src="image.image_link"
            :description="image.description"
          >
            <div
              class="sortable-image__wrapper"
              :style="{ 'padding-top': `${image.ratio * 100}%` }"
            >
              <img
                v-lazy="image.image_link"
                :width="image.width"
                :height="image.height"
                :alt="image.title"
                class="img-fluid img-absolute"
              />
            </div>
          </silentbox-item>
        </silentbox-group>
      </div>
    </section>
    <section class="comments">
      <div class="container py-5">
        <h2 class="heading-secondary">Opinie</h2>

        <div class="row d-flex justify-content-center">
          <div class="col-md-9 col-sm-12">
            <carousel
              :perPage="1"
              paginationColor="#999999"
              :paginationEnabled="true"
              :autoplay="true"
              :loop="true"
              :autoplayTimeout="5000"
              paginationActiveColor="#000000"
              :paginationPadding="8"
              :centerMode="true"
              :paginationSize="8"
            >
              <slide class="comment">
                <p class="comment-text">
                  "Jesteśmy bardzo zadowoleni z usług Pana Michała. Pełen
                  profesjonalizm. Super podejście do klienta. Myślę, że jeszcze
                  nie raz skorzystamy z jego usług."
                </p>
                <h3 class="comment-author">Kasia i Radek</h3>
              </slide>
              <slide class="comment">
                <p class="comment-text">
                  "Zdjęcia są przepiękne! Przemiły człowiek! Dziękujemy z całego
                  serca, za zaangażowanie i cenne rady. Z czystym sumieniem
                  możemy polecić usługi Fotoadamski :)"
                </p>
                <h3 class="comment-author">Ania i Wojtek</h3>
              </slide>
              <slide class="comment">
                <p class="comment-text">
                  "Dziękujemy za przemile spędzony czas podczas sesji
                  plenerowaj. Zdjęcia wyszły MEGA! Polecamy!"
                </p>
                <h3 class="comment-author">Magda i Paweł</h3>
              </slide>
            </carousel>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";

export default {
  name: "home",
  components: {
    Carousel,
    Slide,
  },
  data() {
    return {
      slides: [],
      images: [],
      groups: false,
      sort: false,
    };
  },
  metaInfo() {
    return {
      titleTemplate: `%s | Fotografia i filmowanie ślubne - Kępno`,
      meta: [
        {
          name: "og:title",
          content: "FotoAdamski | Fotografia i filmowanie ślubne - Kępno",
        },
        {
          name: "description",
          content:
            "Szukasz fotografa bądź kamarzysty w okolicach Kępna? Świetnie trafiłeś!",
        },
        {
          name: "og:description",
          content:
            "Szukasz fotografa bądź kamarzysty w okolicach Kępna? Świetnie trafiłeś!",
        },
      ],
    };
  },
  mounted() {
    this.getSlides();
    this.getImagesGroups();
  },
  methods: {
    getSlides() {
      axios("/api/slides")
        .then((resp) => resp.data)
        .then((resp) => {
          this.slides = resp;
        });
    },

    getImagesGroups() {
      axios("/api/groups")
        .then((resp) => resp.data)
        .then((resp) => {
          resp.groups.map((group) => {
            group.active = false;
          });
          resp.images.map((image) => {
            image.tags = [];
            image.visible = true;

            image.groups.map((group) => {
              image.tags.push(group.id);
            });
          });

          this.groups = resp.groups;
          this.images = resp.images;
        });
    },

    getImages() {},

    sortImages(id_group) {
      this.groups.map((group) => {
        group.active = false;

        if (group.id == id_group) {
          group.active = true;
        }
      });

      this.images.map((image) => {
        image.visible = true;

        if (!image.tags.includes(id_group)) {
          image.visible = false;
        }
      });

      this.sort = true;
    },

    resetImages() {
      this.groups.map((group) => {
        group.active = false;
      });

      this.images.map((image) => {
        image.visible = true;
      });
      this.sort = false;
    },
  },
};
</script>
