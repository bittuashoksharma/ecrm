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
                  </div>
                </div>
                <div class="form-group row">
                  <select class="form-control select2 col-sm-4" style="width: 100%;" v-model="form.allowances" name="allowances" id="allowances" >
                    <option value="">Select Allowances</option>
                    <option value="1">Allowances 1</option>
                    <option value="2">Allowances 2</option>
                  </select>
                  <div class="col-sm-5 offset-md-1">
                    <input type="text" v-model="form.allowances_amount" class="form-control" id="allowances_amount" placeholder="Enter Allowances Amount"  />
                    
                  </div>
                </div>
                <div class="form-group row">
                  <select class="form-control select2 col-sm-4" style="width: 100%;" v-model="form.deduction" name="deduction" id="deduction" >
                    <option value="">Select Deduction</option>
                    <option value="1">Deduction 1</option>
                    <option value="2">Deduction 2</option>
                  </select>
                  <div class="col-sm-5 offset-md-1">
                    <input type="text" v-model="form.deduction_amount" class="form-control" id="deduction_amount" placeholder="Enter Deduction Amount" />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="monthly_salary" class="col-sm-5 col-form-label">Monthly Salary*</label>
                  <div class="col-sm-5">
                    <input type="text" v-model="form.monthly_salary" class="form-control" id="monthly_salary" placeholder="Enter Monthly Salary"  />
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label for="yearly_salary" class="col-sm-5 col-form-label">Yearly  Salary*</label>
                  <div class="col-sm-5">
                    <input type="text" v-model="form.yearly_salary" class="form-control" id="yearly_salary" placeholder="Enter Yearly Salary"  />
                    
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
	
	const toastr = useToastr();
	const form = reactive({
				user_id: '',
        basis_salary: '',
        allowances: '',
        allowances_amount: '',
        deduction: '',
        deduction_amount: '',
        monthly_salary: '',
        yearly_salary: '',
	});

	const addEmployeeFinancialDetail = () => {
		axios.post('/api/add-employee-financial-detail',form).then((response) => {
				Swal.fire('Failed!', 'Something went wrong.', 'warning');
		});
	}

	onMounted (() => {
			toastr.info('Success');
	});

</script>
