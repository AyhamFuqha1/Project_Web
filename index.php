<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="assets/css/loginteacher.css" rel="stylesheet">
    <link href="assets/css/header.css" rel="stylesheet">
    <link href="aos/aos.css" rel="stylesheet">  
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

</head>

<body>


    
        <?php include 'header.php';  ?>
      
    
        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
          <div class="container">
    
            <div class="row">
    
              <div class="col-lg-8 ">
               <?php /* foreach($blo as $row){  */?> 
                <article class="entry" data-aos="fade-up">
    
                  <div class="entry-img">
                    <img src="admin/uploads/<?php /* echo $row['image'] */?> " alt="" class="img-fluid">
                  </div> 
    
                  <h2 class="entry-title">
                    <a href="blog-single.php?id=<?php /* echo $row['blogsid'] */?>"><?php /* echo $row['title'] */?> </a>
                  </h2>
    
                  <div class="entry-meta">
                    <ul>
                      <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html"><?php /* echo $row['name'] */ ?></a></li>
                      <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                      <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>
                    </ul>
                  </div>
    
                  <div class="entry-content">
                    <p>
                     <?php /* echo $row['short-desc'] */?>
                    </p>
                    <div class="read-more">
                      <a href="blog-single.html">Read More</a>
                    </div>
                  </div>
    
                </article><!-- End blog entry -->
               <?php /* } */ ?>
               
                <div class="blog-pagination">
                  <ul class="justify-content-center">
                    <li class="disabled"><i class="icofont-rounded-left"></i></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                  </ul>
                </div>
    
              </div><!-- End blog entries list -->
    















































              <div class="col-lg-4">
    
                <div class="sidebar" data-aos="fade-left">
    
                  <h3 class="sidebar-title">Search</h3>
                  <div class="sidebar-item search-form">
                    <form action="">
                      <input type="text">
                      <button type="submit"><i class="icofont-search"></i></button>
                    </form>
    
                  </div><!-- End sidebar search formn-->
    
                  <h3 class="sidebar-title">Categories</h3>
                  <div class="sidebar-item categories">
                    <ul>
                      <li><a href="#">General <span>(25)</span></a></li>
                      <li><a href="#">Lifestyle <span>(12)</span></a></li>
                      <li><a href="#">Travel <span>(5)</span></a></li>
                      <li><a href="#">Design <span>(22)</span></a></li>
                      <li><a href="#">Creative <span>(8)</span></a></li>
                      <li><a href="#">Educaion <span>(14)</span></a></li>
                    </ul>
    
                  </div><!-- End sidebar categories-->
    
                  <h3 class="sidebar-title">Recent Posts</h3>
                  <div class="sidebar-item recent-posts">
                    <div class="post-item clearfix">
                      <img src="assets/img/blog-recent-posts-1.jpg" alt="">
                      <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                      <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>
    
                    <div class="post-item clearfix">
                      <img src="assets/img/blog-recent-posts-2.jpg" alt="">
                      <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                      <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>
    
                    <div class="post-item clearfix">
                      <img src="assets/img/blog-recent-posts-3.jpg" alt="">
                      <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                      <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>
    
                    <div class="post-item clearfix">
                      <img src="assets/img/blog-recent-posts-4.jpg" alt="">
                      <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                      <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>
    
                    <div class="post-item clearfix">
                      <img src="assets/img/blog-recent-posts-5.jpg" alt="">
                      <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                      <time datetime="2020-01-01">Jan 1, 2020</time>
                    </div>
    
                  </div><!-- End sidebar recent posts-->
    
                  <h3 class="sidebar-title">Tags</h3>
                  <div class="sidebar-item tags">
                    <ul>
                      <li><a href="#">App</a></li>
                      <li><a href="#">IT</a></li>
                      <li><a href="#">Business</a></li>
                      <li><a href="#">Business</a></li>
                      <li><a href="#">Mac</a></li>
                      <li><a href="#">Design</a></li>
                      <li><a href="#">Office</a></li>
                      <li><a href="#">Creative</a></li>
                      <li><a href="#">Studio</a></li>
                      <li><a href="#">Smart</a></li>
                      <li><a href="#">Tips</a></li>
                      <li><a href="#">Marketing</a></li>
                    </ul>
    
                  </div><!-- End sidebar tags-->
    
                </div><!-- End sidebar -->
    
              </div><!-- End blog sidebar -->
    
            </div>
    
          </div>
        </section><!-- End Blog Section -->
    
  

    <script src="aos/aos.js"></script>  
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
