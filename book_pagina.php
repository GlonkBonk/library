<link rel="stylesheet" href="style_opfris.css">
<?php
 include_once('include/db_connect.php');
 include_once('include/books.php');

$book = new Book;

$bs= $_GET['borrow'];
$id = $_GET['id'] ;
if($bs == 1){
    $bs = 0;
} else { 
    $bs = 1; 
}
if 
(isset($_POST['submit']) && $_POST['submit'] != '')
{
    $liqry = $pdo->prepare("UPDATE `books` SET `borrow` = ? WHERE book_id= ? ");
$liqry->bindValue(1, $bs, pdo::PARAM_INT);
$liqry->bindValue(2, $id, pdo::PARAM_INT);
$liqry->execute();
// $liqry->close();
echo "test";
}

echo $bs;
echo $id;
if (isset($_GET['id'])) {
    $id = $_GET ['id'];
    $data = $book->fetch_data($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_opfris.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <title><?php echo $data ['title'];?>lenen</title>
</head>
<body>
    <header>
      
    </header>
   
    <div class="container">
    <a id="link" href="index_opfris.php">ga terug naar de hoofdpagina</a> 
    <h2 class="dataText"><?php echo $data ['book_id'] . " - ". $data ['title'] ;?></h2>
    <h2 class="dataText">Auteur: <?php echo $data ['author'];?></h2>
    <h2 class="dataText">Isbn: <?php echo $data ['isbn13'];?></h2>
    <h2 class="dataText">Format: <?php echo $data ['format'];?></h2>
    <h2 class="dataText">Uitgeverij: <?php echo $data ['publisher'];?></h2>
    <h2 class="dataText">Aantal pagina's: <?php echo $data ['pages'];?></h2>
    <h2 class="dataText">Afmeting: <?php echo $data ['dimensions'];?></h2>
    <h2 class="dataText">Beschrijving: <?php echo $data ['overview'];?></h2>
    <h2  class="dataText">uitgeleend: <?php echo $data ['borrow'];?></h2>
   
<form action="" method="POST"> 
    <input type="hidden" value="hidden">
    <input id="button" type='submit' name='submit' value="borrow/return">
</form> 
    

    </div>
</body>
</html>

<?php
} else {
    header('Location: index_opfris.php');
    exit();
}
?>