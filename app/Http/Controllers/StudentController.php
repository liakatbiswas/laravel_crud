<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
 public function studentPage()
 {
  return \view('student');
 }

 public function create(Request $request, FlasherInterface $flasher)
 {
  $request->validate([
   'name'        => 'required',
   'father_name' => 'required',
   'mother_name' => 'required',
   'phone'       => 'required',
   'dob'         => 'required',
  ]);

  $student              = new Student();
  $student->name        = $request->name;
  $student->father_name = $request->father_name;
  $student->mother_name = $request->mother_name;
  $student->phone       = $request->phone;
  $student->dob         = $request->dob;
  $student->save();

  $flasher->addSuccess("Registration Successful!");

  return \redirect(\route('student-list'));
 }

 public function read()
 {
  $std = Student::all();
  return \view('student-list', ['students' => $std]);
 }

 public function edit($id, FlasherInterface $flasher)
 {
//   $student = Student::findOrFail($id);
  $student = Student::find($id);
  if (empty($student)) {
   $flasher->addError('Student Data Not Found');
   return \redirect(\route('student-list'));
  }
  return \view('student-edit', ['student' => $student]);
 }
 public function update($id, Request $request, FlasherInterface $flasher)
 {
  $student = Student::findOrFail($id);

  $request->validate([
   'name'        => 'required',
   'father_name' => 'required',
   'mother_name' => 'required',
   'phone'       => 'required',
   'dob'         => 'required',
  ]);

  // $student              = new Student();
  $student->name        = $request->name;
  $student->father_name = $request->father_name;
  $student->mother_name = $request->mother_name;
  $student->phone       = $request->phone;
  $student->dob         = $request->dob;
  $student->save();

  $flasher->addSuccess("Data Updated!!");
  return \redirect(\route('student-list'));
 }

 public function delete($id, FlasherInterface $flasher)
 {
  $student = Student::findOrFail($id);
  $flasher->addSuccess('Deleted!');
  $student->delete();
  return \redirect(\route('student-list'));
 }

}
