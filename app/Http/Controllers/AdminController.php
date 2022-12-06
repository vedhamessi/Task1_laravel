<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;
use Session;
use View;
// use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/login');
    }
    public function login_process(Request $request){
		$data = array();
        $validator=Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $data = array(
                'email' => $request->input('email'),
                'password' => md5($request->input('password')),
                'status' => 1,
				'is_admin' => 1
            );
            $checkLogin=Admin::getLog($data);
            // dd($checkLogin);
            $je = json_decode(json_encode ( $checkLogin ) , true);
            // print_r($je['is_admin']);die('cc');
            if(isset($je['is_admin']) == 1){
                Session::put('isUserLoggedIn', TRUE);
                Session::put('User_info', $checkLogin);
                return redirect('dashboard');
            }else{
                return back()->with('login_res','Wrong email or password, please try again.');
                $data['error_msg'] = 'Wrong email or password, please try again.';
            }
            return redirect('login');
        }
	}
    public function dashboard(Request $request){
		if(Session::get('isUserLoggedIn') == 1){
            return view('admin/dashboard');
		}else{
			return redirect('login');
		}
	}
    public function Users(Request $request){
		if(session('isUserLoggedIn') == 1){
			$data['result'] = Admin::getUsers();
            return \View::make("admin/user")->with('data',$data);
            // return Redirect::route('users')->with(['data'=> $data]);
		}else{
			return redirect('login');
		}
	}
    public function get_user_by_id(Request $request, $id){
        // print_r($id);die('zz');
		if(session('isUserLoggedIn') == 1){
			$data['result'] = Admin::getUserById($id);
            // print_r(is_array($data['result']));die('dddd');
            if (is_array($data['result']) == 1){
                return \View::make("admin/user_edit")->with('data',$data);
            } else {
                return \View::make("admin/user_edit")->with('data',$data);
            }
		}else{
			return redirect('login');
		}
	}
    public function edit_user_by_id(Request $request, $id){
        if(session('isUserLoggedIn') == 1){
            $validator=Validator::make($request->all(), [
                'first_name' => 'required',
                'middle_name' => 'required',
                'last_name' => 'required',
                'course' => 'required',
                'gender' => 'required',
                'email' => 'required|email',
                'mobile' => 'required',
                'call_code' => 'required',
                'address' => 'required',
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
                    'request_data' => json_encode($request->input())
                );
                $result=Admin::reg_update($data, $id);
                if ($result == 1) {
                    return back()->with('up_success','Record updated successful');
		        } else {
		        	return back()->with('up_error','Record updation Failed');
		        }
            }
        }
    }
    public function logout(Request $request){
        // print_r($request->session());die('ss');
        
        $request->session()->forget('isUserLoggedIn');
		Session::flush();
        return redirect('login');
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
