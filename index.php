<?php
require_once "db.php";

if (isset($_POST['deleteBook'])) {
    $book2delete = $_POST['deleteBook'];

    $sqlDeleteQuotes = "DELETE FROM quotes
                        WHERE book_id = $book2delete";
    $sqlDeleteBook = "DELETE FROM books
                WHERE book_id = $book2delete
                LIMIT 1";

    //var_dump($db->exec($sqlDelete));
    $db->exec($sqlDeleteQuotes);
    $db->exec($sqlDeleteBook);
}
//VALUES (:newBook)";
//    $stmt = $db->prepare($sql);
//    $stmt->bindValue(":newBook", "'" . $_POST['newTitle'] . "','" . $_POST['newSortTitle'] . "'," . $_POST['newPublished'] . "," . $_POST['newPages'] . ",'" . $_POST['newDescription'] . "'" );
//    var_dump($stmt->execute());


//    var_dump($stmt);

if (isset($_GET['search'])) {
    $sql = "SELECT *
            FROM books
            WHERE book_title LIKE :book_title";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":book_title", "%" . $_GET['search'] . "%");
    $stmt->execute();

} else {
    $sql = "SELECT * FROM books";
    $stmt = $db->query($sql);
    //$books = $result->fetchAll();       used in 'for' loop
}
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     
     <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
     <title>Document</title>
     <link rel="stylesheet" href="style.css">
 </head>
 <body class="bg-warning">
     <div class="container bg-white">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="display-1 text-warning" style="font-family: 'Gloria Hallelujah', cursive;">Seussology</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <a href=".\index.php" >
                   <h2 class="text-success" style="font-family: 'Gloria Hallelujah', cursive;" > Home </h2>
                </a>
            </div>
            <div class="col-6 text-right">
                <a href=".\new.php">
                <h2 class="text-success " style="font-family: 'Gloria Hallelujah', cursive;"> New book </h2>
                </a>
            </div>
        </div>
            <form class="form-inline d-flex justify-content-center">    
               <input class="form-control form-control-lg col-3" type="text" name="search" placeholder="Search books titles..." <?php if (isset($_GET['search'])) {?> value="<?php echo $_GET['search']; ?>" <?php } ?> >
                <button type="submit" class="btn btn-primary btn-lg ml-2">Search</button>
            </form>
        
            <div class="books">
                <?php while ($book = $stmt->fetch()) : 
                    if ($book['book_image']) {?>
                <div class="book">
                    <a href=".\book.php?book=<?php echo $book['book_id'];?>">
                        <img src=".\book-covers\<?php echo $book['book_image']; ?>" class="book-image">
                    </a>
                </div>
                <?php 
                    } else { ?>
                        <div class="book bg-primary m-3" style="width:95%">
                            <a href=".\book.php?book=<?php echo $book['book_id'];?>">
                                <div class="text-white display-3" style="height:450px;"> <?php echo $book['book_title']; ?></div>
                            </a>
                        </div>
                    
                    <?php
                    }
            endwhile;?>
                </div>
     </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </body>
 </html>