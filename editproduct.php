<?php
include 'connection.php';
if(isset($_POST['edit'])){
    $id=$_POST['idno'];
    }
include 'connection.php';
$items="select * from items where id = '$id'";
$itemsrun=mysqli_query($conn,$items);

$eachitem=mysqli_fetch_all($itemsrun,MYSQLI_ASSOC);
foreach ($eachitem as $item){
    
    $id=$item["id"];
    $item_name=$item["item_name"];
    $min_price=$item["min_price"];
    $max_price=$item["max_price"];
    $image=$item["photo"];
    $description=$item["description"];

}
   
    

// if(isset($_POST['delete_food'])){
//     $id=$_POST['id'];
//     $delete="delete from items where id='$id'";
//     $deleterun=mysqli_query($conn,$delete);
//     if($deleterun){
//         session_start();
//         $_SESSION['food']='You have been deleted the food successfully';
//         header("Location:view_food.php");
//     }

// }
?>
<div class="item">
    <form class="form border-2-primary" id="form" action="editproductprocessor.php" method="post" enctype="multipart/form-data">
        <h5 id="head">Upload Items For Bidding</h5>
        <div class="upload-items">
            <input type="number" hidden="" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="">Animal Name</label><br>
                <select  class="form-control" id="item_name"  name="item_name" id="">
                <option value="<?php echo $item_name ?>"> <?php echo $item_name;?></option>
                <option value="sheep">Sheep</option>
                <option value="goat">Goat</option>
                <option value="cow">Cow</option>
                <option value="donkey">Donkey</option>
            </select>
                    </div>
            <br>
            <div class="form-group>
            <label for="">Minimum price</label><br>
            <input type="number" id="min_price" name="min_price" id="" value="<?php echo $min_price; ?>" placeholder="Enter manimum price"><br>
        </div><br>
        <div class="form-group">
            <label for="">Maximum price</label><br>
            <input type="number" id="max_price" name="max_price"  value="<?php echo $max_price?>" id="" placeholder="Enter maximum price">
        </div><br>
        <div class="form-group">
            <label for="">Description</label><br>
            <textarea name="description" id="" cols="30" rows="10">
              <?php echo $description ?>
            </textarea>
          
        </div>
        <div class="form-group">
            <label for="">Old Picture</label><br>
            <input id="picture" type="text" hidden name="initialpicture" value="<?php echo $image ?>">

            <img src="items/<?php echo $image ?>" width="200" height="200" alt="">
        </div>
        <div class="form-group">
            <label for="">change Picture</label><br>
            <input id="picture" type="file" name="picture" id="">
        </div>
        <div class="form-group mt-2">
            <input type="submit" id="submit" class="btn btn-primary form-control" name="edit_product" value="Update Product">
        </div>
</div>
</form>

</div>
