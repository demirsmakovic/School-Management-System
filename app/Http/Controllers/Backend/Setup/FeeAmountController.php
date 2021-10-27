<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function ViewFeeAmount()
    {
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
    	return view('backend.setup.fee_amount.view_fee_amount',$data);
        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }

    public function FeeAmountAdd()
    {
        $data['allData'] = FeeCategoryAmount::all();
        $data['categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }

    public function FeeAmountStore(Request $request)
    {
        $countClass = count($request->class_id);
    	if ($countClass !=NULL) {
    		for ($i=0; $i <$countClass ; $i++) { 
    			$fee_amount = new FeeCategoryAmount();
    			$fee_amount->fee_category_id = $request->fee_category_id;
    			$fee_amount->class_id = $request->class_id[$i];
    			$fee_amount->amount = $request->amount[$i];
    			$fee_amount->save();
            }
        }
        $notification = array(
            'message' => 'Fee Amount inserted Successfull',
            'alert-type' => 'success'
        );
        
        return Redirect()->route('view.fee.amount')->with($notification);
    }
}
