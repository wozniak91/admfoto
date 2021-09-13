<template>
  <section class="section order">
    <div class="container">
      <h1 class="heading">
        <span class="heading-text">Zamów zdjęcia</span>
      </h1>

      <form method="post" enctype="multipart/form-data" @submit.prevent="submitOrder">
        <fieldset class="images">
          <h3 class="heading-small">
            1. Wybierz zdjęcia, rozmiar oraz rodzaj papieru ({{ fields.images.length }})
          </h3>

          <div class="image-select">
            <transition name="fade">
              <div class="image-select__loader" v-if="pending || converting">
                <h2>Proszę czekać..</h2>
                  <p class="lead" v-if="pending && !converting">Trwa wysyłanie zdjęcia</p>
                  <p class="lead" v-if="pending && converting">Trwa konwersja zdjęcia</p>
                <p class="lead">{{ totalUploaded }} / {{ totalToUpload }}</p>
              </div>
            </transition>
            <span class="image-select__text">Przeciągnij i upuść zdjęcia</span>
            <input
              type="file"
              class="form-images-control"
              accept="image/x-png,image/png,image/jpeg,image/jpg,image/heic"
              @change="addImages"
              multiple
            />
          </div>
          <transition name="fade">
            <aside class="alert alert-danger" v-if="errors.image">
              <ul class="m-0 pl-3">
                <li v-for="error in errors.image" v-text="error"></li>
              </ul>
            </aside>
          </transition>
          <transition-group
            name="image"
            tag="div"
            class="images-group row"
            v-if="options"
          >
            <article
              v-for="(image, key) in fields.images"
              class="col-12 col-lg-3 col-md-4 mb-3 image"
              :key="image.id"
            >
              <div class="image-container" :class="{ selected: image.selected }">
                <div class="image-actions" role="group">
                  <a
                    class="btn btn-light btn-sm image-btn"
                    title="Duplikuj"
                    @click.prevent="duplicateImage(key)"
                  >
                    <i class="icon-docs"></i>
                  </a>
                  <a
                    class="btn btn-light btn-sm image-btn"
                    title="Usuń"
                    @click.prevent="removeImage(image.id)"
                  >
                    <i class="icon-trash-empty"></i>
                  </a>
                  <a
                    class="btn btn-light btn-sm image-btn"
                    title="Zaznacz"
                    @click.prevent="selectImage(key)"
                  >
                    <i class="icon-select"></i>
                  </a>
                </div>
                <figure class="image-content">
                  <img
                    :src="image.dataImage"
                    class="img-fluid image-source"
                    width="128"
                    height="128"
                  />
                </figure>

                <div class="image-actions text-left py-2" role="group">
                  <div
                    class="form-group image-group px-2"
                    v-for="(option, k) in options"
                    :key="option.id"
                  >
                    <label
                      :for="option.name"
                      class="label-sm"
                      v-text="option.name"
                    ></label>
                    <select
                      :name="option.name"
                      class="form-control form-control-sm"
                      v-model.lazy="image.attributes[option.id]"
                      @change.prevet="changeCombination(image)"
                    >
                      <option
                        v-for="attribute in option.attributes"
                        :value="attribute.id"
                        v-text="attribute.value"
                      ></option>
                    </select>
                  </div>
                  <div class="form-group image-group px-2">
                    <label for="qty" class="label-sm">Ilość</label>
                    <input
                      name="qty"
                      type="number"
                      step="1"
                      min="1"
                      value="1"
                      class="form-control form-control-sm"
                      v-model="image.qty"
                      @change.prevet="changeCombination(image)"
                    />
                  </div>
                </div>
                <p class="image-price" v-if="!image.error">
                  {{ displayPrice(image.price, image.qty) }}
                </p>
                <p class="image-alert" v-if="image.error" v-text="image.error"></p>
              </div>
            </article>
          </transition-group>

          <transition name="fade">
            <nav class="image-toolbar" v-if="fields.images.length > 0">
              <div class="row d-flex justify-content-center">
                <div class="col-md-3 col-6">
                  <a
                    class="btn btn-secondary btn-sm"
                    @click.prevent="toggleSelectImages()"
                    >Zaznacz wszystkie</a
                  >
                </div>
                <div class="col-md-3 col-6">
                  <a
                    class="btn btn-secondary btn-sm"
                    @click.prevent="toggleSelectImages(false)"
                    >Odznacz wszystkie</a
                  >
                </div>
                <div class="col-md-3 col-6">
                  <a
                    class="btn btn-secondary btn-sm"
                    @click.prevent="removeSelectedImages()"
                    >Usuń zaznaczone</a
                  >
                </div>
                <div class="col-md-3 col-6">
                  <a
                    class="btn btn-secondary btn-sm"
                    @click.prevent="duplicateSelectedImages()"
                    >Duplikuj zaznaczone</a
                  >
                </div>
              </div>
            </nav>
          </transition>
          <transition name="move">
            <nav class="toolbar" v-if="showToolbar">
              <div class="container">
                <div class="row align-items-center">
                  <div
                    class="col-12 col-md-3"
                    v-for="(option, k) in options"
                    :key="option.id"
                  >
                    <div class="form-group">
                      <label
                        :for="option.name"
                        class="label-sm"
                        v-text="option.name"
                      ></label>
                      <select
                        :name="option.name"
                        v-model="attributes[option.id]"
                        class="form-control form-control-sm"
                        :class="{ 'is-invalid': toolbarError }"
                      >
                        <option
                          v-for="attribute in option.attributes"
                          :value="attribute.id"
                          v-text="attribute.value"
                        ></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12 col-md-3">
                    <button
                      class="btn btn-secondary"
                      @click.prevent="setSelectedCombination()"
                    >
                      Zastosuj do zaznaczonych
                    </button>
                  </div>
                </div>
                <transition name="fade">
                  <p class="lead image-alert" v-if="toolbarError">
                    {{ toolbarError }}
                  </p>
                </transition>
              </div>
            </nav>
          </transition>
        </fieldset>

        <section class="summary my-4">
          <div class="row">
            <div class="col-md-6">
              <h3>Kadrowanie</h3>
              <p class="lead">
                <sup>*</sup>Bez ramki - jeśli proporcje Twojego zdjęcia są inne niż
                proporcje odbitki, część obrazu zostanie przycięta.
              </p>
              <p class="lead">
                <sup>*</sup>Z ramką - Twoje zdjęcie zostanie skadrowane jak w opcji Bez
                ramki, przy czym wokół zostanie dodane białe obramowanie o szerokości ok.
                4 mm.
              </p>
              <p class="lead">
                <sup>*</sup>Pełny kadr - jeśli proporcje Twojego zdjęcia są inne niż
                proporcje odbitki, z dwóch stron pojawią się białe paski.
              </p>

              <h3>Rodzaje papieru</h3>
              <p class="lead">
                <sup>*</sup>Matowy - papier matowy charakteryzuje się chropowatą,
                nieregularną strukturą, która idealnie niweluje odbicia światła. Papier
                matowy jest odporny na zarysowania i nie pozostają na nim odciski palców.
                Gramatura 215 g/m2.
              </p>
              <p class="lead">
                <sup>*</sup>Błyszczący - papier błyszczący wyróżnia charakterystyczna dla
                niego powierzchnia z połyskiem, która sprawia, że barwy zdjęcia wydają się
                żywe i czyste. Papier ten posiada nieznacznie większe maksymalne nasycenie
                barw i głębokość czerni. Gramatura 215 g/m2.
              </p>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Podsumowanie</h4>
                  <div class="table-fluid">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td>Ilość zdjęć</td>
                          <td>{{ getImagesQty() }}</td>
                        </tr>
                        <tr>
                          <td>Cena (z VAT)</td>
                          <td>{{ displayPrice(getTotalPrice()) }}</td>
                        </tr>
                        <tr>
                          <td>Cena (bez VAT)</td>
                          <td>{{ displayPrice(getTotalPrice(false)) }}</td>
                        </tr>
                        <tr>
                          <td>Do zapłaty</td>
                          <td>{{ displayPrice(getTotalPrice()) }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <fieldset class="address mt-5">
          <h3 class="heading-small">2. Uzupłnij formularz adresowy</h3>
          <div class="row">
            <div class="form-group col-md-6 col-sm-12">
              <label for="firstname">Imię:</label>
              <input
                type="text"
                name="firstname"
                class="form-control"
                placeholder="np. Jan"
                required
                v-bind:class="{ 'is-invalid': errors.firstname }"
                v-model="fields.firstname"
              />
              <transition name="fade">
                <div v-for="error in errors.firstname" class="invalid-feedback d-block">
                  {{ error }}
                </div>
              </transition>
            </div>
            <div class="form-group col-md-6 col-sm-12">
              <label for="lastname">Nazwisko:</label>
              <input
                type="text"
                name="lastname"
                class="form-control"
                placeholder="np. Kowalski"
                required
                v-bind:class="{ 'is-invalid': errors.lastname }"
                v-model="fields.lastname"
              />
              <transition name="fade">
                <div v-for="error in errors.lastname" class="invalid-feedback d-block">
                  {{ error }}
                </div>
              </transition>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-sm-12">
              <label for="email">Email:</label>
              <input
                type="email"
                name="email"
                class="form-control"
                placeholder="np. jan.kowalski@gmail.com"
                required
                v-bind:class="{ 'is-invalid': errors.email }"
                v-model="fields.email"
              />
              <transition name="fade">
                <div v-for="error in errors.email" class="invalid-feedback d-block">
                  {{ error }}
                </div>
              </transition>
            </div>
            <div class="form-group col-md-6 col-sm-12">
              <label for="phone_number">Numer telefonu:</label>
              <input
                type="tel"
                name="phone_number"
                class="form-control"
                placeholder="np. 77 410 00 00"
                required
                v-bind:class="{ 'is-invalid': errors.phone_number }"
                v-model="fields.phone_number"
              />
              <transition name="fade">
                <div
                  v-for="error in errors.phone_number"
                  class="invalid-feedback d-block"
                >
                  {{ error }}
                </div>
              </transition>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-sm-12">
              <label for="email">Ulica:</label>
              <input
                type="text"
                name="street"
                class="form-control"
                placeholder="np. ul. Jana Pawła 3"
                required
                v-bind:class="{ 'is-invalid': errors.street }"
                v-model="fields.street"
              />
              <transition name="fade">
                <div v-for="error in errors.street" class="invalid-feedback d-block">
                  {{ error }}
                </div>
              </transition>
            </div>
            <div class="form-group col-md-6 col-sm-12">
              <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                  <label for="home_number">Numer domu:</label>
                  <input
                    type="text"
                    name="home_number"
                    class="form-control"
                    placeholder="np. 7b"
                    required
                    v-bind:class="{ 'is-invalid': errors.home_number }"
                    v-model="fields.home_number"
                  />
                  <transition name="fade">
                    <div
                      v-for="error in errors.home_number"
                      class="invalid-feedback d-block"
                    >
                      {{ error }}
                    </div>
                  </transition>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                  <label for="flat_number">Numer mieszkania:</label>
                  <input
                    type="number"
                    name="flat_number"
                    class="form-control"
                    placeholder="np. 7"
                    v-bind:class="{ 'is-invalid': errors.flat_number }"
                    v-model="fields.flat_number"
                  />
                  <transition name="fade">
                    <div
                      v-for="error in errors.flat_number"
                      class="invalid-feedback d-block"
                    >
                      {{ error }}
                    </div>
                  </transition>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6 col-sm-12">
              <label for="postcode">Kod pocztowy:</label>
              <input
                type="text"
                name="postcode"
                class="form-control"
                placeholder="np. 55-219"
                required
                v-bind:class="{ 'is-invalid': errors.postcode }"
                v-model="fields.postcode"
              />
              <transition name="fade">
                <div v-for="error in errors.postcode" class="invalid-feedback d-block">
                  {{ error }}
                </div>
              </transition>
            </div>
            <div class="form-group col-md-6 col-sm-12">
              <label for="city">Miasto:</label>
              <input
                type="text"
                name="city"
                class="form-control"
                placeholder="np. Warszawa"
                required
                v-bind:class="{ 'is-invalid': errors.city }"
                v-model="fields.city"
              />
              <transition name="fade">
                <div v-for="error in errors.city" class="invalid-feedback d-block">
                  {{ error }}
                </div>
              </transition>
            </div>
          </div>
        </fieldset>
        <div class="form-group mt-3 d-flex align-items-center">
          <input
            type="checkbox"
            class="form-control-checkbox"
            v-model="fields.cgv"
            name="cgv"
            id="cgv"
          />
          <span class="form-checkbox" :class="{ 'checkbox-error': errors.cgv }"></span>
          <label for="cgv" :class="{ 'checkbox-error': errors.cgv }"
            >Akceptuje regulamin oraz warunki korzystania z usług</label
          >
        </div>

        <div class="form-group d-flex align-items-center">
          <input
            type="checkbox"
            class="form-control-checkbox"
            v-model="fields.newsletter"
            name="newsletter"
            id="newsletter"
          />
          <span class="form-checkbox"></span>
          <label for="newsletter">Zapisz mnie do subskrybcji newslettera</label>
        </div>
        <fieldset class="payments mt-5">
          <h3 class="heading-small">3. Wybierz metodę płatności</h3>
          <!-- <transition name="fade">
            <div
              class="form-group d-flex align-items-center"
              v-if="displayPrice(getTotalPrice(), false, false) <= 1000"
            >
              <input
                type="radio"
                class="form-control-radio"
                :value="1"
                name="payment"
                id="payment_1"
                v-model="fields.payment_id"
              />
              <span class="form-radio"></span>
              <label for="payment_1">W punkcie sprzedaży</label>
            </div>
          </transition> -->
          <div class="form-group d-flex align-items-center">
              <input
                type="radio"
                class="form-control-radio"
                :value="1"
                name="payment"
                id="payment_1"
                v-model="fields.payment_id"
              />
              <span class="form-radio"></span>
              <label for="payment_1">W punkcie sprzedaży (możliwość płatności gotówka lub kartą)</label>
            </div>
          <!-- <div class="form-group d-flex align-items-center">
            <input
              type="radio"
              class="form-control-radio"
              :value="2"
              name="payment"
              id="payment_2"
              v-model="fields.payment_id"
            />
            <span class="form-radio"></span>
            <label for="payment_2">Przedpłata na konto</label>
          </div> -->
        </fieldset>

        <div class="d-flex justify-content-end mb-5 mt-3">
          <transition name="fade">
            <svg
              v-if="isSending"
              width="50px"
              height="50px"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 100 100"
              preserveAspectRatio="xMidYMid"
              class="lds-rolling mr-2"
            >
              <circle
                cx="50"
                cy="50"
                fill="none"
                stroke="#000"
                stroke-width="4"
                r="35"
                stroke-dasharray="164.93361431346415 56.97787143782138"
                transform="rotate(41.7316 50 50)"
              >
                <animateTransform
                  attributeName="transform"
                  type="rotate"
                  calcMode="linear"
                  values="0 50 50;360 50 50"
                  keyTimes="0;1"
                  dur="1s"
                  begin="0s"
                  repeatCount="indefinite"
                ></animateTransform>
              </circle>
            </svg>
          </transition>
          <button
            type="submit"
            class="btn btn-primary btn-lg"
            :disabled="isSending"
            v-bind:class="{ sending: isSending }"
          >
            Złóż zamówienie
          </button>
        </div>
      </form>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import { delay, isEqual, replace } from "lodash";
import heic2any from "heic2any";

export default {
  data() {
    return {
      pending: false,
      converting: false,
      totalToUpload: 0,
      totalUploaded: 0,
      errors: false,
      isSending: false,
      selectImages: false,
      options: false,
      default_combination: false,
      combinations: false,
      imagesIds: 0,
      imageToLarge: false,
      attributes: [],
      fields: {
        images: [],
        firstname: "",
        lastname: "",
        email: "",
        phone_number: "",
        street: "",
        home_number: "",
        flat_number: "",
        postcode: "",
        city: "",
        newsletter: false,
        cgv: false,
        payment_id: 1,
      },
      showToolbar: false,
      toolbarError: false,
    };
  },

  metaInfo() {
    return {
      titleTemplate: `%s | Zamów zdjęcia`,
    };
  },

  created() {
    this.getOptions();
    this.getCombinations();
  },

  methods: {
    getOptions() {
      axios("/api/options")
        .then((resp) => resp.data)
        .then((resp) => {
          this.options = resp;
        });
    },

    getCombinations() {
      axios("/api/combinations")
        .then((resp) => resp.data)
        .then((resp) => {
          this.combinations = resp;
          this.default_combination = Object.assign(
            {},
            this.getDefaultCombination()
          );
          this.attributes = Object.assign({}, this.default_combination.attributes)
        });
    },

    getTotalPrice(tax = true) {
      let totalPrice = 0;

      this.fields.images.map((image) => {
        if (!image.error)
          totalPrice += tax
            ? image.price * image.qty
            : image.price * 0.77 * image.qty;
      });

      return totalPrice;
    },

    getImagesQty() {
      let totalQty = 0;
      this.fields.images.map((image) => {
        totalQty += parseInt(image.qty);
      });
      return totalQty;
    },

    async addImages(e) {
      const files = e.target.files;

      this.totalToUpload = files.length;
      this.totalUploaded = 0;
      this.pending = true;

      for (let i = 0; i < files.length; i++) {
        const file = files[i];
          await this.uploadImage(file);
      }
      this.pending = false;
    },

    convert(file) {
      return new Promise((resolve, reject) => {

        file.arrayBuffer().then(async (arrayBuffer) => {
          let blob = new Blob([new Uint8Array(arrayBuffer)], {type: file.type });

          const conversionResult = await heic2any({
            blob,
            toType:"image/png",
            quality: 1
          });

          resolve(conversionResult)
        });
        
      });
    },

    async uploadImage(file) {
      if(file.name.includes('heic') || file.name.includes('HEIC')) {
        this.converting = true;
        const blob = await this.convert(file);
        let fileName = file.name.split('.').slice(0, -1).join('.') + ".png";
        file = new File([blob], fileName, {
          type: "image/png",
          lastModified: Date.now()
        });
        this.converting = false;
      }

      

      const formData = new FormData();
      formData.append(`image`, file);
      const image = {
        id: (this.imagesIds += 1),
        selected: false,
        id_combination: this.default_combination.id,
        attributes: Object.assign({}, this.default_combination.attributes),
        price: this.default_combination.price,
        qty: 1,
        file: file,
        errors: false,
      };
      image.dataImage = await this.readFile(file);
      await axios
        .post(`/api/order/image`, formData)
        .then((resp) => {
          image.name = resp.data;
          this.totalUploaded += 1;
          this.fields.images.push(image);
          this.checkCombinations();
        }).catch((err) => {
          console.log(err.response)
          this.$notify({
            group: "notify",
            type: "error",
            title: file.name,
            duration: 40000,
            text: err.response.data.errors.image.join('.'),
          });
        });
    },

    readFile(file, readAs = 'DataURL') {
      return new Promise((resolve, reject) => {
        const reader = new FileReader();

        reader.onload = () => {
          resolve(reader.result);
        };
        reader.onerror = reject;
        
        switch (readAs) {
          case 'DataURL':
            reader.readAsDataURL(file);
            break;
          case 'ArrayBuffer':
            reader.readAsArrayBuffer(file);
            break;
          case 'BinaryString':
            reader.readAsBinaryString(file);
            break;
          case 'Text':
            reader.readAsText(file);
            break;
          default:
            reject('Incorent read as prop')
            break;
        }
      });
    },

    getImageIndexById(id_image) {
      let id = false;
      this.fields.images.map((image, index) => {
        if (image.id == id_image) {
          return (id = index);
        }
      });
      return id;
    },

    removeImage(id_image) {
      this.fields.images = this.fields.images.filter((image) => {
        return image.id != id_image;
      });
      this.checkCombinations();
    },

    duplicateImage(index) {
      const old_image = this.fields.images[index];
      const new_image = {
        id: (this.imagesIds += 1),
        dataImage: old_image.dataImage,
        selected: old_image.selected,
        id_combination: old_image.id_combination,
        attributes: Object.assign([], old_image.attributes),
        price: old_image.price,
        qty: old_image.qty,
        file: old_image.file,
        name: old_image.name,
      };

      this.fields.images.push(new_image);
    },

    selectImage(index) {
      const image = this.fields.images[index];
      image.selected = image.selected ? false : true;
    },

    toggleSelectImages(select = true) {
      if (!select) this.showToolbar = false;

      this.fields.images.map((image) => {
        image.selected = select;
      });

      if (select) this.showToolbar = true;
    },

    duplicateSelectedImages() {
      this.fields.images.map((image, index) => {
        return image.selected ? this.duplicateImage(index) : false;
      });
      this.checkCombinations();
    },

    removeSelectedImages() {
      this.fields.images.map((image) => {
        return image.selected ? this.removeImage(image.id) : false;
      });
      this.checkCombinations();
    },

    changeCombination(image, check_combinations = true) {
      const combination = this.findCombination(image.attributes);

      if (combination) {
        image.error = false;
        image.id_combination = combination.id;

        if (!isEqual(combination.attributes, image.attributes))
          image.attributes = Object.assign([], combination.attributes);

        if (combination.price_rules) {
          const combinationQty = this.getImagesCountByIdCombination(
            image.id_combination
          );
          const rule = combination.price_rules.find((rule) => {
            return (
              rule.min_images_count <= combinationQty &&
              rule.max_images_count >= combinationQty
            );
          });

          if (rule) {
            image.price = rule.price;
          } else {
            image.price = combination.price;
          }
        } else {
          image.price = combination.price;
        }
      } else {
        image.error = "Wariant niedostępny";
      }
      if (check_combinations) this.checkCombinations();
    },

    checkCombinations() {
      this.fields.images.map((image) => {
        delay(() => {
          this.changeCombination(image, false);
        }, 0);
      });
    },

    findCombination(attributes) {
      let result = false;
      let selected_attributes = Object.assign([], attributes);
      selected_attributes = selected_attributes.join('-')

      this.combinations.map((combination) => {
        let combination_attributes = Object.assign([], combination.attributes);
        combination_attributes = combination_attributes.join('-')

        if(combination_attributes == selected_attributes) {
          result = Object.assign({}, combination);
        }
      });
      return result;
    },

    sortArray(arr) {
      return arr.sort((a, b) => {
         return a - b;
       });
    },

    getImagesCountByIdCombination(id_combination) {
      let combinationQty = 0;

      this.fields.images.map((image) => {
        if (image.id_combination == id_combination) {
          combinationQty += parseInt(image.qty);
        }
      });

      return combinationQty;
    },

    displayPrice(price, qty = false, unit = true) {
      return `${(qty ? (price / 100) * qty : price / 100).toFixed(2)}${
        unit ? " zł" : ""
      }`;
    },

    setSelectedCombination() {
      const combination = this.findCombination(this.attributes);

      if (!combination) {
        this.toolbarError = "Wariant niedostępny. Wybierz inną opcję";
      }

      if (combination) {
        this.toolbarError = false;
        this.fields.images.map((image) => {
          if (image.selected) {
            image.attributes = Object.assign([], combination.attributes);
          }
        });
        this.checkCombinations();
      }
    },

    getDefaultCombination() {
      let default_combination = false;

      this.combinations.map((combination) => {
        if (combination.default) {
          default_combination = Object.assign({}, combination);
        }
      });

      return default_combination;
    },

    getDefaultAttributes() {
      const default_combination = getDefaultCombination();
      return default_combination.attributes;
    },

    submitOrder(e) {
      let formData = new FormData();
      formData.append("firstname", this.fields.firstname);
      formData.append("lastname", this.fields.lastname);
      formData.append("email", this.fields.email);
      formData.append("phone_number", this.fields.phone_number);
      formData.append("cgv", this.fields.cgv);
      formData.append("newsletter", this.fields.newsletter);
      formData.append("remember_token", token.content);
      formData.append("payment_id", this.fields.payment_id);
      formData.append("street", this.fields.street);
      formData.append("home_number", this.fields.home_number);
      formData.append("flat_number", this.fields.flat_number);
      formData.append("city", this.fields.city);
      formData.append("postcode", this.fields.postcode);

      this.fields.images.map((image, key) => {
        // formData.append(`image[${key}]`, image.file);
        formData.append(`image[${key}]`, image.name);
        formData.append(
          `combination_id[${key}]`,
          parseInt(image.id_combination)
        );
        formData.append(`qty[${key}]`, parseInt(image.qty));
      });

      if (!this.isSending) {
        this.isSending = true;
        axios
          .post(`/api/order/new`, formData)
          .then((resp) => {
            this.isSending = false;
            this.$router.push(`/potwierdzenie/${resp.data.token}`);
          })
          .catch((err) => {
            this.isSending = false;
            if (err.response.status == 422) {
              this.errors = err.response.data.errors;
            }
          });
      }
    },
  },
};
</script>
