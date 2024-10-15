<?php

class AuthModel extends CI_Model
{
    public function check_login_old($mobileno,$password){

        $username = [9619445461,8104241208];
        //$result = $this->db->where(['username' => $mobileno, 'status'=> 'Active'])->get('users')->result_array();
        // if(count($result) == 1){
        //     if (!password_verify($password, $result[0]['password'])) {
        //         return 0;
        //     }
        //     if ($result[0]['status'] == 1) {
        //         return $result[0];
        //     } else {
        //         return 2;
        //     }
        // }
        if(in_array($mobileno,$username)){
            //if password not verified, return 0;
            //if (!password_verify($password, 'smartwiremen')) {
            if ($password == 'smartwiremen') {
                return 1;
            }else{
                return 0;
            }

            //if user is inactive, return 01
            // if ($result[0]['status'] == 'Inactive') {
            //     return 01;
            // } 

            // if every thing is match, return success login
            // if ($result[0]['status'] == 'Active') {
            //     return $result[0];
            // } 
        }else{
            return 2;
        }
    }

    public function check_login($email_id,$password){
        $result = $this->db->where(['email'=>$email_id])->get('userinsidesales_tbl')->result_array();
        // if(count($result) == 1){
        //     if (!password_verify($password, $result[0]['password'])) {
        //         return 0;
        //     }
        //     if ($result[0]['status'] == 1) {
        //         return $result[0];
        //     } else {
        //         return 2;
        //     }
        // }
        if(count($result) == 1){
            //if password not verified, return 0;
            //if (!password_verify($password, $result[0]['password'])) {
            if ($password != $result[0]['password']) {
                return 0;
            }

            //if user is inactive, return 01
            if ($result[0]['status'] == 0) {
                return 01;
            } 

            // if every thing is match, return success login
            if ($result[0]['status'] == 1) {
                return $result[0];
            } 
        }else{
            return 2;
        }
    }
}