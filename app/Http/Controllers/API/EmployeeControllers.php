<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\EmployeePersonalDetail;
use App\Models\EmployeeCompanyDetail;
use App\Models\EmployeeFinancialDetail;
use App\Models\EmployeeBankDetail;
use App\Models\EmployeeDocumentsDetail;
use App\Models\EmployeeAdditionalDetail;
class EmployeeControllers extends Controller
{
    /**
     * Store a employee personal details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEmployeePersonalDetail(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'father_name' => 'required|max:255',
            'dob' => 'required|date',
            'gender' => 'required',
            'contact_number_1' => 'required|numeric',
            'contact_number_2' => 'nullable|numeric',
            'current_address' => 'nullable',
            'permanent_address' => 'required',
            'nationality' => 'required',
            'maritial_status' => 'required',
            'email' => 'required|unique:users|max:255|email',
            'password' => 'required|min:8',
            'photo' => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {

          $validationError = [];
          $validationErrors = $validator->errors();
          return json_encode(array('code'=>'error_validate','errors'=>$validator->errors()));
          
        }
        $userData = User::create([
                        'name' => request('name'),
                        'email' => request('email'),
                        'phone_number' => request('contact_number_1'),
                        'password' => bcrypt(request('password')),
                        'role_id' => 3,
                    ]);
        if(!empty($userData) && !empty($userData->id)){
            $empPerData = EmployeePersonalDetail::create([
                            'user_id' => $userData->id,
                            'father_name' => (!empty(request('name'))?request('name'):''),
                            'dob' => (!empty(request('dob'))?date('Y-m-d',strtotime(request('dob'))):''),
                            'gender' => (!empty(request('gender'))?request('gender'):''),
                            'phone_number_2' => (!empty(request('phone_number_2'))?request('phone_number_2'):''),
                            'current_address' => (!empty(request('current_address'))?request('current_address'):''),
                            'permanent_address' => (!empty(request('permanent_address'))?request('permanent_address'):''),
                            'nationality' => (!empty(request('nationality'))?request('nationality'):''),
                            'maritial_status' => (!empty(request('maritial_status'))?request('maritial_status'):''),
                            'photo' => (!empty(request('photo'))?request('photo'):''),
                        ]);
            $this->checkAndUpdateEmpFormStep($userData->id,1);

        }
        if($request->hasFile('photo') && !empty($userData->id)) {
                $uploadDocuments = new EmployeeDocumentsDetail;
                $profilePic = $request->file('photo');
                $file_name = time().'_profilepic_'.$profilePic->getClientOriginalName();
                $file_path = $request->file('photo')->storeAs('profile_pics', $file_name, 'public');
                $uploadDocuments->user_id = $userData->id;
                $uploadDocuments->document_name = 'profile_pic';
                $uploadDocuments->upload_file_name = $file_name; 
                $uploadDocuments->save();
            }
            

        return json_encode(array('code'=>'success','data'=>$userData));
        
    }

    /**
     * Store a employee company details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEmployeeCompanyDetail(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'employee_id' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'assigned_manager' => 'nullable',
            'doj' => 'required',
            'dol' => 'nullable',
            'status' => 'required',
        ]);

        if ($validator->fails()) {

          $validationError = [];
          $validationErrors = $validator->errors();
          return json_encode(array('code'=>'error_validate','errors'=>$validator->errors()));
          
        }
        
        if(!empty(request('user_id'))){
            $empCompanyData = EmployeeCompanyDetail::create([
                            'user_id' => (!empty(request('user_id'))?request('user_id'):2),
                            'employee_id' => (!empty(request('employee_id'))?request('employee_id'):''),
                            'department_id' => (!empty(request('department'))?request('department'):''),
                            'designation_id' => (!empty(request('designation'))?request('designation'):''),
                            'assigned_manager_id' => (!empty(request('assigned_manager'))?request('assigned_manager'):''),
                            'doj' => (!empty(request('doj'))?date('Y-m-d',strtotime(request('doj'))):''),
                            'dol' => (!empty(request('dol'))?date('Y-m-d',strtotime(request('dol'))):null),
                            'status' => (!empty(request('status'))?request('status'):''),
                            
                        ]);
            $this->checkAndUpdateEmpFormStep(request('user_id'),2);
            return json_encode(array('code'=>'success','data'=>$empCompanyData));
           
        }else{
            return json_encode(array('code'=>'error','message'=>'Something went wrong !! Please try again.'));
        }
    }

    /**
     * Store a employee financial details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEmployeeFinancialDetail(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'basis_salary' => 'required|numeric|between:0,99.99',
            // 'allowances' => 'required|numeric|between:0,99.99',
            // 'allowances_amount' => 'required|numeric|between:0,99.99',
            // 'deductions' => 'required|numeric|between:0,99.99',
            // 'deductions_amount' => 'required|numeric|between:0,99.99',
            'monthly_salary' => 'required|numeric|between:0,99.99',
            'yearly_salary' => 'required|numeric|between:0,99.99',
        ]);

        if ($validator->fails()) {

          $validationError = [];
          $validationErrors = $validator->errors();
          return json_encode(array('code'=>'error_validate','errors'=>$validator->errors()));
          
        }
        
        if(!empty(request('user_id'))){

            $allowancesArr = array();
            $deductionArr = array();
            if(!empty(request('allowances'))){
                $allowancesArr[request('allowances')] = request('allowances_amount');
            }
            if(!empty(request('deductions'))){
                $deductionArr[request('deductions')] = request('deductions_amount');
            }
            
            $empFinancialData = EmployeeFinancialDetail::create([
                            'user_id' => (!empty(request('user_id'))?request('user_id'):2),
                            'basic_salary' => (!empty(request('basis_salary'))?request('basis_salary'):''),
                            'allowances' => (!empty(request('allowances'))?json_encode($allowancesArr):''),
                            'deductions' => (!empty(request('deductions'))?json_encode($deductionArr):''),
                            'monthly_salary' => (!empty(request('monthly_salary'))?request('monthly_salary'):''),
                            'yearly_salary' => (!empty(request('yearly_salary'))?request('yearly_salary'):''),
                        ]);
            $this->checkAndUpdateEmpFormStep(request('user_id'), 3);

            return json_encode(array('code'=>'success','data'=>$empFinancialData));

        }else{
            return json_encode(array('code'=>'error','message'=>'Something went wrong !! Please try again.'));
        }
    }
        
    /**
     * Store a employee financial details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEmployeeBankAccountDetail(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'account_holder_name' => 'required',
            'account_number' => 'required|numeric',
            'bank_name' => 'required',
            'branch' => 'required',
            'ifsc_code' => 'required',
        ]);

        if ($validator->fails()) {

          $validationError = [];
          $validationErrors = $validator->errors();
          return json_encode(array('code'=>'error_validate','errors'=>$validator->errors()));
          
        }
        
        if(!empty(request('user_id'))){
            
            $empBankData = EmployeeBankDetail::create([
                            'user_id' => (!empty(request('user_id'))?request('user_id'):2),
                            'account_holder_name' => (!empty(request('account_holder_name'))?request('account_holder_name'):''),
                            'account_number' => (!empty(request('account_number'))?request('account_number'):''),
                            'bank_name' => (!empty(request('bank_name'))?request('bank_name'):''),
                            'branch' => (!empty(request('bank_name'))?request('branch'):''),
                            'ifsc_code' => (!empty(request('ifsc_code'))?request('ifsc_code'):''),
                        ]);
            $this->checkAndUpdateEmpFormStep(request('user_id'), 4);

             return json_encode(array('code'=>'success','data'=>$empBankData));

        }else{
            return json_encode(array('code'=>'error','message'=>'Something went wrong !! Please try again.'));
        }
    }

    /**
     * Store a employee document details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEmployeeDocumentDetail(Request $request)
    {

        $validator = Validator::make($request->all(),[
             'user_id' => 'required',  
             'resume_file' => 'required|mimes:jpg,jpeg,png',
             'offer_letter' => 'required|mimes:jpg,jpeg,png',
             'joining_letter' => 'required|mimes:jpg,jpeg,png',
             'agreement' => 'required|mimes:jpg,jpeg,png',
             'dropbox_url' => 'required',
             'google_drive' => 'required',
        ]);

        if ($validator->fails()) {

          $validationError = [];
          $validationErrors = $validator->errors();
          return json_encode(array('code'=>'error_validate','errors'=>$validator->errors()));
          
        }

        if(!empty(request('user_id'))){
         $userID = $request->input('user_id');

         if($request->hasFile('resume_file')) {
            $uploadDocuments = new EmployeeDocumentsDetail;
            $resume = $request->file('resume_file');
            $file_name = time().'_resume_'.$resume->getClientOriginalName();
            $file_path = $request->file('resume_file')->storeAs('employee_documents', $file_name, 'public');
            $uploadDocuments->user_id = $userID;
            $uploadDocuments->document_name = 'resume';
            $uploadDocuments->upload_file_name = $file_name; 
            $uploadDocuments->save();
        } 
        if($request->hasFile('offer_letter')) {
             $uploadDocuments = new EmployeeDocumentsDetail;
            $resume = $request->file('offer_letter');
            $file_name = time().'_resume_'.$resume->getClientOriginalName();
            $file_path = $request->file('offer_letter')->storeAs('employee_documents', $file_name, 'public');
            $uploadDocuments->user_id = $userID;
            $uploadDocuments->document_name = 'offer_letter';
            $uploadDocuments->upload_file_name = $file_name;
            $uploadDocuments->save(); 
        } 
        if($request->hasFile('joining_letter')) {
             $uploadDocuments = new EmployeeDocumentsDetail;
            $resume = $request->file('joining_letter');
            $file_name = time().'_resume_'.$resume->getClientOriginalName();
            $file_path = $request->file('joining_letter')->storeAs('employee_documents', $file_name, 'public');
            $uploadDocuments->user_id = $userID; 
            $uploadDocuments->document_name = 'joining_letter';
            $uploadDocuments->upload_file_name = $file_name; 
            $uploadDocuments->save();
        } 
        if($request->hasFile('agreement')) {
             $uploadDocuments = new EmployeeDocumentsDetail;
            $resume = $request->file('agreement');
            $file_name = time().'_resume_'.$resume->getClientOriginalName();
            $file_path = $request->file('agreement')->storeAs('employee_documents', $file_name, 'public');
            $uploadDocuments->user_id = $userID;
            $uploadDocuments->document_name = 'agreement';
            $uploadDocuments->upload_file_name = $file_name; 
            $uploadDocuments->save();
        } 
        //check if user is already exist

        EmployeeAdditionalDetail::updateOrCreate([
             'user_id' => $userID,
        ],
        [
            'dropbox_url' => (!empty(request('dropbox_url'))?request('dropbox_url'):''),
            'google_drive' => (!empty(request('google_drive'))?request('google_drive'):''),
        ]);

        $this->checkAndUpdateEmpFormStep($userID,5);
 
       return json_encode(array('code'=>'success','data'=>[]));
     }else{
        return json_encode(array('code'=>'error','message'=>'Something went wrong !! Please try again.'));
     }
    }

    /**
     * Check Step value for employee form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkAndUpdateEmpFormStep($userId,$stepVal){
        if(!empty($userId) && !empty($stepVal)){
            $employeeAdditionalData = EmployeeAdditionalDetail::where('user_id', $userId)->get();

            if ((count($employeeAdditionalData) == 0) || (!empty($employeeAdditionalData[0]) && ($employeeAdditionalData[0]->step_completed < $stepVal))){
                 $abc= EmployeeAdditionalDetail::updateOrCreate([
                    'user_id' => $userId,
                 ],[
                    'step_completed' => $stepVal,
                 ]);

                
            }
        }
    }

    public function getEmployeePersonalDetail(Request $request){
        if(!empty(request('userId'))){
            $employeeDetails = User::where('id',request('userId'))->with('employeePersonalInfo')->first();
            return json_encode(array('code'=>'success','data'=>$employeeDetails));

        }else{
             return json_encode(array('code'=>'error','message'=>'Something went wrong !! Please try again.'));
        }
        

    }

    public function getTotalEmployeeCount(Request $request){

            $employeeCount = User::where('role_id',3)
                            ->whereHas('employeeAditionalInfo', function($q){
                                    $q->where('step_completed',5);
                            })->count();
            //$employeeCount = User::where('role_id',3)->with('employeePersonalInfo')->count();
            if(!empty($employeeCount)){
                return json_encode(array('code'=>'success','totalEmployeeCount'=>$employeeCount));
            }else{
                return json_encode(array('code'=>'error','message'=>'Something went wrong !! Please try again.'));
            }
        

    }
    
    public function getFilledFormSetup(Request $request){
        if(!empty(request('userId'))){
            $employeeAdditionalDetail = EmployeeAdditionalDetail::where('user_id',request('userId'))->first();
            if(!empty($employeeAdditionalDetail)){
                return json_encode(array('code'=>'success','step_completed'=>$employeeAdditionalDetail->step_completed));
            }else{
                 return json_encode(array('code'=>'error','message'=>'Data not found.'));
            }
        }else{
             return json_encode(array('code'=>'error','message'=>'Something went wrong !! Please try again.'));
        }
    }
}
