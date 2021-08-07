<?php
require_once('db.php');
$response=array();
/*$photosid=$_GET['photosid'];
   
if (isset($_GET['photosid']) > 0) {
    if ($photosid >0) {
        $sql="select * from photos where id=".$photosid ; 
    }
}*/

$sql="select * from photos" ;

if($con){
        $result=mysqli_query($con,$sql);
    
        if($result){
            header("Content-Type:JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['id']=$row['id'];
                $response[$i]['photo_title']=$row['photo_title'];
                $response[$i]['slug']=$row['slug'];
                $response[$i]['photo_description']=$row['photo_description'];
                $response[$i]['image']=$row['image'];
                $response[$i]['status']=$row['status'];
                $response[$i]['created_at']=$row['created_at'];
                $response[$i]['updated_at']=$row['updated_at'];

                $i++;

                if(isset($_GET['limit']) && $_GET['limit']==$i)
                    break;

            }
            echo json_encode($response,JSON_PRETTY_PRINT);
        }    
    }
    else{
        echo"database connection fail";
    }

?>