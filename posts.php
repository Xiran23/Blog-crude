<?php 
require('config/config.php');
require('config/db.php');
//get id 

if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
    $title = $_POST['title'];
    $author = $_POST['author']; 
    $body   = $_POST['body'];
   
    $query = "DELETE FROM posts WHERE id = {$delete_id}";
    
  
    
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
echo "added"


?>
<?php include('inc/header.php'); ?>





    <div class="container">
        <a class="btn btn-primary" href="<?php echo ROOT_URL ?>">BACK</a>

        
        
        <h1><?php echo $post['title']; ?></h1>
            <div class="well">
                <small>Created on <?php echo $post['created_at'] ?>at by 
                <?php echo $post['author']; ?></small>
                <p><?php echo $post['body']; ?></p>

                <hr>

                <form class="pull-right" method= "POST" action= "<?php echo $_SERVER['PHP_SELF']; ?> ">

                <input type = "hidden" name = "delete_id"  value="<?php echo $post['id']; ?>" >
                
                <input type= "submit" name = "delete" value="Delete" class="btn btn-danger">


                </form>
                
                <a class="btn btn-primary"href="<?php echo ROOT_URL;?>editpost.php?id=<?php echo $post['id']; ?>">
            Edit</a>
             

                
            </div>
        </div>


    
        <?php include('inc/footer.php'); ?>
