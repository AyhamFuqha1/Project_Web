<?php
require('handel/database.php');
$a = "SELECT * From gardes WHERE id_quiz=15";
$b = mysqli_query($conn, $a);
if (mysqli_num_rows($b) > 0) {
    $grades = mysqli_fetch_all($b, MYSQLI_ASSOC);
} else {
    echo "no";
}

$sql = "SELECT `total-marks` From quiz WHERE id=15";
$connection = mysqli_query($conn, $sql);
$marks = mysqli_fetch_all($connection, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techstore | Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-3" href="#" style="margin-left: 9rem;">EDUWEP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                
            </ul>
             
        </div>
    </nav>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Grades</h3>
                </div>


                <table class="table table-hover my-5">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center; vertical-align: middle;">#</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">Name</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">Email</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">grade</th>
                            <th style="text-align: center; vertical-align: middle;">Num-que-correct</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">attempt</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">Time_Finsh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($grades)) {
                            foreach ($grades as $grade) { ?>
                                <tr>
                                    <?php
                                    $aa = "SELECT `name`,email From person WHERE id =" . $grade['id_student'];
                                    $bb = mysqli_query($conn, $aa);
                                    $student = mysqli_fetch_all($bb, MYSQLI_ASSOC);

                                    ?>
                                    <td style="text-align: center; vertical-align: middle;"><?php echo $grade['id'] ?></td>
                                    <td style="text-align: center; vertical-align: middle;"><?php echo $student[0]['name']; ?>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;"><?php echo $student[0]['email'] ?>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $grade['grade'] . "/" . $marks[0]['total-marks']; ?>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <?php echo $grade['number_que_correct']; ?></td>
                                    <td style="text-align: center; vertical-align: middle;"> <?php echo $grade['attempt']; ?>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;"> <?php echo $grade['time']; ?></td>

                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="6" style="text-align:center"> No Admin Data </td>
                            </tr>
                        <?php }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!--  <script src="js/jquery-3.5.1.min.js"></script> -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>