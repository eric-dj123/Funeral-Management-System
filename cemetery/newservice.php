<?php
include 'includes/config.php';
$error = "";
$msg = "";

if (isset($_POST['submit2'])) {
    $cemeteryname=mysqli_real_escape_string($con,trim($_POST['cemeteryname']));
    $price=mysqli_real_escape_string($con,trim($_POST['price']));
    $category=mysqli_real_escape_string($con,trim($_POST['category']));
    $description=mysqli_real_escape_string($con,trim($_POST['description']));
   

if(mysqli_num_rows($select_chech)==0) { 
  
    $status=0;
    $insert=mysqli_query($con,"INSERT INTO `cemetery_tbl`(`cemeteryname`, `price`, `category`, `description`, `status`) 
    VALUES ('$cemeteryname','$price','$category','$description','$status')");
    if ($insert) {
        
        echo "<script>
        alert('New cemetery  is  created Successfully');document.location ='manage_service.php';
        </script>";
    }else {
        echo "<script>
        alert('New cemetery  is not  created Successfully');document.location ='manage_service.php';
        </script>";
    }
}else {
    echo "<script>
    alert('cemetery is already exists please check');document.location ='manage_service.php';
    </script>";
}
}
?>

<div class="card-body">
  <h4 class="card-title">Add Cemetery Form </h4>
  <form class="forms-sample" method="post">
    <div class="form-group">
      <label for="exampleInputName1">Cemeteryname Name</label>
      <input type="text" name="cemeteryname" class="form-control" id="servicename" placeholder="Cemeteryname " required>
    </div>
    <div class="form-group">
      <label for="exampleInputName1">Price</label>
      <input type="text" name="price" class="form-control" id="servicename" placeholder="price" required>
    </div>
    <div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Category</label>
													<select type="text" class="form-control" name="category" required="true">
														<option value="">Select Cemetery Category Part</option>
														<option value="First Category">First Category</option>
														<option value="Second Category">Second Category</option>
											
													</select>
												</div>
											</div>
    <div class="form-group">
      <label for="exampleTextarea1">Cemetery Description</label>
      <textarea class="form-control" name="description" id="servicedes" rows="4" required></textarea>
    </div>
    <button type="submit" name="submit2" class="btn btn-primary btn-fw mr-2">Submit</button>
  </form>
</div>