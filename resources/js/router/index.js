import { createRouter, createWebHistory } from 'vue-router';

import dashboard from '@/components/Dashboard.vue';
import ManageEmployees from '@/components/employee/manage_employees.vue';
import PersonalDetail from '@/components/employee/employee_personal_details.vue';
import CompanyDetail from '@/components/employee/employee_company_details.vue';
import FinancialDetail from '@/components/employee/employee_financial_details.vue';
import BankAccountDetail from '@/components/employee/employee_bank_account_details.vue';
import DocumentsDetail from '@/components/employee/employee_documents_details.vue';

import OfferLetterDetail from '@/components/setting/offer_latter.vue';

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
		path:'/employees',
		name:'manage-employees',
		component:ManageEmployees,
	},
	{
		path:'/employee/personal-detail',
		name:'personal-detail',
		component:PersonalDetail,
	},
	{
		path:'/employee/company-detail',
		name:'company-detail',
		component:CompanyDetail,
	},
	{
		path:'/employee/financial-detail',
		name:'financial-detail',
		component:FinancialDetail,
	},
	{
		path:'/employee/bank-account-detail',
		name:'bank-account-detail',
		component:BankAccountDetail,
	},
	{
		path:'/employee/documents-detail',
		name:'documents-detail',
		component:DocumentsDetail,
	},

	{
		path:'/setting/offer-letter',
		name:'setting-offer-letter',
		component:OfferLetterDetail,
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