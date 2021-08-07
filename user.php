<?php
require_once('db.php');
$response=array();    
$userid=$_GET['userid'];
$sql="select * from users" ;   
if (isset($_GET['userid']) > 0) {
    if ($userid >0) {
        $sql="select * from users where id=".$userid ; 
    }
}

if($con){
       
        $result=mysqli_query($con,$sql);
        if($result){
            header("Content-Type:JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['id']=$row['id'];
                $response[$i]['role']=$row['role'];
                $response[$i]['name']=$row['name'];
                $response[$i]['email']=$row['email'];
                $response[$i]['provider_id']=$row['provider_id'];
                $response[$i]['provider']=$row['provider'];
                $response[$i]['email_verified_at']=$row['email_verified_at'];
                $response[$i]['mobile']=$row['mobile'];
                $response[$i]['address']=$row['address'];
                $response[$i]['image']=$row['image'];
                $response[$i]['password']=$row['password'];
                $response[$i]['last_seen']=$row['last_seen'];
                $response[$i]['remember_token']=$row['remember_token'];
                $response[$i]['created_at']=$row['created_at'];
                $response[$i]['updated_at']=$row['updated_at'];
                $i++;

            }
            echo json_encode($response,JSON_PRETTY_PRINT);
        }    
    }
    else{
        echo"database connection fail";
    }

?>