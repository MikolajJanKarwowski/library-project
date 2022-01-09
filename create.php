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
        </ul>
    </div>
    <?php
                // getting the inputs values
                $book_name=$_GET["book_name_create"];
                $book_category=$_GET["book_category_create"];
                $book_autor=$_GET["book_autor_create"];
                //connecting to the data base
                $servidor = "localhost";
                $usuario = "root";
                $password = "";
                $conexion = mysqli_connect($servidor,$usuario,$password) or die("ERROR DE CONEXION");
                // we should have create this db
                mysqli_select_db($conexion,"library");
                //validating the variable
                if(isset($book_name) && isset($book_category) && isset($book_autor)){
                    // inserting the values in the columns
                    $insert="INSERT INTO books (
                        bookName,
                        bookCategory,
                        bookAutor
                    ) VALUES ('$book_name','$book_category','$book_autor')"; 
                    mysqli_query($conexion,$insert);
                    ?>
                    <div class="div-out">
                        <h2 class="title-search">The book has been created</h2>
                        <div class="book-cont">
                            <p class="books">Book Name: <?php echo "$book_name" ?></p>
                            <p class="books">Book Autor: <?php echo "$book_autor" ?></p>
                            <p class="books">Book Category: <?php echo "$book_category" ?></p>
                        </div>
                        <a href="create.html">Volver</a>
                    </div>
                    <?php   
                }
                else{
                    ?>
                    <div class="div-out"><h2 class='error'>Error</h2><a href="create.html">Volver</a>
                    </div>
                    <?php
                    
                }
    ?>
    
    
</body>
</html>