<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    public function promocodes()
    {

        if (!session('userId')) {

            return redirect('/admin/login');
        }

        $page = 'promocodes';
        $promocodes = Promocode::all();
        return view('promocodes', compact('page', 'promocodes'));
    }


    public function generatePromoCode(Request $request)
    {

        if (!session('userId')) {

            return redirect('/admin/login');
        }


        $code =  $request->input('code');
        $discount =  $request->input('discount');


        $promocode = new Promocode();
        $promocode->code = $code;
        $promocode->priceDiscount = $discount;
        if ($promocode->save()) {

            return redirect()->back()->with(['succesfull' => 'A new promocode has been created!']);
        };
    }

    public function approve($id)
    {

        $promocode = Promocode::find($id);

        $promocode->status = 'approved';

        $promocode->save();

        return redirect()->back();
    }

    public function unapprove($id)
    {

        $promocode = Promocode::find($id);

        $promocode->status = 'unapproved';

        $promocode->save();

        return redirect()->back();
    }

    public function delete($id)
    {


        if ($promocode = Promocode::findOrFail($id)->delete()) {

            return redirect()->back()->with(['successfull' => 'Promocode Deleted Successfully']);
        };
    }
}
