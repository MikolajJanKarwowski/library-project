<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu">
        <ul class="ul-menu">
            <li class="li-op"><a href="create.html">Create books</a> </li>
            <li class="li-op"><a href="index.html">Search books</a></li>
            <li class="li-op"><a href="update.html">Update books</a></li>
            <li class="li-op"><a href="delete.html">Delete books</a></li>
        </ul>
    </div>  
    <div class="div-out">
    <h2 class="title-search">This is the book that you are looking for</h2>
<?php
                // getting the inputs values
                $book_name=$_GET["book_name"];
                $book_category=$_GET["book_category"];
                $book_autor=$_GET["book_autor"];
                //connecting to the data base
                $servidor = "localhost";
                $usuario = "root";
                $password = "";
                $conexion = mysqli_connect($servidor,$usuario,$password) or die("ERROR DE CONEXION");
                // we should have create this db
                mysqli_select_db($conexion,"library");
                //validating the variable
                if(isset($book_name) && isset($book_category) && isset($book_autor)){
                    //making a query to search the books
                    $insert="SELECT book-id,bookName,bookAutor,bookCategory 
                    FROM books 
                    WHERE bookName = '$book_name' 
                    OR bookAutor = '$book_autor' 
                    OR bookCategory = '$book_category'
                    ;
                    "; 
                    $searchs = mysqli_query($conexion,$insert);
                    // if the querry have something it will show up
                    if(mysqli_fetch_row($searchs)){
                        while($search = mysqli_fetch_row($searchs)){
                        
                        ?>  
                            <div class="book-cont">
                                <p class="books">Book Id: <?php echo $search[0]; ?></p>
                                <p class="books">Book Name: <?php echo $search[1]; ?></p>
                                <p class="books">Book Autor: <?php echo $search[2];?></p>
                                <p class="books">Book Category: <?php echo $search[3]; ?></p>
                            </div>
                        <?php
                        }
                    }
                    else{
                        echo "<h2 class='error title-search'>No concidence</h2>";
                    }
                    
                    
                     
                }
                else{
                    echo "<h2 class='error title-search'>Error</h2>";
                }
                mysqli_close($conexion);
    ?>
        <a href="index.html">Volver</a>
    <div class="div-out">
</body>
</html>