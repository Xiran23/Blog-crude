<?php 
require('config/config.php');
require('config/db.php');

//check for submit 

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $author = $_POST['author']; 
    $body   = $_POST['body'];
   
    $query = "INSERT INTO posts (title ,author ,body) values ('$title','$author','$body')";
    
    if(mysqli_query($conn,$query)){
        header('Location: '.ROOT_URL.'');
    
    }
    else { 
        echo 'error'.mysqli_error($conn);
    }
}

?>

<?php include('inc/header.php'); ?>




<div class="container">
  <a href="/">back</a>
        <h1>ADD _ POST</h1>

      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
      <div class="form-group">
        <label >Title</label>
        <input type="text" name="title" class="form-control">

      </div>

      <div class="form-group">
        <label >Author</label>
        <input type="text" name="author" class="form-control">

      </div>
      <div class="form-group">
        <label >Body </label>

        <textarea name="body" class="form-control"></textarea>
        

      </div>
      <br>
      <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </div>
       


    
<?php include('inc/footer.php'); ?>
