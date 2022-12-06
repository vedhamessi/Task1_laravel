<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Register;
use Session;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register/register');
    }
    public function customer_registration(Request $request){
        $validator=Validator::make($request->all(), [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'course' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'address' => 'required',
            'password' => 'required|required_with:password2|same:password2',
            'password2' => 'required',
        ]);
        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $data = array(
                'first_name' => $request->input('first_name'),
                'middle_name' => $request->input('middle_name'),
                'last_name' => $request->input('last_name'),
                'course' => $request->input('course'),
                'gender' => $request->input('gender'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'call_code' => $request->input('call_code'),
                'address' => $request->input('address'),
                'password' => md5($request->input('password')),
                'request_data' => json_encode($request->input())
            );
            $result=Register::reg_insert($data);
            if($result){
                return back()->with('reg_success','Record created successful');
            } else {
                return back()->with('reg_error','Registration Failed');

            }
        }
    }
    public function checkEmail(Request $request){
		$arr = array(
			'email' => $request->input('email')
		);
        // dd($arr);
		$result = Register::check_existing_data($arr); 
		echo json_encode($result);
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
