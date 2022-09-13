<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1 class="m-0">Personal Details</h1> -->
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
      <form action="javascript:void(0)" class="form newtopic" @submit.prevent="submit">
      <div class="card card-primary">
          <div class="row">
            <div class="progress-panel col-md-12">
                <ul id="progressbar">
                    <router-link to="/employee/personal-detail"><li class="personal_detail active"><strong>Personal Detail</strong></li></router-link>

                    <router-link to="/employee/company-detail"><li class="company_detail"><strong>Company Detail</strong></li></router-link>

                    <router-link to="/employee/financial-detail"><li class="financial_detail"><strong>Financial Detail</strong></li></router-link>

                    <router-link to="/employee/bank-account-detail"><li class="bank_detail"><strong>Bank Detail</strong></li></router-link>
                    
                    <router-link to="/employee/documents-detail"><li class="document_detail"><strong>Document Detail</strong></li></router-link>
                </ul>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
          	<div class="col-md-6">
              <div class="card-header">
                <h3 class="card-title">Personal Details</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Name*</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.name" class="form-control" id="name" placeholder="Enter Full Name"  />
                    <div v-if="errors.name" class="text-danger">{{ errors.name[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="father_name" class="col-sm-3 col-form-label">Father Name*</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.father_name" class="form-control" id="father_name" placeholder="Enter Father Name"  />
                    <div v-if="errors.father_name" class="text-danger">{{ errors.father_name[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="dob" class="col-sm-3 col-form-label">Date of Birth*</label>
                  <div class="col-sm-9">
                    <input type="date" v-model="form.dob" class="form-control" id="dob" placeholder="Enter Date of Birth"  />
                    <div v-if="errors.dob" class="text-danger">{{ errors.dob[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="gender" class="col-sm-3 col-form-label">Gender*</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" v-model="form.gender" name="gender" id="gender" >
                      <option value="">Select Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                    <div v-if="errors.gender" class="text-danger">{{ errors.gender[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="contact_number_1" class="col-sm-3 col-form-label">Contact Number 1</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.contact_number_1" name="contact_number_1" id="contact_number_1" class="form-control" placeholder="Enter Contact Number 1"  maxlength="10"/>
                    <div v-if="errors.contact_number_1" class="text-danger">{{ errors.contact_number_1[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="contact_number_2"  class="col-sm-3 col-form-label">Contact Number 2</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.contact_number_2" name="contact_number_2" id="contact_number_2" class="form-control" placeholder="Enter Contact Number 2"  maxlength="10" />
                    <div v-if="errors.contact_number_2" class="text-danger">{{ errors.contact_number_2[0] }}</div>
                  </div>
                </div> 
                <div class="form-group row">
                  <label for="current_address" class="col-sm-3 col-form-label">Current Address</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" v-model="form.current_address" name="current_address" id="current_address" placeholder="Enter Current Address" ></textarea>
                     <div v-if="errors.current_address" class="text-danger">{{ errors.current_address[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="permanent_address" class="col-sm-3 col-form-label">Permanent Address*</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" v-model="form.permanent_address" name="permanent_address" id="permanent_address" placeholder="Enter Permanent Address" ></textarea>
                    <div v-if="errors.permanent_address" class="text-danger">{{ errors.permanent_address[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nationality" class="col-sm-3 col-form-label">Nationality*</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" v-model="form.nationality" name="nationality" id="nationality" style="width: 100%;" >
                      <option value="">Select Nationality</option>
                      <option value="indian">Indian</option>
                    </select>
                    <div v-if="errors.nationality" class="text-danger">{{ errors.nationality[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="maritial_status" class="col-sm-3 col-form-label">Maritial Status*</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" v-model="form.maritial_status" name="maritial_status" id="maritial_status" style="width: 100%;" >
                      <option value="">Select Maritial Status</option>
                      <option value="married">Married</option>
                      <option value="single">Single</option>
                    </select>
                    <div v-if="errors.nationality" class="text-danger">{{ errors.nationality[0] }}</div>
                  </div>
                </div>
                 <div class="form-group row">
                  <label for="photo" class="col-sm-3 col-form-label">Photo*</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="photo" id="photo" v-on:change="onChangeProfilePicFile"/>
                        <label class="custom-file-label" for="photo">Choose Photo</label>
                      </div>
                      
                    </div>
                    <div v-if="errors.photo" class="text-danger">{{ errors.photo[0] }}</div>
                  </div>
                  
                </div> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-header">
                <h3 class="card-title">Account Login</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="email" class="col-sm-3 col-form-label">Email*</label>
                  <div class="col-sm-9">
                    <input type="email" v-model="form.email" name="email" id="email" class="form-control"  placeholder="Enter Email"  />
                    <div v-if="errors.email" class="text-danger">{{ errors.email[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-3 col-form-label">Password*</label>
                  <div class="col-sm-9">
                    <input type="password" v-model="form.password" name="password" id="password" class="form-control"  placeholder="Enter Password"  />
                    <div v-if="errors.password" class="text-danger">{{ errors.password[0] }}</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer col-md-12">
              <button type="submit" @click="addEmployeePersonalDetail" class="btn btn-primary float-sm-right mr-20">Next</button>
            </div>
          </div>
        
      </div>
      </form>
    </div>
  </div>
</template>
<script setup>
  import { ref, onMounted , reactive} from 'vue';
  import { useToastr } from '../../toastr.js';
  const errors = ref('');
  const toastr = useToastr();
  const form = reactive({
        name: '',
        father_name: '',
        dob: '',
        gender: '',
        contact_number_1: '',
        contact_number_2: '',
        current_address: '',
        permanent_address: '',
        nationality: '',
        maritial_status: '',
        email: '',
        password: '',
        photo:'',
  });
const onChangeProfilePicFile = (e)=>{
  form.photo = e.target.files[0];
}
  const addEmployeePersonalDetail = () => {
      let formData = new FormData();
      formData.append('name', form.name);
      formData.append('father_name', form.father_name);
      formData.append('dob', form.dob);
      formData.append('gender', form.gender);
      formData.append('contact_number_1', form.contact_number_1);
      formData.append('contact_number_2', form.contact_number_2);
      formData.append('current_address', form.current_address);
      formData.append('permanent_address', form.permanent_address);
      formData.append('nationality', form.nationality);
      formData.append('maritial_status', form.maritial_status);
      formData.append('email', form.email);
      formData.append('password', form.password);
      formData.append('photo', form.photo);
	  	errors.value = '';
	    axios.post('/api/add-employee-personal-detail',formData).then((response) => {
	    		if(response.data.code == 'success'){
	    				localStorage.setItem("emp_id", JSON.stringify(response.data.data.id));
	    				//window.location = '/employee/company-detail';
	    				//this.$router.push('/employee/company-detail'); 
          }else if(response.data.code == 'error_validate'){
                errors.value = response.data.errors;
          }else{
             console.log(response.data.message);
             //Swal.fire('Failed!', response.data.message, 'warning');
          }
	    		
	    }).catch((e) => {
	    			console.log(e);
            // Swal.fire('Failed!','Something went wrong.', 'warning');
	    });
  }

  onMounted (() => {
      toastr.info('Success');
  });

</script>
