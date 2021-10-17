<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ContactsController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function confirm(Request $request)
    {   
        $request-> validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'zip11'=> 'required|min:8',
            'addr11' => 'required',
            'opinion' => 'required|max:120',
        ]);
        
        $inputs = $request->all();
        $request->session()->put('lastname', 'firstname', 'gender', 'email', 'zip11', 'addr11', 'building_name', 'opinion');
        // dd($inputs);でデータ取得確認済み

        $request->session()->put('key', 'value');
        $request->session()->put('lastname', 'firstname', 'gender', 'email', 'zip11', 'addr11', 'building_name', 'opinion');

        Session::put('lastname', $inputs['lastname']);
        Session::put('firstname', $inputs['firstname']);
        Session::put('gender', $inputs['gender']);
        Session::put('email', $inputs['email']);
        Session::put('zip11', $inputs['zip11']);
        Session::put('addr11', $inputs['addr11']);
        Session::put('building_name', $inputs['building_name']);
        Session::put('opinion', $inputs['opinion']);

        return view('confirm',['inputs' => $inputs]);

    }
    public function process(Request $request)
    {
        $inputs = $request->except('action');
            
            Contact::insert([
            'fullname' => $inputs['lastname'] .= $inputs['firstname'],
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
    public function retunInput(): RedirectResponse
    {
        $inputs = [
            'lastname' => Session::pull('lastname'),
            'firstname' => Session::pull('firstname'),
            'gender' => Session::pull('gender'),
            'email' => Session::pull('email'),
            'zip11' => Session::pull('zip11'),
            'addr11' => Session::pull('addr11'),
            'building_name' => Session::pull('building_name'),
            'opinion' => Session::pull('opinion')
        ];
        
        return redirect()->route('create') -> withInput($inputs);
    }
    public function complete()
    {
        return view('complete');
    }
    // public function index(Request $request)
    // {
        
    //     return view ('search');
    // }
    public function search(Request $request)
    {
        $query = Contact::query();

        $fullname = $request->input('fullname');
        $email = $request->input('email');

        if(!empty($fullname)) {
            $query->where('fullname', 'like', '%'.$fullname.'%');
        }
        if (!empty($email)) {
            $query->where('email', 'like', '%' . $email . '%');
        }

        if($request->has('fullname')) {
            $query->where('fullname', 'like', '%' . $request->get('fullname') . '%');
        }

        foreach ($request->only(['fullname', 'email']) as $key => $value) {
            $query->where($key, 'like', '%' . $value . '%');
        }

        $items = $query->get();

        return view('search', compact('items','fullname','email'));
        // ->with(['fullname' => $fullname, 'email' => $email]);
    }

}
