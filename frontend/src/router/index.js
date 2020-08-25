import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

	const routes = [
		{
			path: '/',
			name: 'FrontDashboard',
			meta:{
				title: "DASHBOARD"
			},
			component: () => import('../views/pages/front/Home.vue')
		},

		{
			path: '/login',
			name: 'FrontLogin',
			meta:{
				title: "LOGIN"
			},
			component: () => import('../views/pages/front/Login.vue')
		},

		//dmaster	
		{
			path: '/dmaster/jeniskegiatan',
			name: 'DMasterJenisKegiatan',
			meta:{
				title: "DATA MASTER - JENIS KEGIATAN",
				requiresAuth:true,
			},
			component: () => import('../views/pages/admin/dmaster/JenisKegiatan.vue'),		
		},

		//Konsultasi
		{
			path: '/konsultasi/kegiatan',
			name: 'KonsultasiKegiatan',
			meta:{
				title: "KONSULTASI - KEGIATAN",
				requiresAuth:true,
			},
			component: () => import('../views/pages/admin/konsultasi/Kegiatan.vue'),		
		},
	]

const router = new VueRouter({
	mode: 'history',
	base: process.env.BASE_URL,
	routes
})

export default router
