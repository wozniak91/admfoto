import Vue from 'vue'
import Router from 'vue-router'
import Home from './../components/HomeComponent';
import Page from './../components/PageComponent';
import Order from './../components/Order/OrderComponent';
import OrderConfirmation from './../components/Order/OrderConfirmationComponent';

Vue.use(Router)

export default new Router({
	mode: 'history',
	linkActiveClass: 'active',
		routes: [
		{
			path: '',
			name: 'home',
			component: Home,
			meta: {
				title: 'FotoAdamski - Fotografia ślubna'
			}
		},
		{
			path: '/potwierdzenie/:token',
			name: 'confirm',
			component: OrderConfirmation
		},
		{
			path: '/:id-:title',
			name: 'page',
			component: Page
		},
		{
			path: '/zamowienie',
			name: 'order',
			component: Order
		},
	],
	scrollBehavior (to, from, savedPosition) {
		return { x: 0, y: 0 }
	}
})
