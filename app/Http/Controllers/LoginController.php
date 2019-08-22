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
            if($user->isAdmin())
            {
                return redirect()->route('adminDashboard');
            }
             else if($user->isEmployee())
            {
                return redirect()->route('employeeDashboard');
            }
            else if($user->isSecurityView())
            {
                return redirect()->route('secViewDashboard');
            }
            else if($user->isSecurityUpdator())
            {
                return redirect()->route('secUpdatorDashboard');
            }
            else if($user->isCulturealOffice())
            {
                return redirect()->route('culturealOfficeDashboard');
            }
            else if($user->isStudent())
            {
                return redirect()->route('profile');
            }  

        }
        return redirect()->back();
    }
}
