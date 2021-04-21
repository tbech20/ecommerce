<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{


    public function login(Request $request)
    {


        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('name', $username)->first();

        if ($user) {

            if (Hash::check($password, $user->password)) {

                session(['userId' => $user->id]);
                return redirect('/admin/dashboard');
            } else {


                return redirect()->back()->with(['loginError' => 'The username or password was incorrect']);
            }
        } else {
            return redirect()->back()->with(['loginError' => 'The username or password was incorrect']);
        }
    }

    //The create method (This method is to create a user with some default value, you can create the user using this method then can change the
    // credentials from admin panel)

    public function create()
    {


        $user = new User();
        $user->name = 'ecommerceAdmin';
        $user->password = Hash::make('8@A!grP354$#y%^');
        $user->save();
        return "User Created!";
    }

    public function logout()
    {

        session()->flush();
        return redirect('/');
    }


    public function credentials()
    {

        $page = 'credentials';
        $user = User::find(1);
        return view('credentials', compact('page', 'user'));
    }

    public function changeCredentials(Request $request)
    {


        if (!session('userId')) {

            return redirect()->back();
        }

        $user = User::find(1);
        $user->name  = $request->input('username');

        if ($request->input('password')) {

            $user->password  = Hash::make($request->input('password'));
        }
        if ($user->save()) {

            return redirect()->back()->with(['successfull' => 'Successfully updated credentials!🙂']);
        }
    }
}
