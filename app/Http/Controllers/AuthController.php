<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRegisterRequest;

class AuthController extends Controller
{
    public function loginPage(){
        return view ('auth.login');
    }//End method
    public function registerPage(){
        return view ('auth.register');
    }//


   
        public function userRegister(Request $request){

            $this->userRegisterValidationCheck($request);
        
        
             User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
                'password' => Hash::make($request->password),
            ]);
            $notification = array(
                'message'=>"Register Successfully",
                'alert-type'=>'success'
            );
            return redirect()->route('auth.loginPage')->with($notification);  
          
                
    }//end method
    public function adminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }//End Method

    public function dashboard(){
        $notification = array(
            'message'=>"Login Successfully",
            'alert-type'=>'success'
        );
        return view('Admin.dashboard')->with($notification);
    }//end method
    public function adminProfile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('Admin.admin_profile_view',compact('adminData'));
    }//end method
    public function adminProfileStore(Request $request){
        $this->profileValidationCheck($request);
       $data = User::where('id',Auth::user()->id)->first();
       $data ->name = $request->name;
       $data ->email = $request->email;
       $data ->phone = $request->phone;
       $data ->address = $request->address;
       if($request->file('photo')){
           $file = $request->file('photo');
           @unlink(public_path('upload/admin_images/'.$data->photo));
           $fileName = uniqid(). $request->file('photo')->getClientOriginalName();
           // dd ($fileName);
           $file->move(public_path('upload/admin_images'),$fileName);
           $data['profile_photo_path']=$fileName;
       }
       $data->save();
       // dd($data->toArray());
       $notification = array(
           'message'=>"Admin Profile Updated Successfully",
           'alert-type'=>'success'
       );
       return redirect()->back()->with($notification);

         }//End Menthod

         public function adminChangePassword(){

            return view('Admin.admin_change_password');
          }//end method

          public function updatePassword(Request $request){
            $this->passwordValidationCheck($request);
            $hasedPassword = Auth::user()->password;
            // return $hasedPassword;
            // return $request->oldPassword;
            if(Hash::check($request->oldPassword,$hasedPassword)){
                // return "hello";
                $users = User::find(Auth::id());
                // return $users;
                $users->password = bcrypt($request->newPassword);
                $users->save();
                 $notification = array(
                    'message'=>"Password Updated Successfully",
                    'alert-type'=>'success'
                );

                return back()->with($notification);

            } else{
                $notification = array(
                    'message'=>"Password does't match",
                    'alert-type'=>'warning'
                );

                return back()->with($notification);
            }

        } //End method
    private function userRegisterValidationCheck($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'password_confirmation'=>'required| same:password'

        ])->Validate();

    }//End method
    private function userLoginValidationCheck($request){
        Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
    
        ])->Validate();
    }//End method
    private function profileValidationCheck($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'photo'=>'mimes:jpeg,jpg,png,webp,gif'

        ])->Validate();
     }//
     private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'oldPassword'=>'required',
            'newPassword'=>'required',
            'confirmPassword'=>'required|same:newPassword',

        ])->Validate();
     }//End
    
}
