<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\LongHoliday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LongHolidayController extends Controller
{
    //
    public function clinicLongHolidayPage(){
        $clinics=Clinic::get();
        $long_holidays = LongHoliday::get();
        return view('Clinic.long_holiday_list',compact('clinics','long_holidays'));
    }//
    public function clinicLongHolidayStore(Request $request){
        $this->clinicLongHolidayValidationCheck($request);
        LongHoliday::create([
             "clinic_id"=>$request->clinic_id,
             "start_date"=>$request->start_date,
             "end_date"=>$request->end_date,
             "reason"=>$request->reason
        ]);
        $notification = array(
            'message'=>"Created Successfully",
            'alert-type'=>'success'
        );
        return back()->with($notification); 
    }//
    public function clinictLongHolidayUpdate(Request $request){

        $this->clinicLongHolidayValidationCheck($request);
        LongHoliday::where('id',$request->id)->update([
             "clinic_id"=>$request->clinic_id,
             "start_date"=>$request->start_date,
             "end_date"=>$request->end_date,
             "reason"=>$request->reason
        ]);
        $notification = array(
            'message'=>"Updated Successfully",
            'alert-type'=>'success'
        );
        return back()->with($notification);  

    }//end method
    public function clinicLongHolidayDelete($id){
            LongHoliday::find($id)->delete();
            $notification = array(
                'message'=>"Deleted Successfully",
                'alert-type'=>'success'
            );
            return back()->with($notification);  
    }//end method
    private function clinicLongHolidayValidationCheck($request){
        Validator::make($request->all(),[
            'clinic_id'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'reason'=>'required',
        ])->Validate();
     }//End
}
