
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
                <h1 class="display-4">New Book</h1>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3"></div>
            <div class="col-6 mb-3">
                <form action=".\book.php" method="post">
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input type="text" class="form-control" name="newTitle" required>
                    </div>
                    <div class="form-group">
                        <label for="inputSortTitle">Sort Title</label>
                        <input type="text" class="form-control" name="newSortTitle" value=" ">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputPublished">Published Year</label>
                        <input type="number" class="form-control" name="newPublished" placeholder="YYYY" required >
                        </div>
                        <div class="form-group col-md-6">
                        <label for="inputPages">Pages</label>
                        <input type="number" class="form-control" name="newPages" value="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Book Description</label>
                        <textarea class="form-control" name="newDescription" rows="4" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save Book</button>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
        
                  
        
        




     </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </body>
 </html>