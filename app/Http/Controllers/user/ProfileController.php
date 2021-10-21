<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.profile');
    }


    public function changePassword(){

        return view('users.changepassword');
    }


    public function changePasswordStore(StorePasswordRequest $request){


        $password=$request->validated()['newpassword'];

        $user=auth()->user();

        $user->password=Hash::make($password);

        $user->save();

        return back()->with('message','پسورد شما با موفقیت تغییر یافت.');

    }

    public function updatePostalCode(Request $request){

        $user=auth()->user();
        $postal=$request->validate(['postal_code' => 'required|regex:/^\d{10}$/']);
        $user->postal_Code=$postal['postal_code'];
        $user->save();

        return back();
    }

    public function updateAddress(Request $request){

        $user=auth()->user();
        $address=$request->validate([
            'province' => 'required',
            'address' => 'required']);

        $user->address=" استان ".$address['province'].",".$address['address'];
        $user->save();

        return back();

    }

    public function editAddress()
    {
        \Illuminate\Support\Facades\Session::flash('editAddress','true');

        return back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
