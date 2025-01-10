<?php
session_start();
require 'handel/database.php';

// Get subject_id from URL
$subject_id = intval($_GET['id']);

// Error message from session if any
$errorMessage = $_SESSION['error'] ?? null;
unset($_SESSION['error']);

// Fetch subject details for this subject
$sql = "SELECT `name` FROM course WHERE id = '$subject_id'";
$countQuery = mysqli_query($conn, $sql);
$subject = mysqli_fetch_assoc($countQuery);

// Fetch content related to this subject
$sqlContent = "SELECT * FROM content WHERE subject_id = '$subject_id'";
$countQueryContent = mysqli_query($conn, $sqlContent);
$contents = mysqli_fetch_all($countQueryContent, MYSQLI_ASSOC);

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
    <style>
        body {

            display: flex;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            /* padding: 20px;*/
        }

        .content-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .content-title {
            font-size: 1.9rem;
            font-weight: bold;
            color: #fff;
        }

        .content-description {
            font-size: 1rem;
            color: #555;
            margin-top: 10px;
        }

        .content-links a {
            display: inline-block;
            margin-right: 10px;
            color: rgb(12, 231, 12);
            text-decoration: none;
        }

        .content-links a:hover {
            text-decoration: underline;
        }

        .media-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            /* Space between images */
        }

        .media-item {
            flex: 1 1 calc(33.333% - 10px);
            /* Three images per row with some space */
            box-sizing: border-box;
        }

        .media-item img {
            width: 100%;
            /* Make images responsive */
            height: auto;
            /* Maintain aspect ratio */
            border-radius: 5px;
            /* Optional: rounded corners */
        }

        .content-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .content-card h3 {
            margin-top: 0;
        }

        .content-card p {
            margin: 5px 0;
        }

        .btn-info {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-info:hover {
            background-color: #0056b3;
        }

        .fixed-card {
            position: fixed;
            right: 20px;
            top: 160px;
            /* Adjust as needed */
            width: 390px;
            /* Fixed width */
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            /* Ensure it stays on top */
        }

        .fixed-card h5 {
            font-family: 'Poppins', sans-serif;
            color: rgb(0, 12, 5);
            margin-bottom: 10px;
        }

        .content-card {
            background-color: #fefefe;
            /* Lighter background */
            border: 1px solid #e0e0e0;
            /* Softer border */
            border-radius: 10px;
            /* More rounded corners */
            margin-bottom: 20px;
            padding: 20px;
            /* More padding */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Deeper shadow */
            transition: transform 0.2s;
            /* Animation on hover */
        }

        .content-card:hover {
            transform: scale(1.02);
            /* Slightly enlarge on hover */
        }

        .content-title {
            font-size: 1.6rem;
            /* Slightly larger title */
            font-weight: 600;
            /* Bolder title */
            color: #333;
        }

        .content-description {
            font-size: 1.1rem;
            /* Slightly larger description */
            color: #666;
            /* Softer color */
            margin-top: 10px;
        }

        .custom-button {
            background-color: rgb(29, 196, 68);
            /* Change this to your desired color */
            color: white;
            /* Text color */
            border: none;
            /* Remove border */
            padding: 9px 13px;
            /* Padding */
            border-radius: 8px;
            /* Rounded corners */
            cursor: pointer;
            /* Pointer cursor on hover */
            transition: background-color 0.3s;
            /* Smooth transition */
            margin-bottom: 20px;
        }

        .custom-button:hover {
            background-color: #218838;
            /* Darker shade on hover */
        }

        /** */
        .content-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            padding: 20px;
            transition: transform 0.2s;
        }

        .content-card:hover {
            transform: scale(1.02);
        }

        .content-card h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .content-card p {
            color: #666;
            line-height: 1.5;
        }

        /* Links Section */
        .content-links {
            margin-top: 15px;
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

        /* Media Section */
        .content-media {
            margin-top: 15px;
        }

        .content-media h5 {
            margin-bottom: 10px;
            color: rgba(1, 17, 4, 0.79);
        }

        .media-gallery {
            display: flex;
            flex-wrap: wrap;
        }

        .media-item {
            margin: 5px;
            flex: 1 1 calc(33.333% - 10px);
            /* 3 items per row */
        }

        .media-item img {
            border-radius: 8px;
            max-width: 100%;
            height: auto;
        }

        /* Quizzes Section */
        .quizzes {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
            padding: 20px;
        }

        .quizzes h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .quizzes .content-card {
            margin: 10px 0;
            padding: 15px;
            border-left: 5px solid rgb(29, 196, 68);
        }

        .quizzes .content-card h3 {
            margin: 0;
            color: rgb(29, 196, 68);
        }

        .quizzes .content-card p {
            margin: 5px 0;
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

        .header22 {
            margin-left: 65px;
        }

        .newstudent {}
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
                                // Fetch links for the current content item
                                $sql = "SELECT * FROM links WHERE content_id = '{$content['id']}'";
                                $countQuery = mysqli_query($conn, $sql);

                                // Check for SQL errors
                                if (!$countQuery) {
                                    echo "Error: " . mysqli_error($conn);
                                } else {
                                    // Check if there are any links
                                    if (mysqli_num_rows($countQuery) > 0): ?>
                                        <ul>
                                            <?php while ($linksq = mysqli_fetch_assoc($countQuery)): ?>
                                                <li>
                                                    <a href="<?php echo htmlspecialchars($linksq['url']); ?>" target="_blank">
                                                        <?php echo htmlspecialchars($linksq['url']); // Change this to a valid field if needed ?>
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

                                // Fetch media for the current content item
                                $mediaSql = "SELECT * FROM media WHERE content_id = '{$content['id']}'";
                                $mediaQuery = mysqli_query($conn, $mediaSql);

                                // Check for SQL errors
                                if (!$mediaQuery) {
                                    echo "Error: " . mysqli_error($conn);
                                } else {
                                    // Check if there are any media items
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
                                    // Fetch quizzes for the courses the user is enrolled in
                                    foreach ($subject as $course) {

                                        $quizSql = "SELECT * FROM quiz WHERE course_id = '$subject_id'";
                                        $quizQuery = mysqli_query($conn, $quizSql);

                                        // Check for SQL errors
                                        if (!$quizQuery) {
                                            echo "Error: " . mysqli_error($conn);
                                        } else {
                                            // Check if there are any quizzes
                                            if (mysqli_num_rows($quizQuery) > 0): ?>
                                                <?php while ($quiz = mysqli_fetch_assoc($quizQuery)): ?>
                                                    <div class="content-card">
                                                        <h3><?php echo htmlspecialchars($quiz['title']); ?></h3>
                                                        <p>Date: <?php echo htmlspecialchars($quiz['date-time']); ?>
                                                        </p>
                                                        <p>Time Allowed: <?php echo htmlspecialchars($quiz['time_allow']); ?> minutes
                                                        </p>
                                                        <p>Total Marks: <?php echo $quiz['total-marks']; ?>
                                                        </p>
                                                        <p>Number of Attempts: <?php echo htmlspecialchars($quiz['number_attempt']); ?>
                                                        </p>
                                                        <button class="custom-button" class="btn btn-info"
                                                            onclick="window.location.href='grades.php?id_quiz=<?php echo $quiz['id'] ?>'">Show
                                                            Results</button>
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
                <div class="fixed-card">
                    <h5>Add New Content</h5>
                    <button class="custom-button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addContentModal">Add
                        Content</button>
                    <button class="custom-button" class="btn btn-primary"
                        onclick="window.location.href='quiz.php?id=<?php echo $subject_id; ?>'">Add Quiz</button>
                    <form action="handel/add_student.php?id=<?php echo $subject_id; ?>" method="POST">
                        <div class="col">
                            <h6 class="mb-3">Add Student</h6>
                            <?php
                            if (isset($_SESSION['er'])) { ?>
                                <div class="alert alert-danger " role="alert" style=" padding: 10px; hight:10px">
                                    <?php echo $_SESSION['er']; ?>
                                </div>
                                <?php
                                unset($_SESSION['er']);
                            } ?>
                            <div class="">
                                <input type="text" class="form-control" name="email">
                                <button class="btn btn-primary mt-3 " style="background-color:#218838;">Add</button>
                            </div>
                        </div>
                    </form>

                </div>



                <!-- نافذة الإضافة -->
                <div class="modal fade" id="addContentModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="contentForm" enctype="multipart/form-data" method="POST"
                                action="handel/addcontent.php?id=<?php echo $subject_id; ?>">
                                <div class="modal-header">
                                    <h5>Add New Content</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="contentTitle" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="contentTitle" name="title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="contentDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="contentDescription" name="description"
                                            rows="4" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="contentMedia" class="form-label">Media</label>
                                        <input type="file" class="form-control" id="contentMedia" name="contentMedia"
                                            multiple>
                                    </div>
                                    <div class="mb-3">
                                        <label for="contentLinkInput" class="form-label">Add Links</label>
                                        <input type="url" class="form-control" id="contentLinkInput"
                                            placeholder="Enter a link">
                                        <button type="button" class="btn btn-secondary btn-sm mt-2" id="addLinkBtn">Add
                                            Link</button>
                                        <ul id="linksList" class="list-group mt-2"></ul>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="custom-button" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const linksList = document.getElementById('linksList');
            const contentLinkInput = document.getElementById('contentLinkInput');
            const addLinkBtn = document.getElementById('addLinkBtn');
            const contentForm = document.getElementById('contentForm');
            let links = [];

            addLinkBtn.addEventListener('click', () => {
                const linkValue = contentLinkInput.value.trim();
                if (linkValue) {
                    links.push(linkValue);
                    const li = document.createElement('li');
                    li.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
                    li.textContent = linkValue;
                    const removeBtn = document.createElement('button');
                    removeBtn.classList.add('btn', 'btn-sm', 'btn-danger');
                    removeBtn.textContent = 'Remove';
                    removeBtn.addEventListener('click', () => {
                        links = links.filter(link => link !== linkValue);
                        li.remove();
                    });
                    li.appendChild(removeBtn);
                    linksList.appendChild(li);
                    contentLinkInput.value = '';
                }
                console.log(links);
            });

            contentForm.addEventListener('submit', (e) => {
                links.forEach((link, index) => {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = `links[${index}]`;
                    hiddenInput.value = link;
                    contentForm.appendChild(hiddenInput);
                });
            });
        });
    </script>
    
    <script>
        function showQuizResults(quizId) {
            // Implement the logic to show quiz results
            // This could be a modal or redirect to a results page
            alert("Show results for quiz ID: " + quizId);
        }
    </script>

</body>

</html>