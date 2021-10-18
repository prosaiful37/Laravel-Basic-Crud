<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;

class CrudController extends Controller
{
    /**
     * show insert datapage
     */
    public function showFrom()
    {
        return view('crud.index');
    }


    /**
     * create data 
     */

    public function createCrudData(Request $request)
    {

        /**
         * file upload system
         */
        if($request -> hasFile('photo')){
            $image = $request -> file('photo');
            $photo_name = md5( time().rand()) .'.'. $image -> getClientOriginalExtension();
            $image -> move(public_path('media/students/'), $photo_name);
        }else{
            $photo_name = "";
        }




        //validation 
        $this -> validate($request, [
            'name'      => 'required',
            'uname'      => 'required',
            'email'      => 'required  | unique:cruds',
            'cell'      => 'required',

        ]);


       //data send by database 
       Crud::create([
        'name'      => $request -> name,
        'username'  => $request -> uname,
        'cell'      => $request -> cell,
        'cell'      => $request -> cell,
        'email'     => $request -> email,
        'photo'     => $photo_name,

       ]);

       //rediraction
       return redirect() -> back() -> with('success', 'Student Added Successful');  

    }

    
       /**
        * All student show
        */
        public function showAllData()
        {   
            $all_student = Crud::all();
            return view('crud.all',[
                'students'  => $all_student,
            ]);
        }

        /** 
         * Show single studnent
         */
        public function singleShow($id)
        {   
            $student = Crud::find($id);
            return view('crud.show', [
                'show_student'    => $student,
            ]);
        }


        /**
         * Crud data delete
         */
        public function deleteData($id)
        {
           
            $delete_student = Crud::find($id);
            $delete_student -> delete();

            return redirect() -> back() -> with('success', 'Student Delete Successful');

        } 
  
        /** 
         * Crud data edit
         */
        public function editData($id) 
        {    
            $edit_student = Crud::find($id);
             return view('crud.edit', [
                'student_edit'  => $edit_student,

             ]);
        }









    






}
