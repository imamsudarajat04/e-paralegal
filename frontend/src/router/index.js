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

		{
			path: '/laporan/kegiatan',
			name: 'LaporanKegiatan',
			meta:{
				title: "LAPORAN - KEGIATAN",
				requiresAuth:true,
			},
			component: () => import('../views/pages/admin/laporan/Kegiatan.vue'),
		},

		//Users
		{
			path: '/users/superadmin',
			name: 'USERSUPERADMIN',
			meta:{
				title: "USERS - SUPERADMIN",
				requiresAuth:true,
			},
			component: () => import('../views/pages/admin/users/SuperAdmin.vue'),
		},

		{
			path: '/users/legal',
			name: 'USERLEGAL',
			meta:{
				title: "USERS - LEGAL",
				requiresAuth:true,
			},
			component: () => import('../views/pages/admin/users/UsersLegal.vue'),
		},
		
		{
			path: '/users/kades',
			name: 'USERKADES',
			meta:{
				title: "USERS - KADES",
				requiresAuth:true,
			},
			component: () => import('../views/pages/admin/users/UsersKades.vue'),
		},

		{
			path: '/users/pmb',
			name: 'USERPMB',
			meta:{
				title: "USERS - PMB",
				requiresAuth:true,
			},
			component: () => import('../views/pages/admin/users/UsersPmb.vue'),
		},
		
		{
			path: '/users/obh',
			name: 'USEROBH',
			meta:{
				title: "USERS - OBH",
				requiresAuth:true,
			},
			component: () => import('../views/pages/admin/users/UsersObh.vue'),
		},

		{
			path: '/users/kumham',
			name: 'USERKUMHAM',
			meta:{
				title: "USERS - KUMHAM",
				requiresAuth:true,
			},
			component: () => import('../views/pages/admin/users/UsersKumham.vue'),
		},
	]

const router = new VueRouter({
	mode: 'history',
	base: process.env.BASE_URL,
	routes
})

export default router
