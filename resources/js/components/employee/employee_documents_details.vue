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
                <progressbar-component ref="progressbarRef" :setup="4" :step_completed="step_completed"></progressbar-component>
            </div>
        		<div class="col-md-6">
            	<div class="form-container">
              <div class="card-header">
                <h2 class="card-title title_decoration">Document Details</h2>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  
                  <label for="resume" class="col-sm-4 col-form-label col-form-label-sm">Resume<span class="text-danger font-weight-bold">*</span></label>
                  <div class="col-sm-8">
                    
                      <div class="custom-file">
                        <input type="file" class="form-control file-upload-input" v-on:change="onChangeResumeFile"  id="resume" />
                        <label class="custom-file-label" id="resume_label" for="resume">Choose File</label>
                        <div v-if="errors.resume_file" class="text-danger">{{ errors.resume_file[0] }}</div> 
                      </div>
                      
                   
                  </div>
                </div> 
                <div class="form-group row">
                  <label for="offer_letter" class="col-sm-4 col-form-label col-form-label-sm">Offer Letter<span class="text-danger font-weight-bold">*</span></label>
                  <div class="col-sm-8">
                      <div class="custom-file">

                        <input type="file" class="form-control file-upload-input" name="offer_letter" id="offer_letter"  v-on:change="onChangeOfferLetterFile"   />
                        <label class="custom-file-label" id="offer_letter_label" for="offer_letter">Choose File</label>
                        <div v-if="errors.offer_letter" class="text-danger">{{ errors.offer_letter[0] }}</div> 

                      </div>
                   
                  </div>
                </div>
                <div class="form-group row">
                  <label for="joining_letter" class="col-sm-4 col-form-label col-form-label-sm">Joining Letter<span class="text-danger font-weight-bold">*</span></label>
                  <div class="col-sm-8">
                   
                      <div class="custom-file">

                        <input type="file" class="form-control file-upload-input" name="joining_letter" id="joining_letter"  v-on:change="onChangeJoiningLetterFile" />
                        <label class="custom-file-label" id ="joining_letter_label" for="joining_letter">Choose File</label>
                        <div v-if="errors.joining_letter" class="text-danger">{{ errors.joining_letter[0] }}</div> 

                      </div>
                      
                  </div>
                </div>
                <div class="form-group row">
                  <label for="agreement" class="col-sm-4 col-form-label col-form-label-sm">Agreement<span class="text-danger font-weight-bold">*</span></label>
                  <div class="col-sm-8">
                   
                      <div class="custom-file">

                        <input type="file" class="form-control file-upload-input" name="agreement" id="agreement"   v-on:change="onChangeAgreementFile"/>
                       <label class="custom-file-label" id="agreement_label" for="agreement">Choose File</label>
                       <div v-if="errors.agreement" class="text-danger">{{ errors.agreement[0] }}</div> 
                      </div>
                      
                  </div>
                </div>
                <div class="form-group row">

                  <label for="name" class="col-sm-4 col-form-label">Dropbox URL<span class="text-danger font-weight-bold">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="dropbox_url" placeholder="Enter Dropbox URL" v-model="documentFieldsData.dropbox_url" />
                    <div v-if="errors.dropbox_url" class="text-danger">{{ errors.dropbox_url[0] }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-4 col-form-label">Google Drive<span class="text-danger font-weight-bold">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="google_drive" placeholder="Enter Google Drive" v-model="documentFieldsData.google_drive" />
                    <div v-if="errors.google_drive" class="text-danger">{{ errors.google_drive[0] }}</div>
                  </div>
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
  //const errors = ref('');
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



import ProgressbarComponent from "@/components/employee/form_progress_bar.vue"
export default {
        data() {
            return {
              documentFieldsData : {
                 'user_id' : localStorage.getItem('emp_id'),
                 'resume_file' : '',
                 'offer_letter' : '',
                 'joining_letter' : '',
                 'agreement' : '',
                 'dropbox_url' : '',
                 'google_drive' : ''
              },
              step_completed:'',
              errors:{},
            };
        },
        components: {
          ProgressbarComponent
        },
        created() {
          this.getFilledFormSetup();
        },
        methods: {
            goPreviousStepForm() {
                 window.location = '/employee/bank-account-detail';
            },
            onChangeResumeFile(e) {
              if(e.target.files[0].name != ''){
                 this.documentFieldsData.resume_file = e.target.files[0];
                 document.getElementById("resume_label").innerHTML = e.target.files[0].name; 
              }else{
                 document.getElementById("resume_label").innerHTML = 'Choose File';
              }
               
            },
            onChangeOfferLetterFile(e){
              if(e.target.files[0].name != ''){
                 this.documentFieldsData.offer_letter = e.target.files[0];
                 document.getElementById("offer_letter_label").innerHTML = e.target.files[0].name; 
              }else{
                 document.getElementById("offer_letter_label").innerHTML = 'Choose File';
              }
            },
            onChangeJoiningLetterFile(e){
              if(e.target.files[0].name != ''){
                 this.documentFieldsData.joining_letter = e.target.files[0];
                 document.getElementById("joining_letter_label").innerHTML = e.target.files[0].name; 
              }else{
                 document.getElementById("joining_letter_label").innerHTML = 'Choose File';
              }
            },
            onChangeAgreementFile(e){
              if(e.target.files[0].name != ''){
                 this.documentFieldsData.agreement = e.target.files[0];
                 document.getElementById("agreement_label").innerHTML = e.target.files[0].name; 
              }else{
                 document.getElementById("agreement_label").innerHTML = 'Choose File';
              }
            },
            getFilledFormSetup(){
                let userId = localStorage.getItem('emp_id');
                if((userId != '') && (userId != null)){
                    axios.post('/api/get-filled-form-setup',{ 'userId':userId}).then((response) => {
                        if(response.data.code == 'success'){
                            this.step_completed = response.data.step_completed;
                        }
                    }).catch((e) => {
                          console.log(e);
                          // Swal.fire('Failed!','Something went wrong.', 'warning');
                    });
                }
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
                this.errors = {};

                axios.post('/api/add-employee-document-detail',formData).then((response) => {
                      if(response.data.code == 'success'){
                        localStorage.removeItem("emp_id");
                        Swal.fire({
                              title: 'Data Saved!',
                              text: "New employee has been added!",
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
                            this.errors = response.data.errors;
                      }else{
                         console.log(response.data.message);
                         Swal.fire('Failed!', response.data.message, 'warning');
                      }
                      
                }).catch((e) => {
                     console.log(e);
                });

            }
        }
    };
</script>