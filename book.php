<?php
require_once "db.php";

// comes from new.php
if (isset($_POST['newTitle'])) {
    $sql = "INSERT INTO books (book_title, book_year, book_description, book_title_sort,  book_pages )
            VALUES (:book_title, :book_year, :book_description, :book_title_sort, :book_pages )";
    $stmt =$db->prepare($sql);
    $stmt->bindValue(":book_title", $_POST['newTitle'] );
    $stmt->bindValue(":book_year", $_POST['newPublished']);
    $stmt->bindValue(":book_description", $_POST['newDescription']);
    $stmt->bindValue(":book_title_sort", $_POST['newSortTitle']);
    $stmt->bindValue(":book_pages", $_POST['newPages']);
    $stmt->execute();

    $sql = "SELECT * FROM books ORDER BY book_id DESC";
    $stmt =$db->query($sql);
    $book = $stmt->fetch();
    $book_id = $book['book_id'];
    $quotes = false;
    
}

//comes from edit.php
if (isset($_POST['inputTitle'])) {
    $book_id = $_GET['book'];
    $sqlInsert = "UPDATE books
                    SET book_title =  :book_title, book_title_sort = :book_title_sort, book_year = :book_year, book_pages = :book_pages, book_description = :book_description
                    WHERE book_id = $book_id";
    
    $stmtInsert = $db->prepare($sqlInsert);
    $stmtInsert->bindValue(":book_title", $_POST['inputTitle']);
    $stmtInsert->bindValue(":book_title_sort", $_POST['inputSortTitle']);
    $stmtInsert->bindValue(":book_year", $_POST['inputPublished']);
    $stmtInsert->bindValue(":book_pages", $_POST['inputPages']);
    $stmtInsert->bindValue(":book_description", $_POST['inputDescription']);
    $stmtInsert->execute();
}

// come from tha index.php or edit.php
if (isset($_GET['book'])) {
    $book_id = $_GET['book'];
    $sql = "Select * from quotes where book_id =" . $book_id;
    $stmt = $db->query($sql);


    if ($stmt->fetch() ) {
        $sql = "SELECT book_title, book_image, book_description, book_year, book_pages, quote
        FROM books
        INNER JOIN quotes
        ON books.book_id = quotes.book_id
        WHERE books.book_id = $book_id";
        $stmt = $db->query($sql);
        $quotes = true;
    } else {
        $sql = "SELECT *
            FROM books
            WHERE book_id = $book_id";
        $stmt = $db->query($sql);
        $quotes = false;
    }
    $book = $stmt->fetch();
     

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

     <link rel="stylesheet" href="./style.css">
     <title>Document</title>
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

        <?php  ?>

        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="display-4"><?php echo $book['book_title'];?></h1>
            </div>
        </div>

        <div class="row mb-3">
            <?php if ($book['book_image']) {?>
            
            <div class=" col-6 mb-3">
                    <img src=".\book-covers\<?php echo $book['book_image']; ?>" class="img-fluid w-75 float-right">
            </div>
            <?php 
                } else { ?>
                    <div class="col-2"></div>
                    <div class="col-4 mb-3 bg-primary" >
                            <div class="text-white display-3 " style="width: 350px; height:500px;"> <?php echo $book['book_title']; ?></div>
                    </div>
                    
                
                <?php
                }
                ?>
            <div class="col-6">
                <div class="row">
                    <div class="col-10">
                        <h3>About the book</h3>
                    </div>
                    <div class="col-2">
                        <a href=".\edit.php?book=<?php echo $book_id;?>">
                            <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.424 12.282l4.402 4.399-5.826 1.319 1.424-5.718zm15.576-6.748l-9.689 9.804-4.536-4.536 9.689-9.802 4.536 4.534zm-6 8.916v6.55h-16v-12h6.743l1.978-2h-10.721v16h20v-10.573l-2 2.023z"/></svg>
                        </a>
                    </div>
                </div>

                
                <div class="text-muted"><?php echo $book['book_description']; ?></div>
                <div class="row my-3">
                    <div class="col-6">Published: <span class="text-muted"><?php echo $book['book_year']; ?></span></div>
                    <div class="col-6">Pages: <span class="text-muted"><?php echo $book['book_pages']; ?></span></div>
                </div>
                
                <h3>Book Quotes</h3>
                <?php 
                if ($quotes) { ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-muted"><?php echo $book['quote']; ?></li>
                        <?php while ($book = $stmt->fetch()) { ?>
                            <li class="list-group-item text-muted"><?php echo $book['quote']; ?></li>
                        <?php } ?>
                    </ul>
                <?php 
                } else { ?>
                <div class="text-muted"><em>No quotes found</em> </div>
                <?php 
                } ?>
            </div>

        </div>
        
                  
        
        




     </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </body>
 </html>