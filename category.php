<?php
require_once('db.php');
$response=array();
$catid=$_GET['catid'];
$sql="select * from categories" ;   
if (isset($_GET['catid']) > 0) {
    if ($catid >0) {
        $sql="select * from categories where id=".$catid ; 
    }
}

if($con){
        $result=mysqli_query($con,$sql);
        if($result){
            header("Content-Type:JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['id']=$row['id'];
                $response[$i]['category_name']=$row['category_name'];
                $response[$i]['category_logo']=$row['category_logo'];
                $response[$i]['slug']=$row['slug'];
                $response[$i]['home_status']=$row['home_status'];
                $response[$i]['mid_slider']=$row['mid_slider'];
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