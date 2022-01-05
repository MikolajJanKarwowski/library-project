<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                    echo "The book has been created";   
                }
                else{
                    echo "Error";
                }
    ?>
    <a href="crear.html">Volver</a>
</body>
</html>