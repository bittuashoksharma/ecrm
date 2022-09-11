<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Bank Account Details</h1>
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
        		<div class="col-md-6">
              <div class="card-header">
                <h3 class="card-title">Bank Account Details</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="account_holder_name" class="col-sm-3 col-form-label">Account Holder Name*</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.account_holder_name" class="form-control" id="account_holder_name" placeholder="Enter Account Holder Name" />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="account_number" class="col-sm-3 col-form-label">Account Number*</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.account_number" class="form-control" id="account_number" placeholder="Enter Account Number"  />
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label for="bank_name" class="col-sm-3 col-form-label">Bank Name*</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.bank_name" class="form-control" id="bank_name" placeholder="Enter Bank Name"  />
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label for="branch" class="col-sm-3 col-form-label">Branch*</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.branch" class="form-control" id="branch" placeholder="Enter Branch"  />
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label for="ifsc_code" class="col-sm-3 col-form-label">IFSC Code*</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.ifsc_code" class="form-control" id="ifsc_code" placeholder="Enter Bank Name"  />
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-header">
                <h3 class="card-title">Assign Manager</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <label for="search_by_email" class="col-sm-3 col-form-label">Search by Email</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.search_by_email" name="search_by_email" id="search_by_email" class="form-control"  placeholder="Enter Search Email"  />
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label for="search_by_email" class="col-sm-3 col-form-label">Search by Name</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.search_by_name" name="search_by_name" id="search_by_name" class="form-control"  placeholder="Enter Search Name"  />
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer col-md-12">
              <button type="submit" @click="addEmployeeBankAccountDetail" class="btn btn-primary float-sm-right mr-20">Submit</button>
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
				account_holder_name: '',
        account_number: '',
        bank_name: '',
        branch: '',
        ifsc_code: '',
        search_by_email: '',
        search_by_name: '',
	});

	const addEmployeeBankAccountDetail = () => {
		axios.post('/api/add-employee-bank-account-detail',form).then((response) => {
				Swal.fire('Failed!', 'Something went wrong.', 'warning');
		});
	}

	onMounted (() => {
			toastr.info('Success');
	});

</script>
