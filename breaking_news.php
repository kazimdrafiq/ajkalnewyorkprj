<?php
require_once('db.php');
$response=array();   
$newsid=$_GET['newsid'];
$sql="select * from breaking_news" ;   
if (isset($_GET['news_id']) > 0) {
    if ($newsid >0) {
        $sql="select * from breaking_news where news_id=".$newsid ; 
    }
}

if($con){
    $response=array();   
        $result=mysqli_query($con,$sql);
        if($result){
            header("Content-Type:JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['id']=$row['id'];
                $response[$i]['news_id']=$row['news_id'];
                $response[$i]['bnews_title']=$row['bnews_title'];
                $response[$i]['status']=$row['status'];
                $response[$i]['deleted_at']=$row['deleted_at'];
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