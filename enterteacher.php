<?php require 'handel/database.php';
 $sql="SELECT * FROM course";
 $countQuery=mysqli_query($conn,$sql);
 $row = mysqli_fetch_all($countQuery, MYSQLI_ASSOC);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php foreach($row as $aa){?>
    <h1><?php echo $aa['name'] ?></h1>
    <h2><?php echo $aa['description'] ?></h2>
    <img src="assets/img/<?php echo $aa['img'] ?>">

<?php }?>
</body>
</html>