<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactsController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function confirm(Request $request)
    {
        $inputs = $request->all();
        // セッションに保存
        Session::put('lastname', $inputs['lastname']);
        Session::put('firstname', $inputs['firstname']);
        Session::put('gender', $inputs['gender']);
        Session::put('email', $inputs['email']);
        Session::put('zip11', $inputs['zip11']);
        Session::put('addr11', $inputs['addr11']);
        Session::put('building_name', $inputs['building_name']);
        Session::put('opinion', $inputs['opinion']);
        return view('confirm', ['inputs' => $inputs]);
    }

    public function process(Request $request)
    {
        $inputs = $request->except('action');

        Contact::insert([
            'fullname' => $inputs['lastname'] . $inputs['firstname'],
            'gender' => $inputs['gender'],
            'email' => $inputs['email'],
            'postcode' => $inputs['zip11'],
            'address' => $inputs['addr11'],
            'building_name' => $inputs['building_name'],
            'opinion' => $inputs['opinion']
        ]);
        return redirect()->route('complete');
    }

    /**
     * 入力画面に戻る
     *
     * @return RedirectResponse
     */
    public function returnInput(): RedirectResponse
    {
        $inputs = [
            'lastname' => Session::get('lastname'),
            'firstname' => Session::get('firstname'),
            'gender' => Session::get('gender'),
            'email' => Session::get('email'),
            'zip11' => Session::get('zip11'),
            'addr11' => Session::get('addr11'),
            'building_name' => Session::get('building_name'),
            'opinion' => Session::get('opinion')
        ];
        return redirect()->route('create')->withInput($inputs);
    }

    public function complete()
    {
        return view('complete');
    }
}
