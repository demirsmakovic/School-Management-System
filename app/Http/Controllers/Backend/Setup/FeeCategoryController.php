<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    public function ViewFeeCategory()
    {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_category', $data);
    }

    public function FeeCategoryAdd()
    {
        return view('backend.setup.fee_category.add_fee_category');
    }

    public function FeeCategoryStore(Request $request)
    {
        $request->validate([
        'name' => 'required|unique:fee_categories,name',
        ]);
        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Inserted Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.fee_category')->with($notification);
    }

    public function FeeCategoryEdit($id)
    {
        $data = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_category', compact('data'));
    }

    public function FeeCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:fee_categories,name',
            ]);
        $data = FeeCategory::find($id);
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Fee Category Updated Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.fee_category')->with($notification);
    }

    public function FeeCategoryDelete($id)
    {
        $data = FeeCategory::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Fee Category Deleted Successfull',
            'alert-type' => 'info'
        );
        
        return Redirect()->route('view.fee_category')->with($notification);
    }
}
