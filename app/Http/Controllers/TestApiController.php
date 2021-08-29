<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class TestApiController extends Controller
{

    //Return Array 
    public function testArray()
    {
        return 
        [
            'Name'=>'Devendra Kumar',
            'Git'=>'devendra07@github.com',
            'Emmail'=>'cktdevendra@gmail.com',
            'Bio'=>'Laravel Developer',
            'Status'=>'FullStack Devloper',
        ];
    }

    /**
     * Return Data From Database 
     * Return All Data from Table
     * */
    public function students()
    {
        return Student::all();
    }

    /**
     * Return Data From Database 
     * Return Single Data from Table
     * */
    public function student($id = null)
    {
        return $id?Student::find($id):Student::all();
    }

    function addStudent(Request $req)
    {
        $student = new Student;
        $student->name = $req->name;
        $student->email = $req->email;
        $student->mobile = $req->mobile	;
        $student->age = $req->age;
        $student->gender = $req->gender;
        $student->address_info = $req->address_info;
        $student->save();
        if ($student) {
            return ['status'=>'Data Saved!!'];
        }else {
            return ['status'=>'Some Technical Error'];
        }

    }

    public function updateStudent(Request $req)
    {
        $student = Student::find($req->id);        
        if ($student) {
            $student->name = $req->name;
            $student->age = $req->age;
            $student->save();
            return ['status'=>'Data Saved!!'];
        }else {
            return ['status'=>'Some Technical Error'];
        }
    }

    function deleteStudent(Request $req)
    {
        $student = Student::find($req->id)->delete();
        if ($student) {           
            return ['status'=>'1 Row Deleted!!'];
        }else {
            return ['status'=>'Some Technical Error'];
        }
    }
}
