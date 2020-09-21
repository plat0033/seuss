<?php
require_once "db.php";




if (isset($_GET['book'])) {
    $book_id = $_GET['book'];
     $sql = "SELECT *
            FROM books
            WHERE book_id = $book_id";
    $stmt = $db->query($sql);  
    

} else {
    echo "error";
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
        
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="display-4">Edit Book</h1>
            </div>
        </div>

        <?php $book = $stmt->fetch(); ?>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="row px-3">
                    <div class="col-9"></div>
                    <div class="col-3">
                        <form action=".\index.php" method="post"> 
                            <input type="hidden" name="deleteBook" value="<?php echo $book['book_id']; ?>">
                            <button type="submit" class="btn btn-danger float-right" >Delete Book</button>
                        </form>
                    </div>
                </div>
                
                <div class="row bg-warning rounded p-3 my-3">
                    <div class="col-12">
                    <form action=".\book.php?book=<?php echo $book['book_id'];?>" method="post">
                        <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input type="text" class="form-control" name="inputTitle" value="<?php echo $book['book_title']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="inputSortTitle">Sort Title</label>
                            <input type="text" class="form-control" name="inputSortTitle" value="<?php echo $book['book_title_sort']; ?> " required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputPublished">Published Year</label>
                            <input type="number" class="form-control" name="inputPublished" value="<?php echo $book['book_year']; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputPages">Pages</label>
                            <input type="number" class="form-control" name="inputPages" value="<?php echo $book['book_pages']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Book Description</label>
                            <textarea class="form-control" name="inputDescription" rows="4" required><?php echo $book['book_description']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        
                  
        
        




     </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </body>
 </html>