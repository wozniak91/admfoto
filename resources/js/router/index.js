import Vue from 'vue'
import Router from 'vue-router'
import Home from './../components/HomeComponent';

Vue.use(Router)

export default new Router({
	mode: 'history',
	linkActiveClass: 'active',
		routes: [
		{
			path: '/',
			name: 'home',
			component: Home,
			meta: {
				title: 'FotoAdamski'
			}
		},
		{
			path: '/potwierdzenie/:token',
			name: 'confirm',
			component: () => import('./../components/Order/OrderConfirmationComponent')
		},
		{
			path: '/:id-:title',
			name: 'page',
			component: () => import('./../components/PageComponent')
		},
		{
			path: '/zamowienie',
			name: 'order',
			component: () => import('./../components/Order/OrderComponent')
		},
	],
	scrollBehavior (to, from, savedPosition) {
		return { x: 0, y: 0 }
	}
})
