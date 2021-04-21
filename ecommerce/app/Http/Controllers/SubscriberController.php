<?php

namespace App\Http\Controllers;

use App\Mail\subscribeMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {

        $email = $request->input('email');


        $subscriber = new Subscriber();


        $subscriber->email = $email;


        if ($subscriber->save()) {

            return redirect()->back()->with(['subscribed', 'Succesfully subscriber!']);
        } else {
            abort(500);
        };
    }

    public function subscriberDelete($id)
    {


        if (!session('userId')) {

            return redirect('/admin/login');
        }

        $subscriber = Subscriber::find($id);
        if ($subscriber->delete()) {

            return redirect()->back()->with(['deleted' => 'Successfully deleted 1 Subscriber']);
        };
    }


    public function subscribers()
    {
        if (!session('userId')) {

            return redirect('/admin/login');
        }

        $subscribers = Subscriber::all();
        $page = 'subscribers';
        return view('subscribers', compact('subscribers', 'page'));
    }
}
