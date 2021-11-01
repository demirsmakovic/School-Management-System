<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function ViewDesignation()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation', $data);
    }

    public function DesignationAdd()
    {
        return view('backend.setup.designation.add_designation');
    }

    public function DesignationStore(Request $request)
    {
        $request->validate([
        'name' => 'required|unique:designations,name',
        ]);
        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Inserted Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.designation')->with($notification);
    }

    public function DesignationEdit($id)
    {
        $data = Designation::find($id);
        return view('backend.setup.designation.edit_designation', compact('data'));
    }

    public function DesignationUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:designations,name',
            ]);
        $data = Designation::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Designation Updated Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.designation')->with($notification);
    }

    public function DesignationDelete($id)
    {
        $data = Designation::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Designation Deleted Successfull',
            'alert-type' => 'info'
        );
        
        return Redirect()->route('view.designation')->with($notification);
    }
}
