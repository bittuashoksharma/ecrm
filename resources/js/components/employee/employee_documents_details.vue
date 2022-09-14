<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Document Details</h1>
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

                    <router-link to="/employee/financial-detail"><li class="financial_detail active"><strong>Financial Detail</strong></li></router-link>

                    <router-link to="/employee/bank-account-detail"><li class="bank_detail active"><strong>Bank Detail</strong></li></router-link>
                    
                    <router-link to="/employee/documents-detail"><li class="document_detail active"><strong>Document Detail</strong></li></router-link>
                </ul>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        		<div class="col-md-8">
              <div class="card-header">
                <h3 class="card-title">Document Details</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  
                  <label for="resume" class="col-sm-3 col-form-label">Resume</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        
                        <input type="file" class="form-control file-upload-input" v-on:change="onChangeResumeFile"  />
                        <!-- <div v-if="errors.resume_file" class="text-danger">{{ errors.resume_file[0] }}</div> -->
                        
                      </div>
                      
                    </div>
                  </div>
                </div> 
                <div class="form-group row">
                  <label for="offer_letter" class="col-sm-3 col-form-label">Offer Letter</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control file-upload-input" name="offer_letter" id="offer_letter"  v-on:change="onChangeOfferLetterFile"   />
                        
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="joining_letter" class="col-sm-3 col-form-label">Joining Letter</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control file-upload-input" name="joining_letter" id="joining_letter"  v-on:change="onChangeJoiningLetterFile" />
                        <!-- <label class="custom-file-label" for="joining_letter">Choose File</label> -->
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="agreement" class="col-sm-3 col-form-label">Agreement</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control file-upload-input" name="agreement" id="agreement"   v-on:change="onChangeAgreementFile"/>
                       <!--  <label class="custom-file-label" for="agreement">Choose File</label> -->
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Dropbox URL</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="dropbox_url" placeholder="Enter Dropbox URL"  />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Google Drive</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="google_drive" placeholder="Enter Google Drive"  />
                  </div>
                </div>
                
                
              </div>
            </div>
            <div class="card-footer col-md-12 ">
              <button type="submit" @click="addEmployeeDocumentDetail" class="btn btn-primary float-sm-right mr-10">Submit</button>
            </div>
            
          </div>
      </div>
    </div>
  </div>
</template>

<script>
  import { ref, onMounted , reactive} from 'vue';
  import Swal from 'sweetalert2'
  import { useToastr } from '../../toastr.js';
  const errors = ref('');
  const toastr = useToastr();
//   const form = reactive({
//         user_id: localStorage.getItem('emp_id'),
//         resume_file: '',
//         offer_letter: '',
//         joining_letter: '',
//         agreement: '',
//         dropbox_url: '',
//         google_drive: ''
//   });

// const goPreviousStepForm = () => {
//      window.location = '/employee/bank-account-detail';
// }
// const onChangeResumeFile = (e) => {
//     this.form.resume_file = e.target.files[0];
// }
// const onChangeOfferLetterFile = (e) => {
//   this.form.offer_letter = e.target.files[0];
// }
// const onChangeJoiningLetterFile = (e) => {
//   this.form.joining_letter = e.target.files[0];
// }
// const onChangeAgreementFile = (e) => {
//   this.form.agreement = e.target.files[0];
// }

//   const addEmployeeDocumentDetail = (e) => {
//     console.log('sdfs');
//        let formData = new FormData();
//         formData.append('resume_file', this.form.resume_file);
//         formData.append('offer_letter', this.form.offer_letter);
//         formData.append('joining_letter', this.form.joining_letter);
//         formData.append('agreement', this.form.agreement);
//         formData.append('dropbox_url', this.form.dropbox_url);
//         formData.append('google_drive', this.form.google_drive);
//         formData.append('user_id', this.form.user_id);
//       errors.value = '';
//       axios.post('/api/add-employee-document-detail',formData).then((response) => {
//           if(response.data.code == 'success'){
//               localStorage.setItem("emp_id", JSON.stringify(response.data.data.id));
//               Swal.fire({
//                   title: 'Data Saved!',
//                   text: "Employee Personal Detail has been saved!",
//                   icon: 'success',
//                   allowOutsideClick: false,
//                   confirmButtonColor: '#3085d6',
//                   cancelButtonColor: '#d33',
//                   confirmButtonText: 'ok'
//                 }).then((result) => {
//                   if (result.isConfirmed) {
//                     window.location = '/dashboard';
//                   }
//                 })
//           }else if(response.data.code == 'error_validate'){
//                 errors.value = response.data.errors;
//           }else{
//              console.log(response.data.message);
//              //Swal.fire('Failed!', response.data.message, 'warning');
//           }
          
//       }).catch((e) => {
//             console.log(e);
//             // Swal.fire('Failed!','Something went wrong.', 'warning');
//       });
//   }

  // onMounted (() => {
  //     toastr.info('Success');
  // });






export default {
        data() {
            return {
              documentFieldsData : {
                 'user_id' : 12,
                 'resume_file' : '',
                 'offer_letter' : '',
                 'joining_letter' : '',
                 'agreement' : '',
                 'dropbox_url' : '',
                 'google_drive' : ''
              }
            };
        },
        methods: {
            goPreviousStepForm() {
                 window.location = '/employee/bank-account-detail';
            },
            onChangeResumeFile(e) {
                this.documentFieldsData.resume_file = e.target.files[0];
            },
            onChangeOfferLetterFile(e){
              this.documentFieldsData.offer_letter = e.target.files[0];
            },
            onChangeJoiningLetterFile(e){
              this.documentFieldsData.joining_letter = e.target.files[0];
            },
            onChangeAgreementFile(e){
              this.documentFieldsData.agreement = e.target.files[0];
            },

            addEmployeeDocumentDetail(e) {
                e.preventDefault();
                let existingObj = this.documentFieldsData;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let formData = new FormData();
                formData.append('resume_file', this.documentFieldsData.resume_file);
                formData.append('offer_letter', this.documentFieldsData.offer_letter);
                formData.append('joining_letter', this.documentFieldsData.joining_letter);
                formData.append('agreement', this.documentFieldsData.agreement);
                formData.append('dropbox_url', this.documentFieldsData.dropbox_url);
                formData.append('google_drive', this.documentFieldsData.google_drive);
                formData.append('user_id', this.documentFieldsData.user_id);
                errors.value = '';

                axios.post('/api/add-employee-document-detail',formData).then((response) => {
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
                                window.location = '/dashboard';
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
        }
    }
</script>