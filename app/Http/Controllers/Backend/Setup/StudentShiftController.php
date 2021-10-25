<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function ViewStudentShift()
    {
        $data['allData'] = StudentShift::all();
        return view('backend.setup.student_shift.view_shift', $data);
    }

    public function StudentShiftAdd()
    {
        return view('backend.setup.student_shift.add_shift');
    }

    public function StudentShiftStore(Request $request)
    {
        $request->validate([
        'name' => 'required|unique:student_shifts,name',
        ]);
        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Inserted Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.student.shift')->with($notification);
    }

    public function StudentShiftEdit($id)
    {
        $data = StudentShift::find($id);
        return view('backend.setup.student_shift.edit_shift', compact('data'));
    }

    public function StudentShiftUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:student_shifts,name',
            ]);
        $data = StudentShift::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift Updated Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.student.shift')->with($notification);
    }

    public function StudentShiftDelete($id)
    {
        $data = StudentShift::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Student Shift Deleted Successfull',
            'alert-type' => 'info'
        );
        
        return Redirect()->route('view.student.shift')->with($notification);
    }
}
