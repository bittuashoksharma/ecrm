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
        		<div class="col-md-8">
              <div class="card-header">
                <h3 class="card-title">Document Details</h3>
              </div>
              <div class="card-body">
                <div class="form-group row">
                  <div v-if="success != ''" class="alert alert-success col-sm-12">
                            {{success}}
                  </div>
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
                <!-- <div class="form-group row">
                  <label for="offer_letter" class="col-sm-3 col-form-label">Offer Letter</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="offer_letter" id="offer_letter"  />
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
                        <input type="file" class="custom-file-input" name="joining_letter" id="joining_letter"  />
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
                        <input type="file" class="custom-file-input" name="agreement" id="agreement"  />
                        <label class="custom-file-label" for="agreement">Choose File</label>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Dropbox URL</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.dropbox_url" class="form-control" id="dropbox_url" placeholder="Enter Dropbox URL"  />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Google Drive</label>
                  <div class="col-sm-9">
                    <input type="text" v-model="form.google_drive" class="form-control" id="google_drive" placeholder="Enter Google Drive"  />
                  </div>
                </div> -->
                
                
              </div>
            </div>
            <div class="card-footer col-md-12">
              <button type="submit" @click="addEmployeeDocumentDetail" class="btn btn-primary float-sm-right mr-20">Submit</button>
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
              documentData : {
                 'user_id' : 5,
                 'resume_file' : ''
              }
            };
        },
        methods: {
            onChangeResumeFile(e) {
                this.documentData.resume_file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this.documentData;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let data = new FormData();
                data.append('resume_file', this.documentData.resume_file);
                data.append('user_id', this.documentData.user_id);
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

