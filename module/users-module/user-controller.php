<?php

include "./user-model.php";
include "../database/database.php";

$Model = new Model();

$email = $_POST['email'];
$password = $_POST['password']; 
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$salary = $_POST['salary'];
$department = $_POST['department'];
$sex = $_POST['sex'];
$hobbit = $_POST['hobbit'];
$type = $_POST["type"];

switch($type) {
    case "user-register": 
        try {
            if(empty($email) || empty($password) || empty($first_name) || 
               empty($last_name) || empty($salary) || empty($department) || 
               empty($sex) || empty($hobbit)) {
                throw new Exception("Please fill in all required fields");
            }
            
            $result = $Model->_user_register($email, $password, $first_name, $last_name, $salary, $department, $sex, $hobbit);         
            echo json_encode([
                "status" => "success", 
                "message" => $result
            ]);
        } catch(Exception $e) {
            http_response_code(400);
            echo json_encode([
                "status" => "fail", 
                "message" => $e->getMessage()
            ]);
        }
    break;
    case "user-login":
        try{
            if(empty($email) || empty($password)){
                throw new Exception("Email and Password is required");
            }
            

        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;

}
?>