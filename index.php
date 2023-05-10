<?php 
require('config/config.php');
require('config/db.php');
//create a query 
$query = 'SELECT *FROM posts ORDER BY created_at DESC'; // arrangement 

//get result
$result = mysqli_query($conn,$query); 
// var_dump($result);

//fetch data 
$posts = mysqli_fetch_all($result , MYSQLI_ASSOC);
// var_dump($posts);

//free result

mysqli_free_result($result);

//clode the connection 
mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>



    <h1>POSTS</h1>
    
    <div class="container">

        
        <?php foreach($posts as $post): ?>
            <div class="well">
                <h3><?php echo $post['title']; ?></h3>
                <small>Created on <?php echo $post['created_at'] ?>at by 
                <?php echo $post['author']; ?></small>
                <p><?php echo $post['body']; ?></p>
                <!-- <?php echo $post['id'] ?> -->
                
 <a class="btn btn-primary" href="<?php echo ROOT_URL?>posts.php?id=<?php echo $post['id'] ?>">read more</a>
                <?php endforeach ; ?>
                
            </div>
        </div>


    
<?php include('inc/footer.php'); ?>
