<?php
require_once('db.php');
$response=array();
$videosid=$_GET['videosid'];
$sql="select * from videos" ;   
if (isset($_GET['videosid']) > 0) {
    if ($videosid >0) {
        $sql="select * from videos where id=".$videosid ; 
    }
}

if($con){
        $result=mysqli_query($con,$sql);
        if($result){
            header("Content-Type:JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['id']=$row['id'];
                $response[$i]['video_title']=$row['video_title'];
                $response[$i]['slug']=$row['slug'];
                $response[$i]['video_description']=$row['video_description'];
                $response[$i]['video_link']=$row['video_link'];
                $response[$i]['image']=$row['image'];
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