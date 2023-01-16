<?php

include('connection.php');


if(isset($_POST['dept_catelist_save'])){
    $dept_category_id = $_POST['dept_category_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $section = $_POST['section'];

    $query = "INSERT INTO dept_cartegory_list(dept_category_id , couse_name, description, section) 
    VALUES(' $dept_category_id', '$name', '$description', '$section')";

    $query_run = mysqli_query($connection, $query);


    
if ($query_run){
    $_SESSION['success'] = "Dept Category List is Addess";
        header('Location: index.php');
}else{
        $_SESSION['status'] = "Dept Category-List Not Updated";
        header("Location: index.php");
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Study</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>

   
<div class="container">
  <h1>Course Departments</h1>
<form method="POST">
  <div class="mb-3">
    <?php

    $department = "SELECT * FROM dept_cartegory";
    $dept_run = mysqli_query($connection,  $department);

    if (mysqli_num_rows($dept_run) > 0)  {

        ?>
           <label class="form-label">Dept List Name</label>
    <select name="dept_category_id" id="" class="form-control" required>
        <option value="">Choose Your department Cartegory</option>
        <?php
                foreach($dept_run as $row) {

        ?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
        <?php
         }
        ?>

    </select>
  </div>

         <?php  

    }   
    else{

        echo "No Data Available";
    };


   
    
    ?>
 
  <div class="mb-3">
    <label class="form-label">Dept List Name</label>
    <input type="text" name='name'class="form-control" placeholder="Enter Description" required >
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <input type="text" name='description'class="form-control" placeholder="Enter Description" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Section</label>
    <input type="text" name='section' class="form-control" placeholder="Enter Description" required>
  </div>
  
  <button type="submit" name="dept_catelist_save" class="btn btn-primary">Submit</button>
</form>
  </div>
  </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>