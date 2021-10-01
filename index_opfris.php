<?php
 include_once('include/db_connect.php');
 include_once('include/books.php');

 $book = new Book;
 $books = $book->fetch_all();

 $borrowbook = new Book; 
 $borrowbooks = $borrowbook->fetch_borrow();

//  print_r($books);
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
    <title>bibie</title>
</head>
<body>
    <header>
  
    </header>
    <div class="container">
        <h3>de uitgelenden boeken staan onderaan op de pagina </h3>
        <span>beschikbare boeken</span>
    <ol>
        <?php foreach ($books as $book) {?>
        <li>
      
            <a href="book_pagina.php?id=<?php echo $book['book_id']?>&borrow=0">
            <?php echo $book['title']?>
            </a>
        </li>
      
        <?php }?>
    </ol>


    </div>
<br> <br>
    <div class="borrowcontainer">
        <span>uitgeleende boeken</span>
    <ol>
        <?php foreach ($borrowbooks as $borrowbook) {?>
        <li>
       
            <a href="book_pagina.php?id=<?php echo $borrowbook['book_id']?>&borrow=1">
            <?php echo $borrowbook['title']?>
            </a>
            
        </li>
        <?php }?>
    </ol>
</body>
</html>