<?php session_start();
require 'handel/database.php';
$id = intval($_GET['id']);
$errorMessage = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
$sql2 = "SELECT `name`,`type` FROM person WHERE `id` = '$id'";
$countQuery2 = mysqli_query($conn, $sql2);
$row3 = mysqli_fetch_assoc($countQuery2);
$sql1 = "SELECT `id-cource` FROM `enrollment table` WHERE `id_pearson` = '$id'";
$countQuery1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_all($countQuery1, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <link href="assets/css/blog.css" rel="stylesheet">
  <link href="assets/css/header.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

</head>

<body>



  <?php include 'header.php'; ?>

  <div class="row">
    <div class="header22">
      <h2> Hello MR.<?php echo $row3['name'] ?></h2>
    </div>
    <div class="header1">
      <a>home</a>
      <a>/</a>
      <a>big</a>
    </div>
  </div>
  <!-- ======= Blog Section ======= -->
  <section class="blog" id="blog">
    <div class="container">
      <div class="row entite">
        <div class="col-lg-8">
          <?php foreach ($row1 as $course) {
            $sql = "SELECT * From course where id = '{$course['id-cource']}'";
            $countQuery = mysqli_query($conn, $sql);
            $row2 = mysqli_fetch_assoc($countQuery);
            ?>
            <article class="entry" data-aos="fade-up">
              <div class="entry-img">
                <img src="assets/img/<?php echo $row2['img'] ?>">
              </div>
              <h2>
                <a class="title"><?php echo $row2['name'] ?></a>
              </h2>
              <div class="row thre">
                <ul class="row ull">
                  <li class=""><i class="icofont-user "> </i><a href="#">ayham</a></li>
                  <li class="ml-4"><i class=" icofont-wall-clock "> </i><a href="#"><?php echo $row2['year'] ?></a></li>
                  <li class="ml-4"><i class=" icofont-comment"></i><a href="#">hassan</a></li>
                </ul>
              </div>
              <div class="asfl">
                <p><?php echo $row2['description'] ?></p>
                <div class="learn">
                  <?php if ($row3['type'] == "teacher") { ?>
                    <a href="subject_details.php?id=<?php echo $course['id-cource'];?>">Read More</a>
                  <?php } elseif ($row3['type'] == "student") { ?>
                    <a href="stu_subject.php?id=<?php echo $course['id-cource'] ;?>">Read More</a>
                  <?php } ?>
                </div>

              </div>

              <div class="col-lg-8">

              </div>
            </article>
          <?php } ?>
        </div>

        <div class="col-log-4">
          <div class="sidebar " data-aos="fade-left" style="   position: fixed; z-index: 1000; ">

            <div class="container1">
              <div class="row m-0 p-0 ">
                <div class="ayyy">
                  <h3 class="search ">Add Course</h3>


                  <form class="add">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                      onclick="clearErrors('exampleModal')">Add Course</button>
                  </form>

                </div>
                <h3 class="search">Search</h3>
                <div class="row ser_all">
                  <form class="searcch">
                    <input input="text" class="inpu">
                    <button class="butt" type="submit"><i class="icofont-search"></i></button>
                  </form>
                </div>

                <h3 class="cat">Student</h3>


                <div class="category">
                  <ul>
                    <li><a href="#">Number of Course <spane>(15)</spane></a></li>
                    <li><a href="#">Number of Student <spane>(15)</spane></a></li>
                    <li><a href="#">Number of Quiz <spane>(15)</spane></a></li>
                  </ul>
                </div>

                <h3 class="cat">Recent Posts</h3>
                <div class="recent">
                  <div class="post-item recent-item">
                    <img src="assets/img/Template_1/blog-recent-posts-1.jpg">
                    <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>

                  <div class="post-item recent-item">
                    <img src="assets/img/Template_1/blog-recent-posts-1.jpg">
                    <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                    <time datetime="2020-01-01">Jan 1, 2020</time>
                  </div>


                </div>



                <!-- المودال -->


              </div>
            </div>
          </div>






        </div>
      </div>
  </section>



  <!-- -----------------------modal-------------------------------->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="myForm" onsubmit="SubmitHandler(event)" action="handel/addcourse.php?id=<?php echo $id; ?>"
          enctype="multipart/form-data" method="POST">
          <div class="modal-body mb-3">
            <!-- مكان عرض الأخطاء -->
            <div id="errorMessages" style="color: red; margin-bottom: 10px;"></div>
            <!-- الحقول -->
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Enter Course Name..." required>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea id="description" name="description" class="form-control" placeholder="Enter Description..."
                required></textarea>
            </div>
            <div class="mb-3">
              <label for="year" class="form-label">Year</label>
              <input type="text" id="year" name="year" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="img" class="form-label">Image</label>
              <input type="file" id="img" name="img" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="assets/js/newcourse.js"></script>
  <script src="aos/aos.js"></script>
  <script src="assets/js/bb.js"></script>

  <script>
    AOS.init();
  </script>


</body>

</html>