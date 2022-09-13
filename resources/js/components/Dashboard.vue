<template>
	<div class="content-header bg-white shadow-sm py-2 mb-4">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h5 class="m-0 font-weight-bold">Dashboard</h5>
            </div>
            <!--div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div-->
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
        <div class="row">
<div class="col-md-3 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-users"></i></span>
<div class="info-box-content">
<span class="info-box-text">Total Employees</span>
</div>

</div>

</div>

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-code-branch"></i></span>
<div class="info-box-content">
<span class="info-box-text">Total Deptt</span>
</div>

</div>

</div>

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-hand-paper"></i></span>
<div class="info-box-content">
<span class="info-box-text">Present Today</span>
</div>

</div>
</div>

<div class="col-md-3 col-sm-6 col-12">
<div class="info-box">
<span class="info-box-icon bg-primary"><i class="fas fa-bed"></i></span>
<div class="info-box-content">
<span class="info-box-text">On Leave Today</span>
</div>

</div>

</div>

</div> </div>
      </div>
</template>
<script>
export default {
  name: 'dashboard',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>