<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1 class="m-0">Company Details</h1> -->
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
                <ul id="progressbar">
                    <router-link to="/employee/personal-detail"><li class="personal_detail active"><strong>Personal Detail</strong></li></router-link>

                    <router-link to="/employee/company-detail"><li class="company_detail active"><strong>Company Detail</strong></li></router-link>

                    <router-link to="/employee/financial-detail"><li class="financial_detail"><strong>Financial Detail</strong></li></router-link>

                    <router-link to="/employee/bank-account-detail"><li class="bank_detail"><strong>Bank Detail</strong></li></router-link>
                    
                    <router-link to="/employee/documents-detail"><li class="document_detail"><strong>Document Detail</strong></li></router-link>
                </ul>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        		<div class="col-md-8">
              <div class="card-header">
                <h3 class="card-title">Company Details</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="employee_id" class="col-sm-3 col-form-label">Employee ID*</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.employee_id" class="form-control" id="employee_id" placeholder="Enter Employee ID"  />
                    <div v-if="errors.employee_id" class="text-danger">{{ errors.employee_id[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="department" class="col-sm-3 col-form-label">Department*</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" v-model="form.department" name="department" id="department" >
                      <option value="">Select Department</option>
                      <option value="1">Accounts</option>
                      <option value="2">Exam Dept</option>
                    </select>
                    <div v-if="errors.department" class="text-danger">{{ errors.department[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="designation" class="col-sm-3 col-form-label">Designation*</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" v-model="form.designation" name="designation" id="designation" >
                      <option value="">Select Designation</option>
                      <option value="1">Manager</option>
                      <option value="2">Supervisor</option>
                    </select>
                    <div v-if="errors.designation" class="text-danger">{{ errors.designation[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="doj" class="col-sm-3 col-form-label">Date of Joining*</label>
                  <div class="col-sm-9">
                    <input type="date" v-model="form.doj" class="form-control" id="doj" placeholder="Enter Date of Joining"  />
                    <div v-if="errors.doj" class="text-danger">{{ errors.doj[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="dol" class="col-sm-3 col-form-label">Date of Leaving</label>
                  <div class="col-sm-9">
                    <input type="date" v-model="form.dol" class="form-control" id="dol" placeholder="Enter Date of Leaving"  />
                    <div v-if="errors.dol" class="text-danger">{{ errors.dol[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="status" class="col-sm-3 col-form-label">Status*</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" v-model="form.status" name="status" id="status" >
                      <option value="">Select Status</option>
                      <option value="enable">Active</option>
                      <option value="disable">Inactive</option>
                    </select>
                    <div v-if="errors.status" class="text-danger">{{ errors.status[0] }}</div>
                  </div>
                </div>
               </div>
            </div>
            <div class="card-footer col-md-12 ">
              <button type="submit" @click="addEmployeeCompanyDetail" class="btn btn-primary float-sm-right mr-10">Submit & Continue</button>
              <button type="button" @click="goPreviousStepForm" class="btn btn-primary mr-20 float-right mr-10">Previous</button>
            </div>
          </div>
        
      </div>
    </div>
  </div>
</template>
<script setup>
	import { ref, onMounted , reactive} from 'vue';
  import Swal from 'sweetalert2'
	import { useToastr } from '../../toastr.js';
	const errors = ref('');
	const toastr = useToastr();
	const form = reactive({
        user_id: localStorage.getItem('emp_id'),
        assigned_manager: '',
        employee_id: 'EMP000'+localStorage.getItem('emp_id'),
        department: '',
        designation: '',
        doj: '',
        dol: '',
        status: '',
	});
  const goPreviousStepForm = () => {
    this.$swal('Hello Vue world!!!');
      // window.location = '/employee/personal-detail';
  }
	const addEmployeeCompanyDetail = () => {
    errors.value = '';
		axios.post('/api/add-employee-company-detail',form).then((response) => {
          if(response.data.code == 'success'){
            Swal.fire({
                  title: 'Data Saved!',
                  text: "Employee Company Detail has been saved!",
                  icon: 'success',
                  allowOutsideClick: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ok'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location = '/employee/financial-detail';
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

	onMounted (() => {
			toastr.info('Success');
	});

</script>
