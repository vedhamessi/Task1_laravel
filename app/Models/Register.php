<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Register extends Model
{
    use HasFactory;
    public static function reg_insert($data){
        $arr=[
            "first_name"=>$data['first_name'],
            "middle_name"=>$data['middle_name'],
            "last_name"=>$data['last_name'],
            "course"=>$data['course'],
            "gender"=>$data['gender'],
            "email"=>$data['email'],
            "mobile"=>$data['mobile'],
            "call_code"=>$data['call_code'],
            "address"=>$data['address'],
            "password"=>$data['password'],
            "is_admin"=>isset($data['is_admin'])?$data['is_admin']:0,
            "status"=>isset($data['status'])?$data['status']:1,
            "request_data"=>$data['request_data'],
        ];
        $result = DB::table('pro_registration_records')->insert($arr);
        if($result){
            return $result;
        } else {
            return false;
        }
    }
    public static function check_existing_data($data){
        // dd($data);
        $result = DB::table('pro_registration_records')->where('email', $data['email'])->count();
        // $result->where('email',$data['email']);
        // $result->get('email')->exist();
        // print_r($result->get('email'));die('ss');
        if ($result > 0){
            return $arr = ['code' => 1, 'msg' => 'Already Exist'];
        }
        else{
            return $arr = ['code' => 0, 'msg' => 'Success'];
        }
    }
}
