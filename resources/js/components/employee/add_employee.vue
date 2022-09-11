<template>
	<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add Employee</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                  <router-link to="/dashboard">Dashboard</router-link>
                </li>
                <li class="breadcrumb-item active">Add Employee</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!--begin::Container-->
		<div id="kt_content_container" class="container-xxl">
			<!--begin::Row-->
			<div class="row gy-5 g-xl-8">
				<div class="col-xl-12">
					<div class="d-flex align-items-center bg-white rounded p-5">
						<ul class="nav nav-pills" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link fw-bolder active" id="personal-details-tab"
									data-bs-toggle="pill" data-bs-target="#personal-details"
									type="button" role="tab" aria-controls="personal-details"
									aria-selected="true">Personal Details</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link fw-bolder" id="company-details-tab"
									data-bs-toggle="pill" data-bs-target="#company-details"
									type="button" role="tab" aria-controls="company-details"
									aria-selected="false">Company Details </button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link fw-bolder" id="financial-details-tab"
									data-bs-toggle="pill" data-bs-target="#financial-details"
									type="button" role="tab" aria-controls="financial-details"
									aria-selected="false">Financial Details </button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link fw-bolder" id="bankac-details-tab"
									data-bs-toggle="pill" data-bs-target="#bankac-details" type="button"
									role="tab" aria-controls="bankac-details" aria-selected="false">Bank
									Account Details</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link fw-bolder" id="doc-details-tab"
									data-bs-toggle="pill" data-bs-target="#doc-details" type="button"
									role="tab" aria-controls="doc-details"
									aria-selected="false">Documents</button>
							</li>
						</ul>

					</div>
				</div>
				<div class="col-xl-12">
					<div class="bg-white rounded p-5">
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="personal-details" role="tabpanel"
								aria-labelledby="personal-details-tab">
								<div class="row">
									<div class="col-md-6">
										<div class="p-d-form border p-5">
											<h4 class="card-label fw-bolder fs-4 mb-5">
												Personal Details
											</h4>

											<form>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Name*
													</label>
													<div class="col-sm-8">
														<input type="text"
															class="form-control form-control-sm"
															id="inputName">
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Father
														Name*
													</label>
													<div class="col-sm-8">
														<input type="text"
															class="form-control form-control-sm"
															id="inputFName">
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Date of
														Birth*
													</label>
													<div class="col-sm-8">
														<input type="date"
															class="form-control form-control-sm"
															id="inputDOB">
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Gender*
													</label>
													<div class="col-sm-8">
														<select class="form-select form-select-sm"
															aria-label="Default select example">
															<option value="1">Male</option>
															<option value="2">Female</option>
														</select>
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Contact
														Number 1

													</label>
													<div class="col-sm-8">
														<input type="tel"
															class="form-control form-control-sm"
															id="inputCont1">
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Contact
														Number 2

													</label>
													<div class="col-sm-8">
														<input type="tel"
															class="form-control form-control-sm"
															id="inputCont2">
													</div>
												</div>

												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Current
														Address

													</label>
													<div class="col-sm-8">
														<textarea rows="1" name="Current Address"
															class="form-control form-control-sm"
															id="inputCurrAdd"></textarea>
													</div>
												</div>

												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Permanent
														Address

													</label>
													<div class="col-sm-8">
														<textarea rows="1" name="Permanent Address"
															class="form-control form-control-sm"
															id="inputPerAdd"></textarea>
													</div>
												</div>
												<div class="row mb-3">
													<label
														class="col-sm-4 col-form-label-sm">Nationality*
													</label>
													<div class="col-sm-8">
														<select class="form-select form-select-sm"
															aria-label="Nationality">
															<option value="1">Indian</option>
															<option value="2">American</option>
														</select>
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Maritial
														Status*
													</label>
													<div class="col-sm-8">
														<select class="form-select form-select-sm"
															aria-label="Maritial Status">
															<option value="1">Married</option>
															<option value="2">Single</option>
														</select>
													</div>
												</div>
												<div class="row mb-3">

													<label for="formFileSm"
														class="form-label col-sm-4 col-form-label-sm mb-0">Photo*</label>


													<div class="col-sm-8">
														<input class="form-control form-control-sm"
															id="formFileSm" type="file">
													</div>
												</div>










											</form>
										</div>
										<!--p-d-form-->
									</div>




									<div class="col-md-6">
										<div class="p-d-form border p-5">
											<h4 class="card-label fw-bolder fs-4 mb-5">
												Account Login
											</h4>

											<form>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Email*
													</label>
													<div class="col-sm-8">
														<input type="email"
															class="form-control form-control-sm"
															id="inputEmail">
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Password*
													</label>
													<div class="col-sm-8">
														<input type="text"
															class="form-control form-control-sm"
															id="inputPass">
													</div>
												</div>
												<div class="text-end pt-3">
													<button type="submit"
														class="btn btn-sm btn-dark mx-auto">Create Temp
														Pasword and Send Email</button>
												</div>









											</form>
										</div>
										<!--p-d-form-->




									</div>


									<div
										class="col-md-12 d-flex align-items-center gap-3 mt-5 justify-content-center">
										<button type="submit"
											class="btn btn-sm btn-primary">Save</button> <button
											type="submit" class="btn btn-sm btn-dark">Reset</button>
									</div>













								</div>
							</div>
							<div class="tab-pane fade" id="company-details" role="tabpanel"
								aria-labelledby="company-details-tab">
								<div class="row">
									<div class="col-md-6">
										<div class="p-d-form border p-5">
											<h4 class="card-label fw-bolder fs-4 mb-5">
												Company Details
											</h4>

											<form>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Employee
														ID*
													</label>
													<div class="col-sm-8">
														<input type="text"
															class="form-control form-control-sm"
															id="inputEmpId">
													</div>
												</div>

												<div class="row mb-3">
													<label
														class="col-sm-4 col-form-label-sm">Department*
													</label>
													<div class="col-sm-8">
														<select class="form-select form-select-sm"
															aria-label="Department">
															<option value="1">Indian</option>
															<option value="2">American</option>
														</select>
													</div>
												</div>
												<div class="row mb-3">
													<label
														class="col-sm-4 col-form-label-sm">Designation*
													</label>
													<div class="col-sm-8">
														<select class="form-select form-select-sm"
															aria-label="Designation">
															<option value="1">Indian</option>
															<option value="2">American</option>
														</select>
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Date of
														Joining*
													</label>
													<div class="col-sm-8">
														<input type="date"
															class="form-control form-control-sm"
															id="inputDOJ">
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Date of
														Leaving*
													</label>
													<div class="col-sm-8">
														<input type="date"
															class="form-control form-control-sm"
															id="inputDOL">
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Status
													</label>
													<div class="col-sm-8">
														<select class="form-select form-select-sm"
															aria-label="Active">
															<option value="1">Active</option>
															<option value="2">Inactive</option>
														</select>
													</div>
												</div>











											</form>
										</div>
									</div>
									<div
										class="col-md-12 d-flex align-items-center gap-3 mt-5 justify-content-center">
										<button type="submit"
											class="btn btn-sm btn-primary">Save</button> <button
											type="submit" class="btn btn-sm btn-dark">Reset</button>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="financial-details" role="tabpanel"
								aria-labelledby="financial-details-tab">

								<div class="row">
									<div class="col-md-6">
										<div class="p-d-form border p-5">
											<h4 class="card-label fw-bolder fs-4 mb-5">
												Financial Details
											</h4>

											<form>
												<div class="row mb-3">
													<label class="col-sm-6 col-form-label-sm">Basic
														Salary*
													</label>
													<div class="col-sm-4">
														<input type="text"
															class="form-control form-control-sm"
															id="inputBasicSalary">
													</div>
												</div>

												<div class="row mb-3">
													<div class="col-sm-6">
														<select class="form-select form-select-sm"
															aria-label="Allowances 1">
															<option value="1">Allowances 1</option>
															<option value="2">Allowances 2</option>
														</select>
													</div>
													<div class="col-sm-4">
														<div class="input-group input-group-sm mb-3">
															<span class="input-group-text"><i
																	class="fa-solid fa-indian-rupee-sign"></i></span>
															<input type="text" class="form-control">
														</div>
													</div>
													<div class="col-sm-2">
														<button type="submit"
															class="btn btn-sm btn-secondary w-100"><i
																class="fa-solid fa-plus"></i></button>
													</div>
												</div>
												<div class="row mb-3">
													<div class="col-sm-6">
														<select class="form-select form-select-sm"
															aria-label="Deduction 1">
															<option value="1">Deduction 1</option>
															<option value="2">Deduction 2</option>
														</select>
													</div>
													<div class="col-sm-4">
														<div class="input-group input-group-sm mb-3">
															<span class="input-group-text"><i
																	class="fa-solid fa-indian-rupee-sign"></i></span>
															<input type="text" class="form-control">
														</div>
													</div>
													<div class="col-sm-2">
														<button type="submit"
															class="btn btn-sm btn-secondary w-100"><i
																class="fa-solid fa-plus"></i></button>
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-6 col-form-label-sm">Monthly
														Salary
													</label>
													<div class="col-sm-4">
														<div class="input-group input-group-sm mb-3">
															<span class="input-group-text"><i
																	class="fa-solid fa-indian-rupee-sign"></i></span>
															<input type="text" class="form-control">
														</div>
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-6 col-form-label-sm">Yearly
														Salary
													</label>
													<div class="col-sm-4">
														<div class="input-group input-group-sm mb-3">
															<span class="input-group-text"><i
																	class="fa-solid fa-indian-rupee-sign"></i></span>
															<input type="text" class="form-control">
														</div>
													</div>
												</div>

											</form>
										</div>
									</div>
									<div
										class="col-md-12 d-flex align-items-center gap-3 mt-5 justify-content-center">
										<button type="submit"
											class="btn btn-sm btn-primary">Save</button> <button
											type="submit" class="btn btn-sm btn-dark">Reset</button>
									</div>
								</div>


							</div>
							<div class="tab-pane fade" id="bankac-details" role="tabpanel"
								aria-labelledby="bankac-details-tab">

								<div class="row">
									<div class="col-md-6">
										<div class="p-d-form border p-5">
											<h4 class="card-label fw-bolder fs-4 mb-5">
												Bank Account Details

											</h4>

											<form>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Account
														Holder Name
													</label>
													<div class="col-sm-8">
														<input type="text"
															class="form-control form-control-sm"
															id="inputAcholderName">
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Account
														Number
													</label>
													<div class="col-sm-8">
														<input type="text"
															class="form-control form-control-sm"
															id="inputAccNumber">
													</div>
												</div>

												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Bank Name
													</label>
													<div class="col-sm-8">
														<input type="text"
															class="form-control form-control-sm"
															id="inputBankName">
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Branch
													</label>
													<div class="col-sm-8">
														<input type="text"
															class="form-control form-control-sm"
															id="inputBranchName">
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">IFSC Code
													</label>
													<div class="col-sm-8">
														<input type="text"
															class="form-control form-control-sm"
															id="inputIfscCode">
													</div>
												</div>

											</form>
										</div>
										<!--p-d-form-->
									</div>




									<div class="col-md-6">
										<div class="p-d-form border p-5">
											<h4 class="card-label fw-bolder fs-4 mb-5">
												Assign Manager
											</h4>

											<form>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Search by
														Email*
													</label>
													<div class="col-sm-8">
														<input type="email"
															class="form-control form-control-sm"
															id="inputSearchByEmail">
													</div>
												</div>
												<div class="row mb-3">
													<label class="col-sm-4 col-form-label-sm">Search by
														Name*
													</label>
													<div class="col-sm-8">
														<input type="text"
															class="form-control form-control-sm"
															id="inputSearchByName">
													</div>
												</div>

												<div class="text-end pt-3">
													<button type="button"
														class="btn btn-sm btn-dark mx-auto" data-bs-toggle="modal" data-bs-target="#newEmpAddModal">Search</button>
												</div>


											</form>
										</div>
										<!--p-d-form-->

									</div>

									<div
										class="col-md-12 d-flex align-items-center gap-3 mt-5 justify-content-center">
										<button type="submit"
											class="btn btn-sm btn-primary">Save</button> <button
											type="submit" class="btn btn-sm btn-dark">Reset</button>
									</div>

								</div>

							</div>
							<div class="tab-pane fade" id="doc-details" role="tabpanel"
								aria-labelledby="doc-details-tab">
								<div class="row">
								<div class="col-md-6">
									<div class="p-d-form border p-5">
										<h4 class="card-label fw-bolder fs-4 mb-5">
											Documents
										</h4>

										<form>
											<div class="row mb-3">

												<label for="formFileSm"
													class="form-label col-sm-4 col-form-label-sm mb-0">Resume</label>


												<div class="col-sm-8">
													<input class="form-control form-control-sm"
														id="formFileResume" type="file">
												</div>
											</div>
											<div class="row mb-3">

												<label for="formFileSm"
													class="form-label col-sm-4 col-form-label-sm mb-0">Offer
													Letter</label>


												<div class="col-sm-8">
													<input class="form-control form-control-sm"
														id="formFileOfferLetter" type="file">
												</div>
											</div>
											<div class="row mb-3">

												<label for="formFileSm"
													class="form-label col-sm-4 col-form-label-sm mb-0">Joining
													Letter</label>


												<div class="col-sm-8">
													<input class="form-control form-control-sm"
														id="formFileJoiningLetter" type="file">
												</div>
											</div>
											<div class="row mb-3">

												<label for="formFileSm"
													class="form-label col-sm-4 col-form-label-sm mb-0">Agreement
												</label>


												<div class="col-sm-8">
													<input class="form-control form-control-sm"
														id="formFileAgreement" type="file">
												</div>
											</div>
											<div class="row mb-3">

												<label for="formFileSm"
													class="form-label col-sm-4 col-form-label-sm mb-0">Dropbox
													URL
												</label>


												<div class="col-sm-8">
													<input class="form-control form-control-sm"
														id="formFileDropboxUurl" type="url">
												</div>
											</div>
											<div class="row mb-3">

												<label for="formFileSm"
													class="form-label col-sm-4 col-form-label-sm mb-0">Google
													Drive
												</label>


												<div class="col-sm-8">
													<input class="form-control form-control-sm"
														id="formFileGDrive" type="url">
												</div>
											</div>
											<div class="row mb-3">
												<label
													class="offset-md-4 col-sm-6 col-form-label-sm text-end">Add
													More Documents
												</label>
												<div class="col-sm-2">
													<button type="submit"
														class="btn btn-sm btn-secondary w-100"><i
															class="fa-solid fa-plus"></i></button>
												</div>
											</div>


										</form>
									</div>
									<!--p-d-form-->

								</div>
								<div class="col-md-12 d-flex align-items-center gap-3 mt-5 justify-content-center">
									<button type="submit" class="btn btn-sm btn-primary">Save</button> <button type="submit" class="btn btn-sm btn-dark">Reset</button>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!--end::Row-->

		</div>
		<!--end::Container-->
		
      <div class="content">
        <div class="container-fluid">
          <div class="container-fluid">
			<div class="row">
			  <div class="col-md-6">
			    <div class="card card-primary">
			      <div class="card-header">
			        <h3 class="card-title">Personal Details</h3>
			      </div>
			      <form id="quickForm">
			        <div class="card-body">
			          <div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="inputName" placeholder="Email">
						</div>
					  </div>
					  <div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Father Name*</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="inputFName" placeholder="inputFName">
							</div>
					   </div>
					   <div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Date of Birth*</label>
							<div class="col-sm-9">
								<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
							</div>
					   </div>	
					   
			        <div class="card-footer">
			          <button type="submit" class="btn btn-primary">Submit</button>
			        </div>
			      </form>
			    </div>
			  </div>
			  <div class="col-md-6">
			  	<div class="card card-primary">
			      <div class="card-header">
			        <h3 class="card-title">Account Login</h3>
			      </div>
			      <form id="quickForm">
			        <div class="card-body">
			        	<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputName" placeholder="Email">
							</div>
						</div>
					  	<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label">Password*</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="inputFName" placeholder="Password">
							</div>
					  	</div>
			        </div>
			        <div class="card-footer">
			          <button type="submit" class="btn btn-primary">Submit</button>
			        </div>
			      </form>
			    </div>
			  </div>
			</div>
			</div>
        </div>
      </div>
</template>
<script>
export default {
  name: 'AddEmployee',
  data () {
    return {
      
    }
  }
}
</script>