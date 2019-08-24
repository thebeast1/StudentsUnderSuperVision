<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class LoginController extends Controller
{
    public function login(Request $request)
    {
    
        if(Auth::attempt([
            'email'     =>  $request->email,
            'password'  =>  $request->password
        ]))
        {
            $user = User::where('email',$request->email)->first();
            if($user->isAdmin()) # 0
            {
                return redirect()->route('adminDashboard');
            }
             else if($user->isEmployee()) # 1
            {
                return redirect()->route('employeeDashboard');
            }
            else if($user->isSecurityView()) # 2
            {
                return redirect()->route('secViewDashboard');
            }
            else if($user->isSecurityUpdator()) # 3
            {
                return redirect()->route('secUpdatorDashboard');
            }
            else if($user->isCulturealOffice()) # 4
            {
                return redirect()->route('culturealOfficeDashboard');
            }
            else if($user->isStudent()) # 5
            {
                return redirect()->route('profile');
            }  

        }
        return redirect()->back();
    }
}
