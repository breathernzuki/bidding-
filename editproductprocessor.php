<?php 
include'connection.php';

if(isset($_POST['edit_product'])){

    $id=$_POST['id'];
    $description=$_POST['description'];
   
    $item_name=$_POST['item_name'];
    
    $min_price=$_POST['min_price'];
    $max_price=$_POST['max_price'];

    $filename=$_FILES['picture']['name'];
    $filetmp=$_FILES['picture']['tmp_name'];
    
        $initialpicture=$_POST['initialpicture'];
        $path="items/";
        $fullpath=$path.$initialpicture;
    
    $photo_new_name= rand(10,11111).$filename;
        if(empty($filename)){
      $sql = "update items set item_name='$item_name',min_price='$min_price',max_price='$max_price',description='$description' where id='$id'";
      $sql_run = mysqli_query($conn,$sql);
            if ($sql_run){
                $_SESSION['status']="You have successfully updated the item";
                header("location:uploadproduct.php");
        }
    
    }
    else {
        $sql = "update items set item_name='$item_name',min_price='$min_price',max_price='$max_price',description='$description',photo='$photo_new_name' where id='$id'";
        $sql_run = mysqli_query($conn,$sql);
        if ($sql_run){
            unlink($fullpath);
            move_uploaded_file($filetmp,"items/".  $photo_new_name);
            $_SESSION['status']="You have successfully updated item";
            header("location:uploadproduct.php");
    }
    }
    
}
?>