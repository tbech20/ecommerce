<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function show()
    {

        return view('contact');
    }

    public function create(Request $request)
    {
        if (!session('userId')) {

            return redirect('/admin/login');
        }

        $ticket = new Ticket();

        $ticket->email = $request->input('email');

        $ticket->message = $request->input('message');


        if ($ticket->save()) {

            return redirect()->back()->with(['successfull' => 'Thank you for contacting us we will review your request and get back to you as soon as possible!🙂']);
        };
    }

    public function showall()
    {

        if (!session('userId')) {

            return redirect('/admin/login');
        }

        $page = 'tickets';

        $tickets = Ticket::all();

        return view('tickets', compact('tickets', 'page'));
    }


    public function delete($id)
    {

        if (!session('userId')) {

            return redirect('/admin/login');
        }

        if ($ticket = Ticket::find($id)->delete()) {

            return redirect()->back()->with((['deleted' => 'Successfully Deleted 1 ticket!']));
        } else {

            return redirect()->back();
        }
    }
}
