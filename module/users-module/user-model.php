<?php

require "../database/database.php";

class Model {

    function __construct(){
    }

    public function _user_register($email, $password, $first_name, $last_name, $salary, $department, $sex, $hobbit){
        try{
            $sql = "SELECT email FROM tb_users WHERE email = '$email'";
            $result = $GLOBALS["conn"]->query($sql);
            
            //print_r($result->num_rows);

            if($result->num_rows !== 0){
                throw new Exception("You cannot use this email");
            }
            $sql = "INSERT INTO tb_users (email, password, first_name, last_name, salary, department, sex, hobbit)
                VALUES ('$email', '$password', '$first_name', '$last_name', '$salary', '$department', '$sex', '$hobbit')
            " ;
            if(empty(mysqli_query($GLOBALS["conn"], $sql))){
                throw new Exception("Register fail");
            }
            //echo mysqli_query($GLOBALS["conn"], $sql);
            return array("email"=>$email, "password"=>$password, "status"=>"success");
        }catch(Exception $e){
            return array("status"=>"error", "message"=>$e->getMessage());
        }
    }

    public function _user_login($email, $password){
        $sql = "SELECT count(*) FROM tb_users WHERE email = '$email' AND password = '$password'";
        $result = $GLOBALS["conn"]->query($sql);

        echo $result;
    }
}
?>