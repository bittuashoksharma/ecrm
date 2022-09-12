<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Financial Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <router-link to="/dashboard">Dashboard</router-link>
            </li>
            <li class="breadcrumb-item active">Employee</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        	<div class="row">
        		<div class="col-md-8">
              <div class="card-header">
                <h3 class="card-title">Financial Details</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="basis_salary" class="col-sm-5 col-form-label">Basic Salary*</label>
                  <div class="col-sm-5">
                    <input type="text" v-model="form.basis_salary" class="form-control" id="basis_salary" placeholder="Enter Basic Salary"  />
                    <div v-if="errors.basis_salary" class="text-danger">{{ errors.basis_salary[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <select class="form-control select2 col-sm-4" style="width: 100%;" v-model="form.allowances" name="allowances" id="allowances" >
                    <option value="">Select Allowances</option>
                    <option value="1">Allowances 1</option>
                    <option value="2">Allowances 2</option>
                  </select>
                  <div v-if="errors.allowances" class="text-danger">{{ errors.allowances[0] }}</div>
                  <div class="col-sm-5 offset-md-1">
                    <input type="text" v-model="form.allowances_amount" class="form-control" id="allowances_amount" placeholder="Enter Allowances Amount"  />
                    <div v-if="errors.allowances_amount" class="text-danger">{{ errors.allowances_amount[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <select class="form-control select2 col-sm-4" style="width: 100%;" v-model="form.deductions" name="deductions" id="deductions" >
                    <option value="">Select Deduction</option>
                    <option value="1">Deduction 1</option>
                    <option value="2">Deduction 2</option>
                  </select>
                  <div v-if="errors.deductions" class="text-danger">{{ errors.deductions[0] }}</div>
                  <div class="col-sm-5 offset-md-1">
                    <input type="text" v-model="form.deductions_amount" class="form-control" id="deductions_amount" placeholder="Enter Deduction Amount" />
                    <div v-if="errors.deductions_amount" class="text-danger">{{ errors.deductions_amount[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="monthly_salary" class="col-sm-5 col-form-label">Monthly Salary*</label>
                  <div class="col-sm-5">
                    <input type="text" v-model="form.monthly_salary" class="form-control" id="monthly_salary" placeholder="Enter Monthly Salary"  />
                    <div v-if="errors.monthly_salary" class="text-danger">{{ errors.monthly_salary[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="yearly_salary" class="col-sm-5 col-form-label">Yearly  Salary*</label>
                  <div class="col-sm-5">
                    <input type="text" v-model="form.yearly_salary" class="form-control" id="yearly_salary" placeholder="Enter Yearly Salary"  />
                    <div v-if="errors.yearly_salary" class="text-danger">{{ errors.yearly_salary[0] }}</div>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="card-footer col-md-12">
              <button type="submit" @click="addEmployeeFinancialDetail" class="btn btn-primary float-sm-right mr-20">Submit</button>
            </div>
          </div>
        
      </div>
    </div>
  </div>
</template>
<script setup>
	import { ref, onMounted , reactive} from 'vue';
	import { useToastr } from '../../toastr.js';
	const errors = ref('');
	const toastr = useToastr();
	const form = reactive({
				user_id: localStorage.getItem('emp_id'),
        basis_salary: '',
        allowances: '',
        allowances_amount: '',
        deductions: '',
        deductions_amount: '',
        monthly_salary: '',
        yearly_salary: '',
	});

	const addEmployeeFinancialDetail = () => {
    errors.value = '';
		axios.post('/api/add-employee-financial-detail',form).then((response) => {
          if(response.data.code == 'success'){
              window.location = '/employee/bank-account-detail';
          }else{
             console.log(response.data.message);
             Swal.fire('Failed!', response.data.message, 'warning');
          }
          
		}).catch((e) => {
          if (e.response.status === 422) {
              errors.value = e.response.data.errors;
          }
    });
	}

	onMounted (() => {
			toastr.info('Success');
	});

</script>
