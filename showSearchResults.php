<!DOCTYPE html>
<html>
<head>

   

        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
   
        <title>Search Result</title>
   

  <meta charset="UTF-8">
</head>
<body>


   
  <?php
  
  $user = 'root';
$password = '';
$db = 'movie';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);

// echo $success;

mysqli_query($link,"SET NAMES utf8");

echo $_GET['title'];

 $sql = "select * from Movies where title like '%" . $_GET['title'] . "%'";

 if ($result=mysqli_query($link,$sql))
  {

  while ($row=mysqli_fetch_assoc($result))
    {
    
      echo "<p>";

      echo $row['title'];

      // echo  "<a href='showReview.php?title=i have a dream' class='pure-menu-link'> show review</a>";


      echo  "<a href=" . "'showReview.php?title=" .  $row['title'] . "'" . " class='pure-menu-link'> show review</a>";

      echo  "<a href=" . "'addReviewView.php?title=" .  $row['title'] . "'" . " class='pure-menu-link'> add review</a>";

      echo "</p>";
     
     }
  
  mysqli_free_result($result);
}


//  if ($result=mysqli_query($link,$sql))
//   {

//      echo "<table class='pure-table pure-table-bordered'>";


//   while ($row=mysqli_fetch_assoc($result))
//     {


//        echo "<tr>";
//     echo "<td>";
//     echo  $row['title'];
//     echo "</td>";
//     echo  "<a href=showReview.php?title=" .  $row['title'] . "class='pure-menu-link'> show review</a>";
//     echo "<td>";
   
//    echo "</tr>";
  
//   mysqli_free_result($result);
// }

// }





?>


</body>
</html>










