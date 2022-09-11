import { createRouter, createWebHistory } from 'vue-router';

import dashboard from '@/components/Dashboard.vue';
import AddEmployee from '@/components/employee/add_employee.vue';
import NotFound from '@/components/NotFound.vue';

const routes = [
	{
		path:'/dashboard',
		name:'dashboard',
		component:dashboard,
		meta: {
	    	requiresAuth: true,
	    	title: 'dashboard',
	    },
		
	},
	{
		path:'/employee/add-employee',
		name:'add-employee',
		component:AddEmployee,
	},
	{
	  path: '/:pathMatch(.*)*',
	  component: NotFound,
	},
]
const router = createRouter({
	history: createWebHistory(),
	routes,

}); 
export default router