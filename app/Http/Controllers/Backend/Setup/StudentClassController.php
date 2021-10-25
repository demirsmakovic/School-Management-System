<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function ViewStudent()
    {
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);
    }

    public function ClassAdd()
    {
        return view('backend.setup.student_class.add_class');
    }

    public function ClassStore(Request $request)
    {
        $request->validate([
        'name' => 'required|unique:student_classes,name',
        ]);
        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Inserted Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.student.class')->with($notification);
    }

    public function ClassEdit($id)
    {
        $data = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('data'));
    }

    public function ClassUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:student_classes,name',
            ]);
        $data = StudentClass::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Updated Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.student.class')->with($notification);
    }

    public function ClassDelete($id)
    {
        $data = StudentClass::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Student Class Deleted Successfull',
            'alert-type' => 'info'
        );
        
        return Redirect()->route('view.student.class')->with($notification);
    }
}
