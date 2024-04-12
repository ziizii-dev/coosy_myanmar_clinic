<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\ClinicTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClinicTimeController extends Controller
{
    //
    public function clinicSchedulePage(){
        $clinics=Clinic::get();
        $clinic_times=ClinicTime::get();
        return view('Clinic.clinic_schedule_list',compact('clinics','clinic_times'));
    }//

    public function clinictTimeStore(Request $request){
        $this->timeValidationCheck($request);
        ClinicTime::create([
            "clinic_id"=>$request->clinic_id,
            "day_of_week"=>$request->day_of_week,
            "opening_hour"=>$request->opening_hour,
            "closing_hour"=>$request->closing_hour
        ]);
        $notification = array(
            'message'=>"Clinic Time Created Successfully",
            'alert-type'=>'success'
        );
        return back()->with($notification); 

    }//end method

    public function clinictTimeUpdate(Request $request){
        $this->timeValidationCheck($request);
        ClinicTime::where('id',$request->id)->update([
            "clinic_id"=>$request->clinic_id,
            "day_of_week"=>$request->day_of_week,
            "opening_hour"=>$request->opening_hour,
            "closing_hour"=>$request->closing_hour

        ]);
        $notification = array(
            'message'=>"Clinic Time Updated Successfully",
            'alert-type'=>'success'
        );
        return back()->with($notification); 
    }//end method

    public function clinicTimeDelete($id){
        ClinicTime::where('id',$id)->delete();
        $notification = array(
            'message'=>"Clinic Time Deleted Successfully",
            'alert-type'=>'success'
        );
        return back()->with($notification); 
    }//end method

    public function clinictHolidayChange($id){
       
        ClinicTime::where('id',$id)->update([
           "is_holiday"=>"0"

        ]);
        $notification = array(
            'message'=>"Updated Successfully",
            'alert-type'=>'success'
        );
        return back()->with($notification); 
    }//
    public function clinictHolidayChange1($id){
       
        ClinicTime::where('id',$id)->update([
           "is_holiday"=>"1"

        ]);
        $notification = array(
            'message'=>"Updated Successfully",
            'alert-type'=>'success'
        );
        return back()->with($notification); 
    }//

    private function timeValidationCheck($request){
        Validator::make($request->all(),[
            'clinic_id'=>'required',
            'day_of_week'=>'required'
        ])->Validate();
     }//End
}
