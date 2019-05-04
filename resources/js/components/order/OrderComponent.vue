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
								<span class="image-select__text">Przeciągnij i upuść zdjęcia</span>
								<input type="file" class="form-images-control" 
									accept="image/x-png,image/png,image/jpeg,image/jpg" 
									@change="addImage" multiple required>
							</div>
							<transition name="fade">
							<aside class="alert alert-danger" v-if="errors.image">
								<ul class="m-0 pl-3">
									<li v-for="error in errors.image" v-text="error"></li>
								</ul>
							</aside>
							</transition>
							<transition-group name="image" tag="div" class="images-group row" v-if="options">
								
								<article v-for="(image, key) in fields.images" class="col-12 col-lg-3 col-md-4 mb-3 image" :key="image.id">
									<div class="image-container" :class="{'selected' : image.selected }">
										<transition name="fade">
											<div class="image-loader" v-if="!image.name">
												<svg width="100"  height="100"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-infinity" style="background: none;">
													<path fill="none" d="M24.3,30C11.4,30,5,43.3,5,50s6.4,20,19.3,20c19.3,0,32.1-40,51.4-40 C88.6,30,95,43.3,95,50s-6.4,20-19.3,20C56.4,70,43.6,30,24.3,30z" stroke="#000000" stroke-width="2" stroke-dasharray="2.5658892822265624 2.5658892822265624">
														<animate attributeName="stroke-dashoffset" calcMode="linear" values="0;256.58892822265625" keyTimes="0;1" dur="6.7" begin="0s" repeatCount="indefinite"></animate>
													</path>
												</svg>
											</div>
										</transition>
										<div class="image-actions" role="group">
											<a class="btn btn-light btn-sm image-btn" title="Duplikuj" @click.prevent="duplicateImage(key)">
												<i class="icon-docs"></i>
											</a>
											<a class="btn btn-light btn-sm image-btn" title="Usuń" @click.prevent="removeImage(image.id)">
												<i class="icon-trash-empty"></i>
											</a>
											<a class="btn btn-light btn-sm image-btn" title="Zaznacz" @click.prevent="selectImage(key)">
												<i class="icon-select"></i>
											</a>
										</div>

										<figure class="image-content">
											<img :src="image.dataImage" class="img-fluid image-source" width="128" height="128">
										</figure>

										<div class="image-actions text-left py-2" role="group">

											<div class="form-group image-group px-2" v-for="(option, k) in options" :key="option.id">
												<label :for="option.name" class="label-sm" v-text="option.name"></label>
												<select :name="option.name" class="form-control form-control-sm" v-model.lazy="image.attributes[k]" @change.prevet="changeCombination(image)">
													<option v-for="attribute in option.attributes" :value="attribute.id" v-text="attribute.value"></option>
												</select>
											</div>
											<div class="form-group image-group px-2">
												<label for="qty" class="label-sm">Ilość</label>
												<input name="qty" type="number" step="1" min="1" value="1" class="form-control form-control-sm" v-model="image.qty" @change.prevet="changeCombination(image)"/>
											</div>

										</div>
										<p class="image-price" v-if="!image.error">{{ displayPrice(image.price, image.qty) }}</p>
										<p class="image-alert" v-if="image.error" v-text="image.error"></p>

									</div>
								</article>
						
							</transition-group>

							<transition name="fade">
							<nav class="image-toolbar" v-if="fields.images.length > 0">
								
									<div class="row d-flex justify-content-center">
										<div class="col-md-3 col-6">
											<a class="btn btn-secondary btn-sm" @click.prevent="toggleSelectImages()">Zaznacz wszystkie</a>
										</div>
										<div class="col-md-3 col-6">
											<a class="btn btn-secondary btn-sm" @click.prevent="toggleSelectImages(false)">Odznacz wszystkie</a>
										</div>
										<div class="col-md-3 col-6">
											<a class="btn btn-secondary btn-sm" @click.prevent="removeSelectedImages()">Usuń zaznaczone</a>
										</div>
										<div class="col-md-3 col-6">
											<a class="btn btn-secondary btn-sm" @click.prevent="duplicateSelectedImages()">Duplikuj zaznaczone</a>
										</div>	
									</div>
									
							</nav>
							</transition>
						</fieldset>

						<section class="summary my-4">

							<div class="row">
								<div class="col-md-6">

									<h3 class="heading-middle">Jakie są rodzaje kadrowania?</h3>
									<p class="lead"><sup>*</sup><span class="font-weight-bold">Bez ramki - </span>jeśli proporcje Twojego zdjęcia są inne niż proporcje odbitki, część obrazu zostanie przycięta.</p>
									<p class="lead"><sup>*</sup><span class="font-weight-bold">Z ramką - </span>Twoje zdjęcie zostanie skadrowane jak w opcji Bez ramki, przy czym wokół zostanie dodane białe obramowanie o szerokości ok. 4 mm.</p>
									<p class="lead"><sup>*</sup><span class="font-weight-bold">Pełny kadr - </span>jeśli proporcje Twojego zdjęcia są inne niż proporcje odbitki, z dwóch stron pojawią się białe paski.</p>

									<h3 class="heading-middle">Jakie są rodzaje papieru?</h3>
									<p class="lead"><sup>*</sup><span class="font-weight-bold">Matowy - </span> papier matowy charakteryzuje się chropowatą, nieregularną strukturą, która idealnie niweluje odbicia światła. Papier matowy jest odporny na zarysowania i nie pozostają na nim odciski palców. Gramatura 215 g/m2.</p>
									<p class="lead"><sup>*</sup><span class="font-weight-bold">Błyszczący - </span>papier błyszczący wyróżnia charakterystyczna dla niego powierzchnia z połyskiem, która sprawia, że barwy zdjęcia wydają się żywe i czyste. Papier ten posiada nieznacznie większe maksymalne nasycenie barw i głębokość czerni. Gramatura 215 g/m2.</p>

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
															<td> {{ getImagesQty() }}</td>
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
							<h3 class="heading-small">
								2. Uzupłnij formularz adresowy
							</h3>
							<div class="row">
								<div class="form-group col-md-6 col-sm-12">
									<label for="firstname">Imię:</label>
									<input type="text" name="firstname" class="form-control" placeholder="np. Jan" required
									v-bind:class="{ 'is-invalid': errors.firstname }" v-model="fields.firstname">
									<transition name="fade">
										<div v-for="error in errors.firstname" class="invalid-feedback d-block">
											{{ error }}
										</div>
									</transition>
								</div>
								<div class="form-group col-md-6 col-sm-12">
									<label for="lastname">Nazwisko:</label>
									<input type="text" name="lastname" class="form-control" placeholder="np. Kowalski" required
									v-bind:class="{ 'is-invalid': errors.lastname }" v-model="fields.lastname">
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
									<input type="email" name="email" class="form-control" placeholder="np. jan.kowalski@gmail.com" required
									v-bind:class="{ 'is-invalid': errors.email }" v-model="fields.email">
									<transition name="fade">
										<div v-for="error in errors.email" class="invalid-feedback d-block">
											{{ error }}
										</div>
									</transition>
								</div>
								<div class="form-group col-md-6 col-sm-12">
									<label for="phone_number">Numer telefonu:</label>
									<input type="tel" name="phone_number" class="form-control" placeholder="np. 77 410 00 00" required
									v-bind:class="{ 'is-invalid': errors.phone_number }" v-model="fields.phone_number">
									<transition name="fade">
										<div v-for="error in errors.phone_number" class="invalid-feedback d-block">
											{{ error }}
										</div>
									</transition>
								</div>

							</div>
						</fieldset>
						<div class="form-group mt-3 d-flex align-items-center">
							<input type="checkbox" class="form-control-checkbox" v-model="fields.cgv" name="cgv" id="cgv" />
							<span class="form-checkbox" :class="{'checkbox-error' : errors.cgv}"></span>
							<label for="cgv" :class="{'checkbox-error' : errors.cgv}">Akceptuje regulamin oraz warunki korzystania z usług</label>

						</div>

						<div class="form-group d-flex align-items-center">
							<input type="checkbox" class="form-control-checkbox" v-model="fields.newsletter" name="newsletter" id="newsletter"/>
							<span class="form-checkbox"></span>
							<label for="newsletter">Zapisz mnie do subskrybcji newslettera</label>
						</div>
						<fieldset class="payments mt-5">
							<h3 class="heading-small">
								3. Wybierz metodę płatności
							</h3>
							<transition name="fade">
							<div class="form-group d-flex align-items-center" v-if="(displayPrice(getTotalPrice(), false, false) <= 200)">
								<input type="radio" class="form-control-radio" :value="1" name="payment" id="payment_1" v-model="fields.payment_id" />
								<span class="form-radio"></span>
								<label for="payment_1">Płatność przy odbiorze</label>
							</div>
							</transition>
							<div class="form-group d-flex align-items-center">
								<input type="radio" class="form-control-radio" :value="2"  name="payment" id="payment_2" v-model="fields.payment_id" />
								<span class="form-radio"></span>
								<label for="payment_2">Przedpłata na konto</label>
							</div>
						</fieldset>

						<div class="d-flex justify-content-end mb-5">
							<button type="submit" class="btn btn-primary mt-3" v-bind:class="{ 'sending': isSending }">
								Złóż zamówienie
							</button>
						</div>

					</form>

		</div>

	</section>
