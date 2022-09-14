<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1 class="m-0">Financial Details</h1> -->
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

            <div class="progress-panel col-md-12">
                <progressbar-component ref="progressbarRef" :setup="3" :step_completed="step_completed"></progressbar-component>
            </div>

        		<div class="col-md-6">
            	<div class="form-container">
              <div class="card-header">
                <h3 class="card-title">Financial Details</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="basis_salary" class="col-sm-6 col-form-label col-form-label-sm">Basic Salary*</label>
                  <div class="col-sm-6">
                    <input type="text" v-model="form.basis_salary" class="form-control form-control-sm" id="basis_salary" placeholder="Enter Basic Salary"  />
                    <div v-if="errors.basis_salary" class="text-danger">{{ errors.basis_salary[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-6">
                  <select class="form-control form-control-sm select2" style="width: 100%;" v-model="form.allowances" name="allowances" id="allowances" >
                    <option value="">Select Allowances</option>
                    <option value="1">Allowances 1</option>
                    <option value="2">Allowances 2</option>
                  </select>
                  </div>
                  <div v-if="errors.allowances" class="text-danger">{{ errors.allowances[0] }}</div>
                  <div class="col-sm-6">
                    <input type="text" v-model="form.allowances_amount" class="form-control form-control-sm" id="allowances_amount" placeholder="Enter Allowances Amount"  />
                    <div v-if="errors.allowances_amount" class="text-danger">{{ errors.allowances_amount[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-6">
                  <select class="form-control form-control-sm select2" style="width: 100%;" v-model="form.deductions" name="deductions" id="deductions" >
                    <option value="">Select Deduction</option>
                    <option value="1">Deduction 1</option>
                    <option value="2">Deduction 2</option>
                  </select>
                  </div>
                  <div v-if="errors.deductions" class="text-danger">{{ errors.deductions[0] }}</div>
                  <div class="col-sm-6">
                    <input type="text" v-model="form.deductions_amount" class="form-control form-control-sm" id="deductions_amount" placeholder="Enter Deduction Amount" />
                    <div v-if="errors.deductions_amount" class="text-danger">{{ errors.deductions_amount[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="monthly_salary" class="col-sm-6 col-form-label col-form-label-sm">Monthly Salary*</label>
                  <div class="col-sm-6">
                    <input type="text" v-model="form.monthly_salary" class="form-control form-control-sm" id="monthly_salary" placeholder="Enter Monthly Salary"  />
                    <div v-if="errors.monthly_salary" class="text-danger">{{ errors.monthly_salary[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="yearly_salary" class="col-sm-6 col-form-label col-form-label-sm">Yearly  Salary*</label>
                  <div class="col-sm-6">
                    <input type="text" v-model="form.yearly_salary" class="form-control form-control-sm" id="yearly_salary" placeholder="Enter Yearly Salary"  />
                    <div v-if="errors.yearly_salary" class="text-danger">{{ errors.yearly_salary[0] }}</div>
                  </div>
                </div>
                </div>
              </div>
            </div>
            <div class="card-footer col-md-12 ">
              <button type="submit" @click="addEmployeeFinancialDetail" class="btn btn-primary float-sm-right mr-10">Submit & Continue</button>
              <button type="button" @click="goPreviousStepForm" class="btn btn-primary mr-20 float-right mr-10">Previous</button>
            </div>
          </div>
        
      </div>
    </div>
  </div>
</template>
<script>
  import ProgressbarComponent from "@/components/employee/form_progress_bar.vue"
  export default {
    components: {
      ProgressbarComponent
    }
  };
</script>
<script setup>
	import { ref, onMounted , reactive} from 'vue';
  import Swal from 'sweetalert2'
	import { useToastr } from '../../toastr.js';
	const errors = ref('');
	const toastr = useToastr();
  const step_completed = ref('');
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
  const goPreviousStepForm = () => {   
   window.location = '/employee/company-detail';
  }
	const addEmployeeFinancialDetail = () => {
    errors.value = '';
		axios.post('/api/add-employee-financial-detail',form).then((response) => {
          if(response.data.code == 'success'){
            Swal.fire({
                  title: 'Data Saved!',
                  text: "Employee Financial Detail has been saved!",
                  icon: 'success',
                  allowOutsideClick: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ok'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location = '/employee/bank-account-detail';
                  }
                })
              
          }else if(response.data.code == 'error_validate'){
                errors.value = response.data.errors;
          }else{
             console.log(response.data.message);
             Swal.fire('Failed!', response.data.message, 'warning');
          }
          
		}).catch((e) => {
         console.log(e);
    });
	}
  const getFilledFormSetup = () => {
      let userId = localStorage.getItem('emp_id');
      if((userId != '') && (userId != null)){
          axios.post('/api/get-filled-form-setup',{ 'userId':userId}).then((response) => {
              if(response.data.code == 'success'){
                 step_completed.value = response.data.step_completed;
              }
          }).catch((e) => {
                console.log(e);
                // Swal.fire('Failed!','Something went wrong.', 'warning');
          });
      }
  }
	onMounted (() => {
      getFilledFormSetup();
			toastr.info('Success');
	});

</script>
