<template>
   
     <li class="nav-item">
       <router-link to="/dashboard" active-class="active" class="nav-link">
         <i class="nav-icon fas fa-tachometer-alt"></i>
         <p> Dashboard </p>
       </router-link>
     </li>  
     <li class="nav-item">
       <router-link to="/employees" active-class="active" class="nav-link">
         <i class="nav-icon fas fa-users"></i>
         <p>Employee Management <i class="right fas fa-angle-left"></i>
         </p>
       </router-link>
       <ul class="nav nav-treeview">
        <li class="nav-item">
           <router-link to="/employees" active-class="active" class="nav-link">
             <i class="far fa-user nav-icon"></i>
             <p>Manage Employees</p>
           </router-link>
         </li>
         <li class="nav-item">
           <router-link to="/employee/personal-detail" active-class="active" class="nav-link" id="addEmp" v-on:click="removeEmpId">
             <i class="far fa-user nav-icon"></i>
             <p>Add Employee</p>
           </router-link>
         </li>
 <!--         <li class="nav-item">
           <router-link to="/employee/company-detail" active-class="active" class="nav-link">
             <i class="far fa-user nav-icon"></i>
             <p>Company Details</p>
           </router-link>
         </li>
         <li class="nav-item">
           <router-link to="/employee/financial-detail" active-class="active" class="nav-link">
             <i class="far fa-user nav-icon"></i>
             <p>Financial Details</p>
           </router-link>
         </li>
         <li class="nav-item">
           <router-link to="/employee/bank-account-detail" active-class="active" class="nav-link">
             <i class="far fa-user nav-icon"></i>
             <p>Bank Account Details</p>
           </router-link>
         </li>
         <li class="nav-item">
           <router-link to="/employee/documents-detail" active-class="active" class="nav-link">
             <i class="far fa-user nav-icon"></i>
             <p>Documents Details</p>
           </router-link>
         </li> -->
       </ul>
     </li>
     <!-- <li class="nav-item">
       <router-link to="/dashboard" active-class="active" class="nav-link">
         <i class="nav-icon fas fa-cog"></i>
         <p> Settings </p>
       </router-link>
     </li>
     <li class="nav-item">
       <router-link to="/dashboard" active-class="active" class="nav-link">
         <i class="nav-icon fas fa-user"></i>
         <p> Profile </p>
       </router-link>
     </li>
     <li class="nav-item">
       <router-link to="/logout"  active-class="active" class="nav-link">
         <i class="nav-icon fas fa-sign-out-alt"></i>
         <p> Logout </p>
       </router-link>
     </li> -->
     <!-- <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>Logout</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
        </form>
      </li> -->
   
</template>
<script setup>
  import { ref, onMounted , reactive} from 'vue';

  const removeEmpId = () => {
    console.log(localStorage.getItem('emp_id'));
      localStorage.removeItem("emp_id");
  }
  onMounted (() => {
    
  });

</script>