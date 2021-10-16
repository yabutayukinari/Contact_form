<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function confirm(Request $request)
    {   $inputs = $request->all();
        // dd($inputs);でデータ取得確認済み

        // Contact::insert([
        //     'fullname' => $inputs['lastname'].=$inputs['firstname'],
        //     'gender' => $inputs['gender'],
        //     'email' => $inputs['email'],
        //     'postcode' => $inputs['zip11'],
        //     'address'  => $inputs['addr11'],
        //     'building_name' => $inputs['building_name'],
        //     'opinion' => $inputs['opinion']
        // ]);

        return view('confirm', ['inputs' => $inputs]);
    }
    public function process(Request $request)
    {
        // $action = $request->get('action');
        $action = $request->get('action', 'return');
        $inputs = $request->except('action');

        if($action === 'submit') {
            
            Contact::insert([
            'fullname' => $inputs['lastname'].=$inputs['firstname'],
            'gender' => $inputs['gender'],
            'email' => $inputs['email'],
            'postcode' => $inputs['zip11'],
            'address'  => $inputs['addr11'],
            'building_name' => $inputs['building_name'],
            'opinion' => $inputs['opinion']
        ]);
        return redirect()->route('complete');
        }else{
            return redirect()->route('create')->withInput($inputs);
        }
    }
    public function complete()
    {
        return view('complete');
    }
}