</template>

<script>
import axios from 'axios';

export default {

	data() {

		return {
			errors: false,
			isSending: true,
			selectImages: false,
			options: false,
			default_combination: false,
			combinations: false,
			imagesIds: 0,
			imageToLarge: false,
			fields: {
				images: [],
				firstname: '',
				lastname: '',
				email: '',
				phone_number: '',
				newsletter: false,
				cgv: false,
				payment_id: 2
			},
		}

	},

	metaInfo () {
      return {
        	titleTemplate: `%s | Zamów zdjęcia`,
		}
	},

	created() {
		this.getOptions();
		this.getCombinations();
	},

	methods: {
		getOptions() {
			axios('/api/options').
				then(resp => resp.data).
				then(resp => {
					this.options = resp;
				});
		},

		getCombinations() {
			axios('/api/combinations').
				then(resp => resp.data).
				then(resp => {
					this.combinations = resp;
					this.default_combination = this.getDefaultCombination();
				});
		},

		getTotalPrice(tax = true) {

			let totalPrice = 0;

			this.fields.images.map(image => {
				if(!image.error)
					totalPrice += tax ? image.price*image.qty : image.price*0.77*image.qty;
			});
			
			return totalPrice;

		},

		getImagesQty() {

			let totalQty = 0;

			this.fields.images.map(image => {
				totalQty += parseInt(image.qty);
			});

			return totalQty;
		},

		addImage(e) {
			const files = e.target.files;

			Array.from(files).forEach(file => {
				if(file.size < 8000000) {
					this.errors = false;
					this.getImageRender(file);
				} else {
					this.errors = {
						image: [
							'Podane zdjęcie przekracza rozmiar 8Mb'
						]
					};
				}
			});

			
		},

 		async getImageRender(file) {

			const reader = new FileReader();
			reader.readAsDataURL(file);

			const image = {
				id: this.imagesIds += 1,
				dataImage: false,
				selected: false,
				id_combination: this.default_combination.id,
				attributes: Object.assign([], this.default_combination.attributes),
				price: this.default_combination.price,
				qty: 1,
				file: file,
				name: false,
			}

			this.imageUpload(image);

			reader.onloadend = () => {
				image.dataImage = reader.result;
				this.fields.images.push(image);
				this.checkCombinations();
			}
		},
		
		async imageUpload(image) {

			if(!image.name) {

				let formData = new FormData();
				formData.append(`image`, image.file);

				axios.post(`/api/order/image`, formData)
					.then(resp => {
						image.name = resp.data;

					}).catch(err => {
						this.removeImage(image.id);
						this.errors = err.response.data.errors;
					});
			}
		},

		getImageIndexById(id_image) {

			let id = false;

			this.fields.images.map((image, index) => {

				if(image.id == id_image) {
					return id = index;
				}
			});

			return id;
		},

		removeImage(id_image) {

			this.fields.images = this.fields.images.filter(image => {
				return image.id != id_image;
			});
			this.checkCombinations();
		},

		duplicateImage(index) {

			const image = Object.assign({}, this.fields.images[index]);

			image.id = this.imagesIds += 1;

			return this.fields.images.push(image);
	
		},

		selectImage(index) {

			const image = this.fields.images[index];

			image.selected = image.selected ? false : true;

		},

		toggleSelectImages(select = true) {

			this.fields.images.map(image => {
				image.selected = select;
			});

		},

		duplicateSelectedImages() {

			this.fields.images.map((image, index) => {

					return image.selected ? this.duplicateImage(index) : false;
			});

		},

		removeSelectedImages() {

			this.fields.images.map(image => {
				return image.selected ? this.removeImage(image.id) : false;
			});
			this.checkCombinations();

		},

		changeCombination(image) {

			const combination = this.findCombination(image.attributes);

			if(combination) {
				image.error = false;
				image.id_combination = combination.id;
				image.attributes = Object.assign([], combination.attributes);
				
				if(combination.price_rules) {

					const combinationQty = this.getImagesCountByIdCombination(image.id_combination);
					const rule = combination.price_rules.find(rule => {
						return rule.min_images_count <= combinationQty && rule.max_images_count >= combinationQty;
					});

					if(rule) {
						image.price = rule.price;
					} else {
						image.price = combination.price;
					}
				} else {
					image.price = combination.price;
				}

			} else {
				image.error = 'Wariant niedostępny';
			}
			this.checkCombinations();
		},

		checkCombinations() {

			this.fields.images.map(image => {
				this.changeCombination(image);
			});

		},

		findCombination(attributes) {

			let result = false; 

			this.combinations.map(combination => {

				if(this._.isEqual(combination.attributes, attributes)) {
					result = Object.assign([], combination);
				} 

			});

			return result;
		},

		getImagesCountByIdCombination(id_combination) {

			let combinationQty = 0;

			this.fields.images.map(image => {

				if(image.id_combination == id_combination) {
					
					combinationQty += parseInt(image.qty);
				}

			});

			return combinationQty;
		},
		
		displayPrice(price, qty = false, unit = true) {

			return `${(qty ? price/100*qty : price/100).toFixed(2)}${unit ? ' zł' : ''}`;
		},

		getDefaultCombination() {

			let default_combination = false;

			this.combinations.map(combination => {

				if(combination.default) {
					default_combination = Object.assign({}, combination);
				}

			});

			return default_combination;

		},

		submitOrder(e) {

			let formData = new FormData();
			formData.append('firstname', this.fields.firstname);
			formData.append('lastname', this.fields.lastname);
			formData.append('email', this.fields.email);
			formData.append('phone_number', this.fields.phone_number);
			formData.append('cgv', this.fields.cgv);
			formData.append('newsletter', this.fields.newsletter);
			formData.append('remember_token', token.content);
			formData.append('payment_id', this.fields.payment_id);

			this.fields.images.map((image, key) => {
				// formData.append(`image[${key}]`, image.file);
				formData.append(`image[${key}]`, image.name);
				formData.append(`combination_id[${key}]`, parseInt(image.id_combination));
				formData.append(`qty[${key}]`, parseInt(image.qty));
			});
			this.isSending = true;
			
			axios.post(`/api/order/new`, formData)
				.then(resp => {
					
					this.$router.push(`/potwierdzenie/${resp.data.token}`);

				}).catch(err => {

					if(err.response.status == 422) {
					    this.errors = err.response.data.errors;
					}
				});

			},

		}


	}


	</script>
