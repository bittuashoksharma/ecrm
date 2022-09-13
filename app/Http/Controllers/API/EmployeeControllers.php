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

        $validated = $request->validate([
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
            'photo' => 'nullable',
        ]);

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

        $validated = $request->validate([
            'user_id' => 'nullable',
            'employee_id' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'assigned_manager' => 'nullable',
            'doj' => 'required',
            'dol' => 'nullable',
            'status' => 'required',
        ]);

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

        $validated = $request->validate([
            'user_id' => 'nullable',
            'basis_salary' => 'required',
            'allowances' => 'nullable',
            'allowances_amount' => 'nullable',
            'deductions' => 'nullable',
            'deductions_amount' => 'nullable',
            'monthly_salary' => 'required',
            'yearly_salary' => 'required',
        ]);

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

        $validated = $request->validate([
            'user_id' => 'nullable',
            'account_holder_name' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'branch' => 'required',
            'ifsc_code' => 'required',
        ]);

        if(!empty(request('user_id'))){
            
            $empBankData = EmployeeBankDetail::create([
                            'user_id' => (!empty(request('user_id'))?request('user_id'):2),
                            'account_holder_name' => (!empty(request('account_holder_name'))?request('account_holder_name'):''),
                            'account_number' => (!empty(request('account_number'))?request('account_number'):''),
                            'bank_name' => (!empty(request('bank_name'))?request('bank_name'):''),
                            'branch' => (!empty(request('bank_name'))?request('branch'):''),
                            'ifsc_code' => (!empty(request('ifsc_code'))?request('ifsc_code'):''),
                        ]);

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
         $request->validate([
               'user_id' => 'required',  
               'resume_file' => 'mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf',
               'offer_letter' => 'mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf',
               'joining_letter' => 'mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf',
               'agreement' => 'mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf',
               // 'dropbox_url' => 'required',
               // 'google_drive' => 'required'
            ]);

           
             

             if($request->hasFile('resume_file')) {
                $uploadDocuments = new EmployeeDocumentsDetail;
                $resume = $request->file('resume_file');
                $file_name = time().'_resume_'.$resume->getClientOriginalName();
                $file_path = $request->file('resume_file')->storeAs('employee_documents', $file_name, 'public');
                $uploadDocuments->user_id = $request->input('user_id');
                $uploadDocuments->document_name = 'resume';
                $uploadDocuments->upload_file_name = $file_name; 
                $uploadDocuments->save();
            } 
            if($request->hasFile('offer_letter')) {
                 $uploadDocuments = new EmployeeDocumentsDetail;
                $resume = $request->file('offer_letter');
                $file_name = time().'_resume_'.$resume->getClientOriginalName();
                $file_path = $request->file('offer_letter')->storeAs('employee_documents', $file_name, 'public');
                $uploadDocuments->user_id = $request->input('user_id');
                $uploadDocuments->document_name = 'offer_letter';
                $uploadDocuments->upload_file_name = $file_name;
                $uploadDocuments->save(); 
            } 
            if($request->hasFile('joining_letter')) {
                 $uploadDocuments = new EmployeeDocumentsDetail;
                $resume = $request->file('joining_letter');
                $file_name = time().'_resume_'.$resume->getClientOriginalName();
                $file_path = $request->file('joining_letter')->storeAs('employee_documents', $file_name, 'public');
                $uploadDocuments->user_id = $request->input('user_id'); 
                $uploadDocuments->document_name = 'joining_letter';
                $uploadDocuments->upload_file_name = $file_name; 
                $uploadDocuments->save();
            } 
            if($request->hasFile('agreement')) {
                 $uploadDocuments = new EmployeeDocumentsDetail;
                $resume = $request->file('agreement');
                $file_name = time().'_resume_'.$resume->getClientOriginalName();
                $file_path = $request->file('agreement')->storeAs('employee_documents', $file_name, 'public');
                $uploadDocuments->user_id = $request->input('user_id');
                $uploadDocuments->document_name = 'agreement';
                $uploadDocuments->upload_file_name = $file_name; 
                $uploadDocuments->save();
            } 
            return response()->json(['success'=>'File uploaded successfully.']);
    }

}
