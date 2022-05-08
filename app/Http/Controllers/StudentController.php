<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
class StudentController extends Controller
{
    public function index(){
        return view('home');
    }

    

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $students = new Students;
        $students->first_name = $request->firstname;
        $students->last_name = $request->lastname;
        $students->email = $request->email;
        $students->phone = $request->phone;
        $students->save();
        return redirect(route('home'))->with('successMsg', 'Student Successfully Added');
    }

    public function edit($id){
        $students = Students::find($id);
        return view('edit', compact('students'));
    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        
        $students = Students::find($id);
        $students->first_name = $request->firstname;
        $students->last_name = $request->lastname;
        $students->email = $request->email;
        $students->phone = $request->phone;
        $students->save();
        return redirect(route('home'))->with('successMsg', 'Student Successfully Updated');

    }

    public function delete($id){
        
        Students::find($id)->delete();
        return redirect(route('home'))->with('successMsg', 'Student Successfully Deleted');

    }
}
