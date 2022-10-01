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
                <h2 class="card-title title_decoration">Financial Details</h2>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="basic_salary" class="col-sm-5 col-form-label col-form-label-sm">Basic Salary<span class="text-danger font-weight-bold">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" v-model="form.basic_salary" class="form-control form-control-sm" id="basic_salary" placeholder="Enter Basic Salary"  />
                    <div v-if="errors.basic_salary" class="text-danger">{{ errors.basic_salary[0] }}</div>
                  </div>
                </div>
                
                <div class="form-group row" v-for="(allowance,k) in allowances" :key="k">

                 
                <div class="col-sm-5">
                  <select class="form-control form-control-sm select2" style="width: 100%;" v-model="allowance.name" name="allowance_name" id="allowance_name" >
                    <option value="">Select Allowances</option>
                    <option v-for="allowancesData in allowancesList" :value="allowancesData.id">{{ allowancesData.name }}</option>
                  
                  </select>
                  </div>
                  <!-- <div v-if="errors.allowance_name" class="text-danger">{{ errors.allowance_name[0] }}</div> -->
                  <div class="col-sm-4">
                    <input type="text" v-model="allowance.amount" class="form-control form-control-sm" id="allowance_amount" placeholder=" Allowances Amount"  />
                    <div v-if="errors.allowance_amount" class="text-danger">{{ errors.allowance_amount[0] }}</div>
                  </div>
                  <div class="col-sm-3">
                        <span>
                          <i class="fas fa-minus-circle"
                            @click="removeAllowance(k)"
                            v-show="k || ( !k && allowances.length > 1)"
                          ></i>
                          <i
                            class="fas fa-plus-circle"
                            @click="addAllowance(k)"
                            v-show="k == allowances.length-1"
                          ></i>
                        </span>
                    
                  </div>
                </div>
                <div class="form-group row" v-for="(deduction,key_deduction) in deductions" :key="key_deduction">
                <div class="col-sm-5">
                  <select class="form-control form-control-sm select2" style="width: 100%;" v-model="deduction.name" name="deduction_name" id="deduction_name" >
                    <option value="">Select Deduction</option>
                    <option v-for="deductionData in deductionList" :value="deductionData.id">{{ deductionData.name }}</option>
                  </select>
                  </div>
                  <!-- <div v-if="errors.deductions" class="text-danger">{{ errors.deductions[0] }}</div> -->
                  <div class="col-sm-4">
                    <input type="text" v-model="deduction.amount" class="form-control form-control-sm" id="deduction_amount" placeholder=" Deduction Amount" />
                    <div v-if="errors.deductions_amount" class="text-danger">{{ errors.deductions_amount[0] }}</div>
                  </div>
                  <div class="col-sm-3">
                    <span>
                          <i class="fas fa-minus-circle"
                            @click="removeDeductions(key_deduction)"
                            v-show="key_deduction || ( !key_deduction && deductions.length > 1)"
                          ></i>
                          <i
                            class="fas fa-plus-circle"
                            @click="addDeductions(key_deduction)"
                            v-show="key_deduction == deductions.length-1"
                          ></i>
                        </span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="monthly_salary" class="col-sm-5 col-form-label col-form-label-sm">Monthly Salary<span class="text-danger font-weight-bold">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" v-model="form.monthly_salary" class="form-control form-control-sm" id="monthly_salary" placeholder="Enter Monthly Salary"  />
                    <div v-if="errors.monthly_salary" class="text-danger">{{ errors.monthly_salary[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="yearly_salary" class="col-sm-5 col-form-label col-form-label-sm">Yearly  Salary<span class="text-danger font-weight-bold">*</span></label>
                  <div class="col-sm-4">
                    <input type="text" v-model="form.yearly_salary" class="form-control form-control-sm" id="yearly_salary" placeholder="Enter Yearly Salary"  />
                    <div v-if="errors.yearly_salary" class="text-danger">{{ errors.yearly_salary[0] }}</div>
                  </div>
                </div>
                </div>
              </div> 
            </div>
             <div class="col-md-6">
                <div class="form-container">
                  <div class="card-header">
                    <h2 class="card-title title_decoration">Bank Account Details</h2>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="account_holder_name" class="col-sm-4 col-form-label col-form-label-sm">Account Holder Name<span class="text-danger font-weight-bold">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" v-model="form.account_holder_name" class="form-control form-control-sm" id="account_holder_name" placeholder="Enter Account Holder Name" />
                        <div v-if="errors.account_holder_name" class="text-danger">{{ errors.account_holder_name[0] }}</div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="account_number" class="col-sm-4 col-form-label col-form-label-sm">Account Number<span class="text-danger font-weight-bold"><span class="text-danger font-weight-bold">*</span></span></label>
                      <div class="col-sm-8">
                        <input type="text" v-model="form.account_number" class="form-control form-control-sm" id="account_number" placeholder="Enter Account Number"  />
                        <div v-if="errors.account_number" class="text-danger">{{ errors.account_number[0] }}</div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="bank_name" class="col-sm-4 col-form-label col-form-label-sm">Bank Name<span class="text-danger font-weight-bold">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" v-model="form.bank_name" class="form-control form-control-sm" id="bank_name" placeholder="Enter Bank Name"  />
                        <div v-if="errors.bank_name" class="text-danger">{{ errors.bank_name[0] }}</div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="branch" class="col-sm-4 col-form-label col-form-label-sm">Branch<span class="text-danger font-weight-bold">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" v-model="form.branch" class="form-control form-control-sm" id="branch" placeholder="Enter Branch"  />
                        <div v-if="errors.branch" class="text-danger">{{ errors.branch[0] }}</div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="ifsc_code" class="col-sm-4 col-form-label col-form-label-sm">IFSC Code<span class="text-danger font-weight-bold">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" v-model="form.ifsc_code" class="form-control form-control-sm" id="ifsc_code" placeholder="Enter Bank Name"  />
                        <div v-if="errors.ifsc_code" class="text-danger">{{ errors.ifsc_code[0] }}</div>
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
  const allowancesList = ref({});
  const deductionList = ref({});
	const form = reactive({
				user_id: localStorage.getItem('emp_id'),
        basic_salary: '',
        // allowances: '',
        // allowances_amount: '',
        // deductions: '',
        // deductions_amount: '',
        monthly_salary: '',
        yearly_salary: '',
        account_holder_name: '',
        account_number: '',
        bank_name: '',
        branch: '',
        ifsc_code: '',
        
	});
  const allowances = ref([{
            name: '',
            amount: ''
        }]);
  const deductions = ref([{
      name: '',
      amount: ''
  }]);
  const addAllowance = (index) => {
      console.log(index);
      allowances.value.push({ name: "", amount: "" });
  }
  const removeAllowance = (index) => {
      console.log(index);
      allowances.value.splice(index, 1);
      
  }

  const addDeductions = (index) => {
      console.log(index);
      deductions.value.push({ name: "", amount: "" });
  }
  const removeDeductions = (index) => {
      console.log(index);
      deductions.value.splice(index, 1);
      
  }
  const goPreviousStepForm = () => {   
   window.location = '/employee/company-detail';
  }
	const addEmployeeFinancialDetail = () => {
    errors.value = '';

    let formData = new FormData();
    formData.append('user_id', form.user_id);
    formData.append('basic_salary', form.basic_salary);
    formData.append('monthly_salary', form.monthly_salary);
    formData.append('yearly_salary', form.yearly_salary);
    formData.append('account_holder_name', form.account_holder_name);
    formData.append('account_number', form.account_number);
    formData.append('bank_name', form.bank_name);
    formData.append('branch', form.branch);
    formData.append('ifsc_code', form.ifsc_code);

    formData.append('allowances', JSON.stringify(allowances.value));
    formData.append('deductions', JSON.stringify(deductions.value));
    
		axios.post('/api/add-employee-financial-detail',formData).then((response) => {
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
                    window.location = '/employee/documents-detail';
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
                 Swal.fire('Failed!','Something went wrong.', 'warning');
          });
      }
  }

  const getEmployeeFinancialDetail = () => {
      let userId = localStorage.getItem('emp_id');
      if((userId != '') && (userId != null)){
          axios.post('/api/get-employee-financial-detail',{ 'userId':userId}).then((response) => {
          if(response.data.code == 'success'){
            console.log(response.data.code)
             Object.assign(form, response.data.data);
             Object.assign(form, response.data.data.employee_financial_info);
             allowances.value = response.data.data.allowances;
             deductions.value = response.data.data.deductions;
             form.department = response.data.data.basic_salary;
             // form.designation = response.data.data.designation_id; 
          }else{
             //console.log(response.data.message);
             Swal.fire('Failed!', response.data.message, 'warning');
          }
          
          }).catch((e) => {
              console.log(e);
              // Swal.fire('Failed!','Something went wrong.', 'warning');
          });
      }
      
  }

  const getAllowancesAndDeductionList = () => {
        axios.post('/api/add-allowances-and-deduction-list').then((response) => {
        if(response.data.code == 'success'){
            allowancesList.value = response.data.allowancesData;
            deductionList.value = response.data.deductionsData;
            
        }else{
            //console.log(response.data.message);
            Swal.fire('Failed!', response.data.message, 'warning');
        }
        
        }).catch((e) => {
            console.log(e);
            // Swal.fire('Failed!','Something went wrong.', 'warning');
        });
      
      
  }
	onMounted (() => {
      getEmployeeFinancialDetail();
      getAllowancesAndDeductionList();
      getFilledFormSetup();
			toastr.info('Success');
	});

</script>
