<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function ViewExamType()
    {
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.view_exam_type', $data);
    }

    public function ExamTypeAdd()
    {
        return view('backend.setup.exam_type.add_exam_type');
    }

    public function ExamTypeStore(Request $request)
    {
        $request->validate([
        'name' => 'required|unique:exam_types,name',
        ]);
        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Inserted Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.exam.type')->with($notification);
    }

    public function ExamTypeEdit($id)
    {
        $data = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type', compact('data'));
    }

    public function ExamTypeUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:exam_types,name',
            ]);
        $data = ExamType::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Exam Type Updated Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.exam.type')->with($notification);
    }

    public function ExamTypeDelete($id)
    {
        $data = ExamType::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Exam Type Deleted Successfull',
            'alert-type' => 'info'
        );
        
        return Redirect()->route('view.exam.type')->with($notification);
    }
}
