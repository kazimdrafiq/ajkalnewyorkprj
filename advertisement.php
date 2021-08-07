<?php
require_once('db.php');
$response=array();       
$adsid=$_GET['adsid'];
$sql="select * from sponsered_ads" ;   
if (isset($_GET['adsid']) > 0) {
    if ($adsid >0) {
        $sql="select * from sponsered_ads where user_id=".$adsid ; 
    }
}

if($con){
        $result=mysqli_query($con,$sql);
        if($result){
            header("Content-Type:JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['id']=$row['id'];
                $response[$i]['user_id']=$row['user_id'];
                $response[$i]['payment_id']=$row['payment_id'];
                $response[$i]['ad_title']=$row['ad_title'];
                $response[$i]['ad_link']=$row['ad_link'];
                $response[$i]['ad_image']=$row['ad_image'];
                $response[$i]['ad_position']=$row['ad_position'];
                $response[$i]['exp_date']=$row['exp_date'];
                $response[$i]['status']=$row['status'];
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