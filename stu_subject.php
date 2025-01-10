<?php
session_start();
require 'handel/database.php';

// Get subject_id from URL
$subject_id = intval($_GET['id']);

// Fetch subject details for this subject
$sql = "SELECT `name` FROM course WHERE id = '$subject_id'";
$countQuery = mysqli_query($conn, $sql);
$subject = mysqli_fetch_assoc($countQuery);

// Fetch content related to this subject
$sqlContent = "SELECT * FROM content WHERE subject_id = '$subject_id'";
$countQueryContent = mysqli_query($conn, $sqlContent);
$contents = mysqli_fetch_all($countQueryContent, MYSQLI_ASSOC);

// Fetch quizzes for the course
$quizSql = "SELECT * FROM quiz WHERE course_id = '$subject_id'";
$quizQuery = mysqli_query($conn, $quizSql);
$quizzes = mysqli_fetch_all($quizQuery, MYSQLI_ASSOC);

$idstudent = $_SESSION["idpearson"];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($subject['name']); ?></title>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link href="assets/css/header.css" rel="stylesheet">
    <link href="assets/css/calender.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Open Sans', sans-serif;
            background-color: #f9f9f9;
        }

        .content-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 25px;
            margin-top: 10px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .content-card:hover {
            transform: scale(1.02);
        }

        .content-title {
            font-size: 1.6rem;
            font-weight: 600;
            color: #333;
        }

        .content-description {
            font-size: 1.1rem;
            color: #666;
            margin-top: 10px;
        }

        .custom-button {
            background-color: rgb(29, 196, 68);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .custom-button:hover {
            background-color: #218838;
        }

        .quizzes-section {
            margin-top: 30px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .content-links h5 {
            margin-bottom: 10px;
            color: rgba(1, 17, 4, 0.79);
        }

        .content-links ul {
            list-style-type: none;
            padding: 0;
        }

        .content-links li {
            margin: 5px 0;
        }

        .content-links a {
            color: #218838;
            text-decoration: none;
        }

        .content-links a:hover {
            text-decoration: underline;
        }

        .calendar-container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
        }

        .calendar-header {
            text-align: center;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .day {
            padding: 5px;
            /* Reduced padding */
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.9rem;
            /* Reduced font size */
        }

        .empty {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="row">
        <div class="header22">
            <h2> Welcome to <span><?php echo htmlspecialchars($subject['name']); ?></span> course</h2>
            <hr class="hrs">
        </div>
    </div>

    <section class="blog" id="blog">
        <div class="container">
            <div class="row entite">
                <div class="col-lg-8">
                    <?php foreach ($contents as $content): ?>
                        <div class="content-card">
                            <h3><?php echo htmlspecialchars($content['title']); ?></h3>
                            <p><?php echo htmlspecialchars($content['description']); ?></p>

                            <div class="content-links">
                                <h5>Links:</h5>
                                <?php
                                $sql = "SELECT * FROM links WHERE content_id = '{$content['id']}'";
                                $countQuery = mysqli_query($conn, $sql);

                                if (!$countQuery) {
                                    echo "Error: " . mysqli_error($conn);
                                } else {
                                    if (mysqli_num_rows($countQuery) > 0): ?>
                                        <ul>
                                            <?php while ($linksq = mysqli_fetch_assoc($countQuery)): ?>
                                                <li>
                                                    <a href="<?php echo htmlspecialchars($linksq['url']); ?>" target="_blank">
                                                        <?php echo htmlspecialchars($linksq['url']); ?>
                                                    </a>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php else: ?>
                                        <p>No links available.</p>
                                    <?php endif;
                                }
                                ?>
                            </div>

                            <div class="content-media">
                                <h5>Media:</h5>
                                <?php
                                $mediaSql = "SELECT * FROM media WHERE content_id = '{$content['id']}'";
                                $mediaQuery = mysqli_query($conn, $mediaSql);

                                if (!$mediaQuery) {
                                    echo "Error: " . mysqli_error($conn);
                                } else {
                                    if (mysqli_num_rows($mediaQuery) > 0): ?>
                                        <div class="media-gallery">
                                            <?php while ($mediaItem = mysqli_fetch_assoc($mediaQuery)): ?>
                                                <div class="media-item">
                                                    <img src="assets/img/<?php echo $mediaItem['file_name']; ?>" alt="Media Item"
                                                        style="max-width: 100%; height: auto;">
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php else: ?>
                                        <p>No media available.</p>
                                    <?php endif;
                                }
                                ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Quizzes Section -->
                    <section class="quizzes" id="quizzes">
                        <div class="container">
                            <h2>Quizzes</h2>
                            <div class="row">
                                <div>
                                    <?php
                                    foreach ($subject as $course) {
                                        $quizSql = "SELECT * FROM quiz WHERE course_id = '$subject_id'";
                                        $quizQuery = mysqli_query($conn, $quizSql);

                                        if (!$quizQuery) {
                                            echo "Error: " . mysqli_error($conn);
                                        } else {
                                            if (mysqli_num_rows($quizQuery) > 0): ?>
                                                <?php while ($quiz = mysqli_fetch_assoc($quizQuery)): ?>
                                                    <div class="content-card">
                                                        <h3><?php echo htmlspecialchars($quiz['title']); ?></h3>
                                                        <p>Date: <?php echo htmlspecialchars($quiz['date-time']); ?>
                                                        </p>
                                                        <p>Time Allowed: <?php echo htmlspecialchars($quiz['time_allow']); ?> minutes
                                                        </p>
                                                        <p>Total Marks: <?php echo htmlspecialchars($quiz['total-marks']); ?>
                                                        </p>
                                                        <p>Number of Attempts: <?php echo htmlspecialchars($quiz['number_attempt']); ?>
                                                        </p>
                                                        <a onclick="enter(<?php echo $quiz['id']; ?>, <?php echo $_SESSION['idpearson']; ?>)"
                                                            class="custom-button btn btn-success">Take Exam</a>

                                                    </div>
                                                <?php endwhile; ?>
                                            <?php else: ?>
                                                <p>No quizzes available for this course.</p>
                                            <?php endif;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-lg-4">
                    <div class="calendar-container">
                        <h3>Calendar</h3>
                        <div class="calendar">
                            <div class="calendar-header">
                                <div class="month">January 2025</div>
                            </div>
                            <div class="days">
                                <div class="day">Sun</div>
                                <div class="day">Mon</div>
                                <div class="day">Tue</div>
                                <div class="day">Wed</div>
                                <div class="day">Thu</div>
                                <div class="day">Fri</div>
                                <div class="day">Sat</div>
                                <?php
                                // Get the current date details
                                $today = date("j"); // Day of the month without leading zeros
                                $currentMonth = date("n"); // Current month
                                $currentYear = date("Y"); // Current year
                                
                                // Determine the number of days in the current month
                                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);

                                // Get the day of the week for the first day of the month
                                $firstDayOfWeek = date("w", strtotime("$currentYear-$currentMonth-01"));

                                // Fill the calendar grid
                                for ($i = 0; $i < $firstDayOfWeek; $i++) {
                                    echo '<div class="day"></div>'; // Empty cells for days before the first day
                                }

                                for ($day = 1; $day <= $daysInMonth; $day++) {
                                    // Highlight today's date
                                    if ($day == $today) {
                                        echo '<div class="day" style="background-color: #218838; color: white; font-weight: bold;">' . $day . '</div>';
                                    } else {
                                        echo '<div class="day">' . $day . '</div>';
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function enter(idquiz, idpearson) {
          
            fetch("/New%20folder%20(3)/handel/check.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    idquiz: idquiz,
                    idstudent: idpearson
                }),
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }
                    return response.json();
                })
                .then((data) => {
                    let attempt = data.attempt;
                    let time = data.number;
                    console.log(attempt);
                    console.log(time);

                    // تحقق من عدد المحاولات
                    if (parseInt(attempt) < parseInt(time.number_attempt)) {
                    
                        alert("You can start the quiz");
                    } else {
                        alert("Number of attempts is finished");
                    }
                })
                .catch((error) => {
                    console.error("There was a problem with the fetch operation:", error);
                });
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>