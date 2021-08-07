<?php

header('Content-Type: application/json');
$method=$_SERVER['REQUEST_METHOD'];

switch($method){
    case'POST':
        $data=json_decode(file_get_contents('php://input'),true);
        userPost($data);
        break;

    /*case'GET':
            $data=json_encode(file_get_contents('php://input'),true);
            userGet($data);
            break;*/

}
/*function userGet($data){
    include ('db.php');
    $sql="SELECT * FROM users";
    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)){
        $row=array();
        while($r=mysqli_fetch_assoc($result)){
            $rows["result"][]=$r;
        }
        echo json_encode($rows);
    }
    else{
        echo '{"result":"sql error"}';
    }
}*/


function userPost($data){
    include ('db.php');
    $role=$data["role"];
    $name=$data["name"];
    $email=$data["email"];
    $provider_id=$data["provider_id"];
    $provider=$data["provider"];
    $email_verified_at=$data["email_verified_at"];
    $mobile=$data["mobile"];
    $address=$data["address"];
    $image=$data["image"];
    $password=$data["password"];
    $last_seen=$data["last_seen"];
    $remember_token=$data["remember_token"];
    
    $sql="INSERT INTO users(role, name, email, provider_id ,provider, email_verified_at, mobile, address, image, password, last_seen, remember_token)
    VALUES('$role','$name','$email','$provider_id','$provider','$email_verified_at','$mobile','$address','$image','$password','$last_seen','$remember_token')";
    if(mysqli_query($con,$sql)){
        echo '{"result":"success"}';
    }else{
        echo '{"result":"sql error"}';

    }
}

?>