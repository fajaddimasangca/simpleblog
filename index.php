<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse show" id="navbarColor01" style="">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Ako nalang (: <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pogi O Pogi?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Paano Maging POGI?</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Hirap ng papagiging POGI!</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


    <div id="wrapper" class="container">
<div class="alert alert-dismissible alert-warning" style="max-width: 20em">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 class="alert-heading">BABALA!</h4>
  <p class="mb-0">Ang blog na ito pay para sa mga POGI LAMANG!, <a href="#" class="alert-link">POGI PROBLEMS</a>.</p>
</div>


        <h1><center>Diary ng mga POGI</center></h1>
        <hr />



        <?php
            try {

                $stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
                while($row = $stmt->fetch()){
                    
                    echo '<div>';
                        echo '<h1><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h1>';
                        echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
                        echo '<p>'.$row['postDesc'].'</p>';                
                        echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';                
                    echo '</div>';

                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        ?>

    </div>


</body>
</html>