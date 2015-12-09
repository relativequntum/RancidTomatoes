<!DOCTYPE html>
<html>
<head>

   

        <link href="movie.css" type="text/css" rel="stylesheet" />
   
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


// $user = 'root';
// $password = 'root';
// $db = 'movie';
// $host = 'localhost';
// $port = 8889;

// $link = mysqli_init();
// $success = mysqli_real_connect(
//    $link, 
//    $host, 
//    $user, 
//    $password, 
//    $db,
//    $port
// );

// // echo $success;

// mysqli_query($link,"SET NAMES utf8");


    $title = $_POST['title'];

    $director = $_POST['director'];

    $rating = $_POST['rating'];

    $year = $_POST['year'];

    $length = $_POST['length'];

    $boxOffice = $_POST['boxOffice'];

    $sql = "INSERT INTO Movies  (`movieId`, `title`, `director`, `year`, `rating`, `length`, `boxOffice`) VALUES (". "1, ".
         sqlPreprocess($title) . ", " .
         sqlPreprocess($director) . ", " .
         sqlPreprocess($year)  . ", " .
          sqlPreprocess($rating). ", " .
           sqlPreprocess($length) . ", " .
            sqlPreprocess($boxOffice) .
         ")";

    $result = mysqli_query($link,$sql);

    echo $result;

     echo '<script type="text/javascript">
           window.location = "index.html"</script>';



function sqlPreprocess($origin)
{

    if(get_magic_quotes_gpc()) 
    {
        $origin = stripslashes($origin);
    }

    $origin = "'" . mysql_real_escape_string($origin) . "'";

    return($origin);
} 

 
?>

  </tbody>

  </table>

</body>
</html>










