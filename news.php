<?php
require_once('db.php');
$response=array();
/*$news_id=$_GET['newsid'];
$sql="select * from news" ;   
if (isset($_GET['newsid']) > 0) {
    if ($news_id >0) {
        $sql="select * from news where category_id=".$news_id ; 
        
    }
  
    
}*/

if(isset($_GET['id'])){
    $newsId = $_GET['id'];
    $sql = "select * from news where id=".$newsId;
}
else if(isset($_GET['category_id'])){
    $cat_id = $_GET['category_id'];
    $sql = "select * from news where category_id=".$cat_id;
}
else{
    $sql = "select * from news";
}


if($con){
        $result=mysqli_query($con,$sql);
        if($result){
            header("Content-Type:JSON");
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $response[$i]['id']=$row['id'];
                $response[$i]['category_id']=$row['category_id'];
                $response[$i]['subcategory_id']=$row['subcategory_id'];
                $response[$i]['country_id']=$row['country_id'];
                $response[$i]['division_id']=$row['division_id'];
                $response[$i]['district_id']=$row['district_id'];
                $response[$i]['news_title']=$row['news_title'];
                $response[$i]['slug']=$row['slug'];
                $response[$i]['description']=$row['description'];
                $response[$i]['default_image']=$row['default_image'];
                $response[$i]['video_id']=$row['video_id'];
                $response[$i]['seo_keyword']=$row['seo_keyword'];
                $response[$i]['seo_description']=$row['seo_description'];
                $response[$i]['mid_slider']=$row['mid_slider'];
                $response[$i]['popular_news']=$row['popular_news'];
                $response[$i]['status']=$row['status'];
                $response[$i]['news_view']=$row['news_view'];
                $response[$i]['created_by']=$row['created_by'];
                $response[$i]['updated_by']=$row['updated_by'];
                $response[$i]['deleted_by']=$row['deleted_by'];
                $response[$i]['restored_by']=$row['restored_by'];
                $response[$i]['created_at']=$row['created_at'];
                $response[$i]['updated_at']=$row['updated_at'];
                $response[$i]['deleted_at']=$row['deleted_at'];
                $i++;

            }
            echo json_encode($response,JSON_PRETTY_PRINT);
        }    
    }
    else{
        echo"database connection fail";
    }

?>