<?php

namespace App\Http\Controllers\API;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
class PermissionsController extends Controller
{

     public function __construct()
    {
        //$this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPermission(Request $request)
    {
        $permission = new Permission;

        $show_records = env('DEFAULT_PAGINATION_RECORD');
        $parmas = (!empty(request('params'))) ? request('params') : [];
        if(!empty($parmas)){
           $show_records = $parmas['show_records'];
        }
        if(!empty($parmas['search'])){
            $search_data = $parmas['search'];
            $permission = $permission->where('name', 'like',  '%' . $search_data .'%');
        }
        
        $permission = $permission->paginate($show_records);
        
        return json_encode(array('code'=>'success','permission'=>$permission));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePermission(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions|regex:/^[a-zA-Z_\-]*$/',
        ]);
        if ($validator->fails()) {

          $validationError = [];
          $validationErrors = $validator->errors();
          return json_encode(array('code'=>'error_validate','errors'=>$validator->errors()));
          
        }
        $data['name'] = $request->input('name');
        $data['guard_name'] = 'web';
        $permissionData = Permission::create($data);

        return json_encode(array('code'=>'success','data'=>$permissionData));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Permission::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required',
        ]);
        $data['guard_name'] = 'web';
        $data['group']       = $request->group;
        $permission = Permission::findOrFail($id);
        $permission->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        try {
            Permission::find($id)->delete();
            return ['status'=>'success'];
        } catch (ModelNotFoundException $e) {
            return ['status'=>'error'];
        }
    }
}
