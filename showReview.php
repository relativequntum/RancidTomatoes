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

mysqli_query($link,"SET NAMES utf8");

$movieTitle = $_GET['title'];

// echo $movieTitle;


$sql = "select * from Movies where  title = " . sqlPreprocess($movieTitle);

$nameMap = array(
      "title" => "title",
      "director" => 'director',
      "year" => "year",
      "rating" => 'rating',
      "length" => 'length',
      "box office" => 'boxOffice'
  );

if ($result=mysqli_query($link,$sql))
{
  $row=mysqli_fetch_assoc($result);

  // foreach ($row as $key => $value) {
  //  echo $key . ':' . $value . '<br>';
  // }

  echo "<table class='pure-table pure-table-bordered'>";

  foreach ($nameMap as $key => $value) {
    echo "<tr>";
    echo "<td>";
    echo  $key;
    echo "</td>";
    echo "<td>";
    if ($key == "length)"){
      echo " minutes";
    }
    echo  $row[$value];
    echo "</td>";

    echo "</tr>";
  }

  echo '</table>';

  // echo $row['rate'];

  // echo $row['Driver.carId'];
}// echo "good";





$sql = "select * from Reviews where  movieTitle = " . sqlPreprocess($movieTitle);

// echo $sql;

if ($result=mysqli_query($link,$sql))
  {

  while ($row=mysqli_fetch_assoc($result))
    {
    
      echo "<p>";

      echo $row['review'];

      echo "</p>";
     
     }
  
  mysqli_free_result($result);
}


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



