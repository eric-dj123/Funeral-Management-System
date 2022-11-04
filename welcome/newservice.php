<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit2'])) {
  $welcomename =$_POST['welcomename'];
  $price=$_POST['price'];
  $description=$_POST['description'];


  // images
$img_name = $_FILES['my_image']['name'];
$img_size = $_FILES['my_image']['size'];
$tmp_name = $_FILES['my_image']['tmp_name'];
$error = $_FILES['my_image']['error'];
$select_chech = mysqli_query($con, "SELECT * FROM welcome_tbl WHERE 	welcomename='$welcomename'");
// uplading Thumbnail
if ($img_size > 2250000) {
  echo '<script>alert("Sorry, your file is too large.")</script>';
}elseif (mysqli_num_rows($select_chech) > 0) {
  echo '<script>alert("service name is Already Exists Please Try Write Onother Service ....")</script>';
}else {
  $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
  $img_ex_lc = strtolower($img_ex);

  $allowed_exs = array("jpg", "jpeg", "png"); 

  if (in_array($img_ex_lc, $allowed_exs)) {
      $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
      $img_upload_path = 'postimages/'.$new_img_name;
      move_uploaded_file($tmp_name, $img_upload_path);
      $imageSize = getimagesize("$img_upload_path");
      if ($imageSi) {
        echo '<script>alert("file size is not contribute.")</script>';
      }else {
          
      // Insert into Database
      $status =1;
      $query=mysqli_query($con,"INSERT INTO `welcome_tbl`(`welcomename`, `price`, `description`, `photo`, `status`) 
      VALUES ('$welcomename','$price','$description','$new_img_name','$status')");

          if($query)
          {
            echo '<script>alert("New welcome Service is Created successfully ")</script>';
        
          }
          else{
            echo '<script>alert("Something went wrong . Please try again ")</script>';
 
          }
      }
  }else {
    echo '<script>alert("You cant upload files of this type ")</script>';
  
  }
}
// end of uplading Thumbanail

}
?>

<div class="card-body">
  <h4 class="card-title">Add Welcome Service Form </h4>
  <form class="forms-sample" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputName1">WelcomeName</label>
      <input type="text" name="welcomename" class="form-control" id="servicename" placeholder="Welcome Name" required>
    </div>
    <div class="form-group">
      <label for="exampleInputName1">Price</label>
      <input type="text" name="price" class="form-control" id="price" placeholder="Price" required>
    </div>
    <div class="form-group">
    <input type="file" name="my_image" class="form-control form-control-user"
                                id="exampleInputEmail">
                        </div>
    <div class="form-group">
      <label for="exampleTextarea1">Service Welcome Description</label>
      <textarea class="form-control" name="description" id="servicedes" rows="4" required></textarea>
    </div>
    <button type="submit" name="submit2" class="btn btn-primary btn-fw mr-2">Submit</button>
  </form>
</div>