<template>
   <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
     <li class="nav-item">
       <router-link to="/dashboard" active-class="active" class="nav-link">
         <i class="nav-icon fas fa-tachometer-alt"></i>
         <p> Dashboard </p>
       </router-link>
     </li>  
     <li class="nav-item">
       <a href="javascript:void(0)" class="nav-link">
         <i class="nav-icon fas fa-users"></i>
         <p>Employee Management <i class="right fas fa-angle-left"></i>
         </p>
       </a>
       <ul class="nav nav-treeview">
         <li class="nav-item">
           <router-link to="/employee/add-employee" active-class="active" class="nav-link">
             <i class="far fa-user nav-icon"></i>
             <p>Add Employee</p>
           </router-link>
         </li>
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
     
   </ul> 
</template>