<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function ViewSchoolSubject()
    {
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject', $data);
    }

    public function SchoolSubjectAdd()
    {
        return view('backend.setup.school_subject.add_school_subject');
    }

    public function SchoolSubjectStore(Request $request)
    {
        $request->validate([
        'name' => 'required|unique:school_subjects,name',
        ]);
        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject Inserted Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.school.subject')->with($notification);
    }

    public function SchoolSubjectEdit($id)
    {
        $data = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject', compact('data'));
    }

    public function SchoolSubjectUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:school_subjects,name',
            ]);
        $data = SchoolSubject::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject Updated Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.school.subject')->with($notification);
    }

    public function SchoolSubjectDelete($id)
    {
        $data = SchoolSubject::find($id);
        $data->delete();
        $notification = array(
            'message' => 'School Subject Deleted Successfull',
            'alert-type' => 'info'
        );
        
        return Redirect()->route('view.school.subject')->with($notification);
    }
}
