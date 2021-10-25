<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function ViewStudentYear()
    {
        $data['allData'] = StudentYear::all();
        return view('backend.setup.student_year.view_year', $data);
    }

    public function StudentYearAdd()
    {
        return view('backend.setup.student_year.add_year');
    }

    public function StudentYearStore(Request $request)
    {
        $request->validate([
        'name' => 'required|unique:student_years,name',
        ]);
        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Inserted Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.student.year')->with($notification);
    }

    public function StudentYearEdit($id)
    {
        $data = StudentYear::find($id);
        return view('backend.setup.student_year.edit_year', compact('data'));
    }

    public function StudentYearUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:student_years,name',
            ]);
        $data = StudentYear::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year Updated Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.student.year')->with($notification);
    }

    public function StudentYearDelete($id)
    {
        $data = StudentYear::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Student Year Deleted Successfull',
            'alert-type' => 'info'
        );
        
        return Redirect()->route('view.student.year')->with($notification);
    }
}
