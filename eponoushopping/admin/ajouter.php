
<?php  
    include('links.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="verif.php" method="post">
        <label for="">Désignation du produit</label><br>
        <input type="text" name="designation_produit"><br>
        <label for="">Marque du produit</label><br>
        <input type="text" name="marque_produit"><br>
        <label for="">Image 1</label><br>
        <input type="file" name="img1" ><br>
        <label for="">Image 2</label><br>
        <input type="file" name="img2" ><br>
        <label for="">Image 3</label><br>
        <input type="file" name="img3" ><br>
        <label for="">Image 4</label><br>
        <input type="file" name="img4" ><br>
        <input type="submit" name="ajouter">

    </form>
</body>
</html>