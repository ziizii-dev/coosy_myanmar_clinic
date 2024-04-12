<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClinicRequest;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    //
    public function clinicList(){
        $clinics = Clinic::get();
        return view ('Clinic.clinic_list',compact('clinics'));
    }//

    public function clinicStore(ClinicRequest $request){
        $validator=$request->validated();
        // return $validator;
        Clinic::create($validator);

        $notification = array(
            'message'=>"Create Successfully",
            'alert-type'=>'success'
        );
        return back()->with($notification); 
    }//end method

    public function clinicUpdate(ClinicRequest $request){
        $validator=$request->validated();
        Clinic::where('id',$request->id)->update($validator);
        $notification = array(
            'message'=>"Updated Successfully",
            'alert-type'=>'success'
        );
        return back()->with($notification); 
    }//
    public function clinicDelete( $id){
        Clinic::where('id',$id)->delete();
        $notification = array(
            'message'=>"Deleted Successfully",
            'alert-type'=>'success'
        );
        return back()->with($notification); 
    }
}
