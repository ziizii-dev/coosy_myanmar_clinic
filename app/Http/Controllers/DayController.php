<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DayController extends Controller
{
    //
    public function clinicDayStore(Request $request){
          $this->dayValidationCheck($request);
        // return $request;
        $notification = array(
            'message'=>"Day Created Successfully",
            'alert-type'=>'success'
        );
        return back()->with($notification); 

    }//
    private function dayValidationCheck($request){
        Validator::make($request->all(),[
            'name'=>'required',
        ])->Validate();
     }//End

}
