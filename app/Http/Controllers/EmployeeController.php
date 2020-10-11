<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use PhpParser\Node\Stmt\Echo_;
use Illuminate\Support\Facades\Validator;
use DB;

class EmployeeController extends Controller
{
    //
    function show() {
        $employees = Employee::all();
        return view ('/list')->with (compact ('employees'));
       // return view('list');
    }

    function addEmployee() {
        return view('add');
    }

    function saveEmployee(Request $request) {
        $validator = Validator::make($request->all(),[
            'firstname' => 'required|max:255',
            'lastname' => 'required'
        ] );

        if ($validator->passes()) {
            //Insert record in db
            //echo "Validated";
            $employee = new Employee;
            $employee->firstname = $request->firstname;
            $employee->lastname = $request->lastname;
            $employee->email = $request->email;
            $employee->hobbies = $request->hobbies;
            $employee->gender = $request->gender;
            //$employee->upload_picture = $request->upload_picture;
            if ($request->hasfile('upload_picture'))
             {
                $file = $request->file('upload_picture');
                $extension = $file->getClientOriginalExtension();//getting image extension
                $filename = time() . '.' . $extension;
                $file->move('uploads/employee/',$filename);
                $employee ->upload_picture = $filename;
              } 
              else {
                  return $request;
                  $employee->upload_image = '';

              }   
            $employee->save();

            $request->session()->flash('msg','Employee saved successfully.');
            return redirect ('/employees');
            
        } else {
            //retuen with error
            return redirect('/employees/add')->withErrors($validator)->withInput();
            //return redirect Route::post('/employees/add')->withErrors($validator)->withInput();
            //return Redirect::back()->withErrors($Validator)->withInput();

        }
        
        // dd($request->all());
    } 
    function editEmployee($id, Request $request) {
        //fetch a record from database
        $employee = Employee::where('id', $id)->first();
        if(!$employee) {
            $request->session()->flash('errorMsg', 'Record not found.');
            return redirect('employees');
        }
        //echo $id;
        return view('edit')->with (compact ('employee'));
    }
    //update
    function updateEmployee($id, Request $request) {

        $validator = Validator::make($request->all(),[
            'firstname' => 'required|max:255',
            'lastname' => 'required'
        ] );

        if ($validator->passes()) {
            //Insert record in db
            //echo "Validated";
            $employee = Employee::find($id);
            $employee->firstname = $request->firstname;
            $employee->lastname = $request->lastname;
            $employee->email = $request->email;
            $employee->hobbies = $request->hobbies;
            $employee->gender = $request->gender;
            $employee->upload_picture = $request->upload_picture;
            $employee->save();

            $request->session()->flash('msg','Employee Updated successfully.');
            return redirect ('/employees');
            
        } else {
            //retuen with error
            return redirect('/employees/edit/'.$id)->withErrors($validator)->withInput();
            //return redirect Route::post('/employees/add')->withErrors($validator)->withInput();
            //return Redirect::back()->withErrors($Validator)->withInput();

        }
    } 
    function deleteEmployee($id, Request $request) {
        $employee = Employee::where('id', $id)->first();
        if(!$employee) {
            $request->session()->flash('errorMsg', 'Record not found.');
            return redirect('employees');
        }

        Employee::where('id',$id)->delete();
        $request->session()->flash('msg', 'Record has been deleted successfully.');
            return redirect('employees');

    }

    
}
