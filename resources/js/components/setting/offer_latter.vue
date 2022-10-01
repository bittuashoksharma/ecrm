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
                  <div class="col-md-8">
                  <div class="form-container">
                <div class="card-header">
                  <h2 class="card-title title_decoration">Offer Letter Setting</h2>
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label col-form-label-sm">Title<span class="text-danger font-weight-bold">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" v-model="form.title" class="form-control form-control-sm" id="title" placeholder="Enter Title"  />
                      <div v-if="errors.title" class="text-danger">{{ errors.title[0] }}</div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="allowed_vars" class="col-sm-3 col-form-label col-form-label-sm">Allowed Vars<span class="text-danger font-weight-bold">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" v-model="form.allowed_vars" class="form-control form-control-sm" id="allowed_vars" placeholder="Enter Allowed Vars"  />
                      <div v-if="errors.allowed_vars" class="text-danger">{{ errors.allowed_vars[0] }}</div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label col-form-label-sm">Description<span class="text-danger font-weight-bold">*</span></label>
                    <div class="col-sm-9">
                        <ckeditor :editor="editor" v-model="form.description" :config="editorConfig"></ckeditor>
                        <div v-if="errors.description" class="text-danger">{{ errors.description[0] }}</div>
                    </div>
                  </div>
                  
                  </div>
                </div> 
              </div>
              <div class="card-footer col-md-12 ">
                <button type="submit" @click="addOfferLetterSettingDetail" class="btn btn-primary float-sm-right mr-10">Submit</button>
                
              </div>
            </div>
          
        </div>
      </div>
    </div>
  </template>
 <script>
    
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    //import GeneralHtmlSupport from '@ckeditor/ckeditor5-html-support/src/generalhtmlsupport';

    
    export default {
        name: 'OfferLetterDetail',
        data() {
            return {
                editor: ClassicEditor,
                editorConfig: {
                    // The configuration of the editor.
                    //plugins: [ GeneralHtmlSupport ],
                }
            };
        }
    }
</script>
  <script setup>
      import { ref, onMounted , reactive} from 'vue';
      import Swal from 'sweetalert2'
      import { useToastr } from '../../toastr.js';
      const errors = ref('');
      const toastr = useToastr();
      const step_completed = ref('');
      const form = reactive({
                  title: '',
                  alias: '',
                  allowed_vars: '',
                  description: '',
      });
    
      const addOfferLetterSettingDetail = () => {
      errors.value = '';
          axios.post('/api/setting-offer-letter',form).then((response) => {
            if(response.data.code == 'success'){
              Swal.fire({
                    title: 'Data Saved!',
                    text: "Offer Letter Format has been saved!",
                    icon: 'success',
                    allowOutsideClick: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ok'
                  }).then((result) => {
                    
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
    const getOfferLetterFormatDetail = () => {
        
            axios.post('/api/get-offer-letter-format').then((response) => {
            if(response.data.code == 'success'){
              
               Object.assign(form, response.data.data);
             
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
        getOfferLetterFormatDetail();
       
      });
  
  </script>
  