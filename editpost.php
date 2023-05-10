<?php 
require('config/config.php');
require('config/db.php');

//check for submit 

if(isset($_POST['submit'])){
    $update_id = $_POST['update_id'];
    $title = $_POST['title'];
    $author = $_POST['author']; 
    $body   = $_POST['body'];
   
    $query = "UPDATE posts SET
    title = '$title',
    author = '$author',
    body  = '$body'
    WHERE id= {$update_id}";
    
  
    
    if(mysqli_query($conn,$query)){
        header('Location: '.ROOT_URL.'');
    
    }
    else { 
        echo 'error'.mysqli_error($conn);
    }
}
$id = ($_GET['id']);

//create a query 
$query = 'SELECT *FROM posts WHERE id= '.$id ; 

//get result
$result = mysqli_query($conn,$query); 
// var_dump($result);

//fetch data 
$post = mysqli_fetch_assoc($result);
// var_dump($posts);

//free result

mysqli_free_result($result);

//clode the connection 
mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>




<div class="container">
        <h1>EDIT_ POST</h1>

      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
      <div class="form-group">
        <label >Title</label>
        <input type="text" name="title" class="form-control" value= "<?php echo $post['title'] ?>">

      </div>

      <div class="form-group">
        <label >Author</label>
        <input type="text" name="author" class="form-control"
        value="<?php echo $post['author'] ?>">

      </div>
      <div class="form-group">
        <label >Body </label>

        <textarea class="form-control" name="body"  value="<?php echo $post['body'] ?>"class="form-control">
    </textarea>
        

      </div>
      <br>
      <input type="hidden" name="update_id" value="<?php echo $post['id'];?>">
      <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </div>
       


    
<?php include('inc/footer.php'); ?>
