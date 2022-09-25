<template>
	<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Employees</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <router-link to="/dashboard">Dashboard</router-link>
            </li>
            <li class="breadcrumb-item active">Employees</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
     <div class="container-fluid">
        <div class="row">
           <div class="col-12">
              <div class="card">
                 <div class="card-header py-1 small d-flex align-items-center d-flex justify-content-between align-items-center">
                    <div class="tableShowData d-flex justify-content-between align-items-center">
                       <span>Show</span> 
                       <select class="form-control form-control-sm mx-2" name="" id="" style="width:70px">
                          <option>10</option>
                          <option>20</option>
                          <option>30</option>
                          <option>40</option>
                       </select>
                       <span>Employees</span>
                    </div>
                    <div class="card-tools ml-auto mr-0">
                       <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="table_search" class="form-control form-control-sm float-right" placeholder="Search">
                          <div class="input-group-append">
                             <button type="submit" class="btn btn-default">
                             <i class="fas fa-search"></i>
                             </button>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="card-body table-responsive p-0" >
                    <table class="table table-sm table-striped small">
                       <thead>
                          <tr class="bg-primary">
                             <th>#</th>
                             <th>Name</th>
                             <th>Age</th>
                             <th>Email ID</th>
                             <th>Department</th>
                             <th>Designation</th>
                             <th>Status</th>
                             <th style="width:220px">Action</th>
                          </tr>
                       </thead>
                       <tbody>
                          <tr>
                             <td>1</td>
                             <td>John Doe</td>
                             <td>40</td>
                             <td>abc@gmail.com</td>
                             <td>IT </td>
                             <td>Manager </td>
                             <td><span class="badge bg-success">Approved</span></td>
                             <td>
                                <div class="btnGroup">
                                   <a href="#" class="btn btn-sm btn-warning py-0 px-1"><i class="far fa-eye"></i> </a>
                                   <a href="#" class="btn btn-sm btn-primary py-0 px-1"><i class="fas fa-pencil-alt"></i> </a>
                                   <a href="#" class="btn btn-sm btn-danger py-0 px-1"><i class="fas fa-trash-alt"></i> </a>
                                   <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                                      <label class="btn btn-success py-0 px-1 active">
                                      <input type="radio" name="options" id="option1" checked> Active
                                      </label>
                                      <label class="btn btn-success py-0 px-1">
                                      <input type="radio" name="options" id="option2"> Deactive
                                      </label>
                                   </div>
                                </div>
                              </td>  
                          </tr>
                          <tr>
                             <td>2</td>
                             <td>John Doe</td>
                             <td>40</td>
                             <td>abc@gmail.com</td>
                             <td>IT </td>
                             <td>Manager </td>
                             <td><span class="badge bg-success">Approved</span></td>
                             <td>
                                <div class="btnGroup">
                                   <a href="#" class="btn btn-sm btn-warning py-0 px-1"><i class="far fa-eye"></i> </a>
                                   <a href="#" class="btn btn-sm btn-primary py-0 px-1"><i class="fas fa-pencil-alt"></i> </a>
                                   <a href="#" class="btn btn-sm btn-danger py-0 px-1"><i class="fas fa-trash-alt"></i> </a>
                                   <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                                      <label class="btn btn-success py-0 px-1 active">
                                      <input type="radio" name="options" id="option1" checked> Active
                                      </label>
                                      <label class="btn btn-success py-0 px-1">
                                      <input type="radio" name="options" id="option2"> Deactive
                                      </label>
                                   </div>
                                </div>
                              </td>  
                          </tr>
                          <tr>
                             <td>3</td>
                             <td>John Doe</td>
                             <td>40</td>
                             <td>abc@gmail.com</td>
                             <td>IT </td>
                             <td>Manager </td>
                             <td><span class="badge bg-success">Approved</span></td>
                             <td>
                                <div class="btnGroup">
                                   <a href="#" class="btn btn-sm btn-warning py-0 px-1"><i class="far fa-eye"></i> </a>
                                   <a href="#" class="btn btn-sm btn-primary py-0 px-1"><i class="fas fa-pencil-alt"></i> </a>
                                   <a href="#" class="btn btn-sm btn-danger py-0 px-1"><i class="fas fa-trash-alt"></i> </a>
                                   <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                                      <label class="btn btn-success py-0 px-1 active">
                                      <input type="radio" name="options" id="option1" checked> Active
                                      </label>
                                      <label class="btn btn-success py-0 px-1">
                                      <input type="radio" name="options" id="option2"> Deactive
                                      </label>
                                   </div>
                                </div>
                            </td>    
                          </tr>
                       </tbody>
                    </table>
                 </div>
                 <hr class="my-0">
                 <div class="card-footer py-1 clearfix d-flex justify-content-between align-items-center">
                    <div class="tableShowList small">
                       Showing <span>3</span>of <span>102</span> Entries
                    </div>
                    <nav class="ml-auto">
                       <ul class="pagination pagination-sm mb-0">
                          <li class="page-item disabled">
                             <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item active" aria-current="page">
                             <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                             <a class="page-link" href="#">Next</a>
                          </li>
                       </ul>
                    </nav>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!--container-fluid-->
  </section>
</template>
<script setup>

  import { ref, onMounted , reactive} from 'vue';
  import Swal from 'sweetalert2'
  
  

  const totalEmployeeCount = ref(0);
  
 
  const getEmployees = () => {
        axios.post('/api/get-employees').then((response) => {
            if(response.data.code == 'success'){
             console.log(response);
               //totalEmployeeCount.value = response.data.totalEmployeeCount;
            }
        
        }).catch((e) => {
            console.log(e);
            // Swal.fire('Failed!','Something went wrong.', 'warning');
        });
  }

  
  onMounted (() => {
      getEmployees();
     
  });

</script>