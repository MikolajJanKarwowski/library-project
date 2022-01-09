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
        </ul>
    </div>  
    <div class="div-out">
    
<?php
                // getting the inputs values
                $book_id=$_GET["book_id"];
                $book_name=$_GET["book_name"];
                $book_category=$_GET["book_category"];
                $book_autor=$_GET["book_autor"];
                $book_name_up=$_GET["book_name_up"];
                $book_category_up=$_GET["book_category_up"];
                $book_autor_up=$_GET["book_autor_up"];
                //connecting to the data base
                $servidor = "localhost";
                $usuario = "root";
                $password = "";
                $conexion = mysqli_connect($servidor,$usuario,$password) or die("ERROR DE CONEXION");
                // we should have create this db
                mysqli_select_db($conexion,"library");
                //validating the variable
                if(isset($book_name) && isset($book_category) && isset($book_autor) && isset($book_name_up) && isset($book_category_up) && isset($book_autor_up) && isset($book_id)){
                    $query = "UPDATE books 
                    SET bookName = '$book_name_up',bookAutor = '$book_autor_up',bookCategory='$book_category_up' 
                    WHERE bookId = '$book_id' AND bookName = '$book_name' AND bookAutor = '$book_autor' AND bookCategory='$book_category'";
                    $result = mysqli_query($conexion,$query);
                    if(!$result){
                        echo "<h2 class='title-search error'>This book is not in the DataBase</h2>";
                    }
                    else{
                        echo "<h2 class='title-search succes'>The book has been updated</h2>";
                    }
                    
                     
                }
                else{
                    echo "<h2 class='title-search error'>Error</h2>";
                }
                mysqli_close($conexion);
    ?>
        <a href="update.html">Volver</a>
    </div>
</body>
</html>