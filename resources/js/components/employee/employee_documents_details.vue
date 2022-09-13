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
        <form @submit="formSubmit" method="post" enctype="multipart/form-data">
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
                        
                        <input type="file" class="custom-file-input" v-on:change="onChangeResumeFile"  />
                        <label class="custom-file-label" for="resume">Choose File</label>
                        
                      </div>
                      
                    </div>
                  </div>
                </div> 
                <div class="form-group row">
                  <label for="offer_letter" class="col-sm-3 col-form-label">Offer Letter</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="offer_letter" id="offer_letter"  v-on:change="onChangeOfferLetterFile"   />
                        <label class="custom-file-label" for="offer_letter">Choose File</label>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="joining_letter" class="col-sm-3 col-form-label">Joining Letter</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="joining_letter" id="joining_letter"  v-on:change="onChangeJoiningLetterFile" />
                        <label class="custom-file-label" for="joining_letter">Choose File</label>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="agreement" class="col-sm-3 col-form-label">Agreement</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="agreement" id="agreement"   v-on:change="onChangeAgreementFile"/>
                        <label class="custom-file-label" for="agreement">Choose File</label>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Dropbox URL</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="documentFieldsData.dropbox_url" class="form-control" id="dropbox_url" placeholder="Enter Dropbox URL"  />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Google Drive</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="documentFieldsData.google_drive" class="form-control" id="google_drive" placeholder="Enter Google Drive"  />
                  </div>
                </div>
                
                
              </div>
            </div>
            <div class="card-footer col-md-12 ">
              <button type="submit" @click="addEmployeeDocumentDetail" class="btn btn-primary float-sm-right mr-10">Submit</button>
              <button type="button" @click="goPreviousStepForm" class="btn btn-primary mr-20 float-right mr-10">Previous</button>
            </div>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
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
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this.documentFieldsData;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let data = new FormData();
                data.append('resume_file', this.documentFieldsData.resume_file);
                data.append('offer_letter', this.documentFieldsData.offer_letter);
                data.append('joining_letter', this.documentFieldsData.joining_letter);
                data.append('agreement', this.documentFieldsData.agreement);
                data.append('dropbox_url', this.documentFieldsData.dropbox_url);
                data.append('google_drive', this.documentFieldsData.google_drive);
                data.append('user_id', this.documentFieldsData.user_id);
                axios.post('/api/add-employee-document-detail', data, config)
                    .then(function (res) {
                        existingObj.success = res.data.success;
                    })
                    .catch(function (err) {
                        existingObj.output = err;
                    });
            }
        }
    }
</script>