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
        'email'      => $request -> email,
        'cell'      => $request -> cell,
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

        /**
         * update single student
         */
        public function updateData(Request $request, $id)
        {
            $update_data = Crud::find($id);

            if($request -> hasFile('new_photo') ){
                 $image = $request -> file('new_photo');
                 $photo_name = md5( time().rand()) .'.'. $image -> getClientOriginalExtension();
                 $image -> move(public_path('media/students/'), $photo_name);
                 unlink('media/students/' . $request -> old_photo);
            }else{
                $photo_name = $request  -> old_photo;
            }

            $update_data    -> name  = $request -> name;
            $update_data    -> username = $request -> uname;
            $update_data    -> email = $request -> email;
            $update_data    -> cell  = $request -> cell;
            $update_data    -> photo = $photo_name;
            $update_data    -> update();



            return redirect() -> back() -> with('success', 'Student Update Successful');
        }

 







    






}
