<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scp CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
      <?php include "connection.php"; ?>
      <div>
          <ul class="nav navbar-dark bg-dark">
              
              <?php foreach($result as $link): ?>
                 <li class="nav-item active">
                 <a href="index.php?link=<?php echo $link['subject']; ?>" class="nav-link text-light"><?php echo $link['subject']; ?></a>
            </li> 
              <?php endforeach; ?>
              
            <li class="nav-item active">
                 <a href="create.php" class="nav-link text-light">Create a new Scp Subject</a>
            </li> 
          </ul>
      </div>
    <h1>Scp CRUD Application</h1>
    <div>
        <?php
        
        if(isset($_GET['link']))
    {
        $subject = $_GET['link'];
        //prepared statement
        $stmt = $connection->prepare("select*from scp where subject= ?");
        if(!$stmt)
        {
           echo"<p>Error in preparing SQL statement</p>";
           exit;
        }
        $stmt->bind_param("s",$subject);
        if($stmt->execute())
        {
            $result=$stmt->get_result();
            //check if a record has been retrieved 
            
            if($result->num_rows>0)
            {
               $array = array_map('htmlspecialchars',$result->fetch_assoc());
               echo"
               <div class='car card-body shadow mb-3'>
               <h2 class='card-title'>{$array['model']}</h2>
               <h4>{$array['subject']}</h4>
               <p><img src ='{$array['image']}' alt='{$array['model']}'</p>
               <p>{$array['description']}</p>
               </div>
               
               ";
            }
            else
            {
                echo"<p>No record found for model:{$array['model']}</p>";
            }
        }
        else
    {
        echo"<p>Error excuting the statement</p>";
    }
    }
        else
        {
            echo "
            <p>Welcome to this CRUD aplication.</p>
            <p><img src='images/pic2.jpg' alt='Scp CRUD Application class='img-fluid'></p>
            ";
        }
        
        
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>