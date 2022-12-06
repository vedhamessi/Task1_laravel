<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Admin extends Model
{
    use HasFactory;

    public static function getLog($data){
        $email = $data['email'];
        $password = $data['password'];
        $status = $data['status'];
        $is_admin = $data['is_admin'];
        
        $result = DB::table('pro_registration_records')
        ->where('email', $email)
        ->where('password', $password)
        ->where('status', $status)
        ->where('is_admin', $is_admin)
        ->get()->first();

        return $result;
    }
    public static function getUsers(){        
        $result = DB::table('pro_registration_records')
        ->get()
        ->toArray();
        return $result;
    }
    public static function getUserById($id){        
        $result = DB::table('pro_registration_records')
        ->where('id', $id)
        ->get()
        ->first();
        return $result;
    }
    public static function reg_update($data, $id){
        $result = DB::table('pro_registration_records')
        ->where('id', $id)
        ->update($data);
        return $result;
    }
}
