<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function ViewStudentGroup()
    {
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.student_group.view_group', $data);
    }

    public function StudentGroupAdd()
    {
        return view('backend.setup.student_group.add_group');
    }

    public function StudentGroupStore(Request $request)
    {
        $request->validate([
        'name' => 'required|unique:student_groups,name',
        ]);
        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Inserted Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.student.group')->with($notification);
    }

    public function StudentGroupEdit($id)
    {
        $data = StudentGroup::find($id);
        return view('backend.setup.student_group.edit_group', compact('data'));
    }

    public function StudentGroupUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:student_groups,name',
            ]);
        $data = StudentGroup::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group Updated Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.student.group')->with($notification);
    }

    public function StudentGroupDelete($id)
    {
        $data = StudentGroup::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Student Group Deleted Successfull',
            'alert-type' => 'info'
        );
        
        return Redirect()->route('view.student.group')->with($notification);
    }
}
