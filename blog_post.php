<?php 
      require_once('private/initialize.php'); 
      $id = $_GET['id'];
      $retval = find_post_by_id($id);
      $row = mysqli_fetch_assoc($retval);

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // …
            
        if ($_POST['submit']) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $content = $_POST['comment'];
            //$mydate=getdate(date("U"));
            $date = date('F', mktime(0, 0, 0, date("m"), 10))." ".date("d").",".date("Y");
            $result = add_comment($id,$name,$email,$content,$date);
            if($result)
            {
                //echo 'comment Susscefully Update';
            }
        }

        elseif ($_POST['send']) {
            $comment_id=$_GET['comment_id'];
            $name = $_POST['name_reply'];
            $email = $_POST['email_reply'];
            $content = $_POST['comment_reply'];
            //$mydate=getdate(date("U"));
            $date = date('F', mktime(0, 0, 0, date("m"), 10))." ".date("d").",".date("Y");
            $result = add_comment_replay($id,$comment_id,$name,$email,$content,$date);
            if($result)
            {
                //echo 'comment Susscefully Update';
            }
        }
    }

      $comments = find_comment($id);
      $comments_reply_1 = find_comment_replay($id);
      //var_dump($comments_reply_1);
      $num_comment = mysqli_num_rows ( $comments );
      $num_reply = mysqli_num_rows ( $comments_reply_1 );
      $comment_results = array();
      $reply_result = array();
    //   while($line = mysqli_fetch_array($comments, MYSQL_ASSOC)){
    //       $comment_results[] = $line;
    //   }
      while($row23 = mysqli_fetch_assoc($comments)){
        array_push($comment_results, $row23);
    }

    while($row56 = mysqli_fetch_assoc($comments_reply_1)){
        array_push($reply_result, $row56);
    }

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <link rel="icon" href="img/1.png" type="image/icon type">
    <title>Blog - Affan Personal Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Template Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700" rel="stylesheet">

    <!-- Template CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/preloader.min.css" rel="stylesheet">
    <link href="css/circle.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/fm.revealator.jquery.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- CSS Skin File -->
    <link href="css/skins/yellow.css" rel="stylesheet">

    <!-- Live Style Switcher - demo only -->
    <link rel="alternate stylesheet" type="text/css" title="blue" href="css/skins/blue.css" />
    <link rel="alternate stylesheet" type="text/css" title="green" href="css/skins/green.css" />
    <link rel="alternate stylesheet" type="text/css" title="yellow" href="css/skins/yellow.css" />
    <link rel="alternate stylesheet" type="text/css" title="blueviolet" href="css/skins/blueviolet.css" />
    <link rel="alternate stylesheet" type="text/css" title="goldenrod" href="css/skins/goldenrod.css" />
    <link rel="alternate stylesheet" type="text/css" title="magenta" href="css/skins/magenta.css" />
    <link rel="alternate stylesheet" type="text/css" title="orange" href="css/skins/orange.css" />
    <link rel="alternate stylesheet" type="text/css" title="purple" href="css/skins/purple.css" />
    <link rel="alternate stylesheet" type="text/css" title="red" href="css/skins/red.css" />
    <link rel="alternate stylesheet" type="text/css" title="yellowgreen" href="css/skins/yellowgreen.css" />
    <link rel="stylesheet" type="text/css" href="css/styleswitcher.css" />

    <style>
        body.dark .contact-container .contact .rightside form .form-group input[type=text],
        body.dark .contact-container .contact .rightside form .form-group input[type=email],
        body.dark .contact-container .contact .rightside form .form-group textarea,
        body.dark .comments-form .form-group input[type=text],
        body.dark .comments-form .form-group input[type=email],
        body.dark .comments-form .form-group textarea {
        background: #333;
        border: 1px solid #444;
        color: #fff;
        }

        body.dark .comments-form .form-group i,
        body.dark .contact-container .contact .rightside form .form-group i,
        body.dark  .main-text h3,
        body.light.dark-header .main-text h3,
        body.dark p,
        body.light.dark-header .main-text p,
        body.dark .personal-info ul li,
        body.dark .contact-container  .contact .leftside,
        body.dark .navigation a{
        color: #eee;
        }

        body.dark .cd-stretchy-nav .stretchy-nav-bg {
        background: #333;
        }

        body.dark .profile-picture img {
        border: 3px solid #353535;
        }

        body.blog.dark .comments-list .comment:not(.last) {
        border-bottom: 1px solid #555;
        }

        body.dark .contact-container  .contact .leftside span i {
        color: rgba(255, 255, 255, .3);
        }

        body.blog.dark p,
        body.blog.dark  .meta span {
        color: #eee;
        }

        body.blog.dark .meta,
        body.blog .container-fluid.page-title .meta {
        background: rgba(0,0,0,.6) !important;
        }

        body.blog.dark .pagination li:hover {
        background: #333;
        }

        body.blog.dark .pagination li a {
        color: #eee;
        }

        body.blog.dark .comments-form  form .input-field label {
        color: #eee;
        }

        body.blog.dark .comments-form  form .input-field label.active {
        color: #eee !important;
        }

        body.blog.dark .comments-form  form .input-field input[type=text],
        body.blog.dark .comments-form  form .input-field input[type=email],
        body.blog.dark .comments-form  form .input-field textarea {
        color: #fff !important;
        border-bottom: 1px solid #555;
        }

        body.blog.dark .comments-heading,
        body.blog.dark .comments-list .comment-author,
        body.blog.dark .comments-list .comment-reply {
        color: #fff;
        }

        body.blog.dark .comments-list .comment-date {
        color: #aaa;
        }

        /** Comments **/

        .comments-heading {
        margin-top: 40px;
        font-weight: 600;
        font-size: 28px;
        }

        .comments-list {
        list-style: none;
        margin: 0;
        padding: 20px 0;
        }

        .comments-list .comment {
        border-bottom: 1px solid #ddd;
        padding-bottom: 20px;
        margin-bottom: 30px;
        }

        .comments-list .comment.last {
        border-bottom: 0;
        padding-bottom: 0;
        margin-bottom: 0;
        }

        .comments-list img.comment-avatar {
        width: 82px;
        height: 82px;
        border-radius: 100%;
        margin-right: 25px;
        }

        .comments-list .comment-body {
        margin-left: 110px;
        }

        .comments-list .comment-author {
        font-weight: 600;
        font-size: 14px;
        color: #555;
        text-transform: uppercase;
        }

        .comments-list .comment-date {
        font-size: 12px;
        font-family: 'Open Sans', sans-serif;
        }

        .comments-list .comment-content {
        margin: 15px 0;
        }

        .comments-list .comment-reply {
        text-transform: uppercase;
        font-weight: 600;
        }

        .comments-reply {
        list-style: none;
        margin: 0 0 0 110px;
        }

        /** Comments Form **/

        .comments-heading.add-comment {
        margin-top: 20px;
        margin-bottom: 40px;
        font-weight: 600;
        }

        .comments-form {
        margin-bottom: 0;
        }

        .comments-form form .form-group ,
        .comments-form form .submit-form {
        padding: 0;
        margin-bottom: 30px;
        }

        .comments-form  .form-group input[type=text],
        .comments-form  .form-group input[type=email],
        .comments-form  .form-group textarea {
        border-radius: 30px;
        outline: none;
        box-shadow: none !important;
        font-size: 15px;
        font-family: 'Open Sans', sans-serif;
        }

        .comments-form  .form-group textarea {
        height: 130px;
        padding: 12px 0 15px 49px;
        }

        .comments-form  .form-group input[type=text],
        .comments-form  .form-group input[type=email] {
        height: 46px;
        padding-left: 46px;
        }

        .comments-form  .form-group i {
        position: absolute;
        left: 21px;
        top: 15px;
        font-size: 15px;
        opacity: .5;
        }
        body.dark .comments-form .form-group input[type=text], body.dark .comments-form .form-group input[type=email], body.dark .comments-form .form-group textarea {
        background: #333;
        border: 1px solid #444;
        color: #fff;
        }



    </style>
    <!-- Modernizr JS File -->
    <script src="js/modernizr.custom.js"></script>
</head>

<body class="blog-post">

<!-- Header Starts -->
<header class="header" id="navbar-collapse-toggle">
    <!-- Fixed Navigation Starts -->
    <ul class="icon-menu d-none d-lg-block revealator-slideup revealator-once revealator-delay1">
        <li class="icon-box">
            <i class="fa fa-home"></i>
            <a href="index.html">
                <h2>Home</h2>
            </a>
        </li>
        <li class="icon-box">
            <i class="fa fa-user"></i>
            <a href="about.html">
                <h2>About</h2>
            </a>
        </li>
        <li class="icon-box">
            <i class="fa fa-briefcase"></i>
            <a href="portfolio.html">
                <h2>Portfolio</h2>
            </a>
        </li>
        <li class="icon-box">
            <i class="fa fa-envelope-open"></i>
            <a href="contact.php">
                <h2>Contact</h2>
            </a>
        </li>
        <li class="icon-box active">
            <i class="fa fa-comments"></i>
            <a href="blog.php">
                <h2>Blog</h2>
            </a>
        </li>
    </ul>
    <!-- Fixed Navigation Ends -->
    <!-- Mobile Menu Starts -->
    <nav role="navigation" class="d-block d-lg-none">
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul class="list-unstyled" id="menu">
                <li><a href="index.html"><i class="fa fa-home"></i><span>Home</span></a></li>
                <li><a href="about.html"><i class="fa fa-user"></i><span>About</span></a></li>
                <li><a href="portfolio.html"><i class="fa fa-folder-open"></i><span>Portfolio</span></a></li>
                <li><a href="contact.html"><i class="fa fa-envelope-open"></i><span>Contact</span></a></li>
                <li class="active"><a href="blog.html"><i class="fa fa-comments"></i><span>Blog</span></a></li>
            </ul>
        </div>
    </nav>
    <!-- Mobile Menu Ends -->
</header>
<!-- Header Ends -->
<!-- Page Title Starts -->
<section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
    <h1>my <span>blog</span></h1>
    <span class="title-bg">posts</span>
</section>
<!-- Page Title Ends -->
<!-- Main Content Starts -->
<section class="main-content revealator-slideup revealator-once revealator-delay1">
    <div class="container">
        <div class="row">
            <!-- Article Starts -->
            <article class="col-12">
                <!-- Meta Starts -->
                <div class="meta open-sans-font">
                    <span><i class="fa fa-user"></i> Affan</span>
                    <span class="date"><i class="fa fa-calendar"></i><?php echo $row['publish_date'] ?></span>
                    <span><i class="fa fa-tags"></i><?php echo $row['tag_id'] ?>.</span>
                </div>
                <!-- Meta Ends -->
                <!-- Article Content Starts -->
                <h1 class="text-uppercase text-capitalize"><?php echo $row['title'] ?></h1>
                <img src="img/blog/blog-post-1.jpg" class="img-fluid" alt="Blog image"/>
                 <?php echo $row['content'] ?>
                <!-- Article Content Ends -->
                <div class="comments">
							<h3 class="comments-heading uppercase"><?php echo $num_comment; ?> Comments</h3>
							<ul class="comments-list">
								<li>
									<?php for ($i=0; $i <$num_comment ; $i++){ ?>
                                    <div class="">
                                        <!-- Comment Starts -->
                                        <div class="comment">
                                            <?php if(is_logged_in()){?>
                                                <img class="comment-avatar pull-left" alt="" src="img/default_profile_pic.jpg">
                                            <?php } else{?>
                                                <img class="comment-avatar pull-left" alt="" src="img/default_profile_pic.jpg">
                                            <?php } ?>
                                            <div class="comment-body">
                                                <div class="meta-data">
                                                    <span class="comment-author"><?php echo $comment_results[$i]['name'] ?></span>
                                                    <span class="comment-date pull-right"><?php echo $comment_results[$i]['date'] ?></span>
                                                </div>
                                                <div class="comment-content">
                                                <p> <?php echo $comment_results[$i]['content'] ?></p></div>
                                                <div>
                                                    <a class="comment-reply" onclick="<?php echo 'myFunction('.$comment_results[$i]['id'].')'; ?>">Reply</a>
                                                    <div class="comments-form mt-5 comment_rep" style="display:none;" id = "<?php echo 'reply_comment_'.$comment_results[$i]['id']; ?>">
                                                        <form role="form" action="<?php echo 'blog-post.php?id='.$id.'&comment_id='.$comment_results[$i]['id']; ?>" method="POST">
                                                            <!-- Name Field Starts -->
                                                            <div class="form-group col-12">
                                                                <i class="fa fa-user prefix"></i>
                                                                <input  name="name_reply" type="text" class="form-control" placeholder="YOUR NAME" required="">
                                                            </div>
                                                            <!-- Name Field Ends -->
                                                            <!-- Email Field Starts -->
                                                            <div class="form-group col-12">
                                                                <i class="fa fa-envelope prefix"></i>
                                                                <input  name="email_reply" type="text" class="form-control" placeholder="YOUR EMAIL" required="">
                                                            </div>
                                                            <!-- Email Field Ends -->
                                                            <!-- Comment Textarea Starts -->
                                                            <div class="form-group col-xl-12">
                                                                <i class="fa fa-comments prefix"></i>
                                                                <textarea  name="comment_reply" class="form-control" placeholder="YOUR COMMENT" required=""></textarea>
                                                            </div>
                                                            <!-- Comment Textarea Ends -->
                                                            <!-- Submit Form Button Starts -->
                                                            <div class="col s12 m12 l6 xl6 submit-form">
                                                                <input type="submit" name="send" value="Submit" />

                                                                <button class="btn button-animated" type="submit" name="send">
                                                                    <span><i class="fa fa-comment"></i> Add comment</span>
                                                                </button>
                                                            </div>
                                                            <!-- Submit Form Button Ends -->
                                                        </form>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>
                                        <!-- Comment Ends -->
                                        <?php for ($j=0; $j <$num_reply ; $j++){  ?>
                                            <?php if($reply_result[$j]['comment_id'] == $comment_results[$i]['id']){ ?>
                                                    
                                                    <!-- Coment reply list -->
                                                        <ul class="comments-reply">
                                                            <li>
                                                                <!-- Comment Starts -->
                                                                <div class="comment">
                                                                    <?php if(is_logged_in()){?>
                                                                        <img class="comment-avatar pull-left" alt="" src="img/default_profile_pic.jpg">
                                                                    <?php } else{?>
                                                                        <img class="comment-avatar pull-left" alt="" src="img/default_profile_pic.jpg">
                                                                    <?php } ?>
                                                                    <div class="comment-body">
                                                                        <div class="meta-data">
                                                                            <span class="comment-author"><?php echo $reply_result[$j]['name'] ?></span>
                                                                            <span class="comment-date pull-right">January 17, 2017</span>
                                                                        </div>
                                                                        <div class="comment-content">
                                                                        <p><?php echo $reply_result[$j]['content'] ?></p></div>
                                                                        <div>
                                                                            <!--Comment reply Form  Start -->

                                                                                    <a class="comment-reply" onclick="<?php echo 'relpy_reply('.$reply_result[$j]['id'].')'; ?>">Reply</a>
                                                                                    <div class="comments-form mt-5 comment_rep" style="display:none;" id = "<?php echo 'reply_comment_replay_'.$reply_result[$j]['id']; ?>">
                                                                                        <form role="form" action="<?php echo 'blog-post.php?id='.$id; ?>" method="POST">
                                                                                            <!-- Name Field Starts -->
                                                                                            <div class="form-group col-12">
                                                                                                <i class="fa fa-user prefix"></i>
                                                                                                <input  name="name_reply_rep" type="text" class="form-control" placeholder="YOUR NAME" required="">
                                                                                            </div>
                                                                                            <!-- Name Field Ends -->
                                                                                            <!-- Email Field Starts -->
                                                                                            <div class="form-group col-12">
                                                                                                <i class="fa fa-envelope prefix"></i>
                                                                                                <input  name="email_reply_rep" type="text" class="form-control" placeholder="YOUR EMAIL" required="">
                                                                                            </div>
                                                                                            <!-- Email Field Ends -->
                                                                                            <!-- Comment Textarea Starts -->
                                                                                            <div class="form-group col-xl-12">
                                                                                                <i class="fa fa-comments prefix"></i>
                                                                                                <textarea  name="comment_reply_rep" class="form-control" placeholder="YOUR COMMENT" required=""></textarea>
                                                                                            </div>
                                                                                            <!-- Comment Textarea Ends -->
                                                                                            <!-- Submit Form Button Starts -->
                                                                                            <div class="col s12 m12 l6 xl6 submit-form">
                                                                                                <button class="btn button-animated" type="submit" name="send">
                                                                                                    <span><i class="fa fa-comment"></i> Add comment</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <!-- Submit Form Button Ends -->
                                                                                        </form>
                                                                                    </div>
                                                                            <!--Comment reply Form end -->        
                                                                        </div>	
                                                                    </div>
                                                                </div>
                                                                <!-- Comment Ends -->
                                                            </li>
                                                        </ul>
                                            <?php  } ?>
                                            <?php //mysqli_free_result ($row45); 
                                                } ?>
                                    </div><!-- comment end-->
                                    <?php } ?>
								</li>
							</ul>
							<h3 class="comments-heading uppercase add-comment">Add a comment</h3>
							<!-- Comments Form Starts -->
							<div class="comments-form">
								<form role="form" action="<?php echo 'blog-post.php?id='.$id; ?>" method="POST">
									<!-- Name Field Starts -->
                                    <div class="form-group col-12">
										<i class="fa fa-user prefix"></i>
										<input id="name" name="name" type="text" class="form-control" placeholder="YOUR NAME" required="">
									</div>
                                    <!-- Name Field Ends -->
                                    <!-- Email Field Starts -->
                                    <div class="form-group col-12">
										<i class="fa fa-envelope prefix"></i>
										<input id="email" name="email" type="text" class="form-control" placeholder="YOUR EMAIL" required="">
									</div>
                                    <!-- Email Field Ends -->
                                    <!-- Comment Textarea Starts -->
                                    <div class="form-group col-xl-12">
										<i class="fa fa-comments prefix"></i>
										<textarea id="comment" name="comment" class="form-control" placeholder="YOUR COMMENT" required=""></textarea>
									</div>
                                    <!-- Comment Textarea Ends -->
									<!-- Submit Form Button Starts -->
                                    <div class="col s12 m12 l6 xl6 submit-form">
                                        <input type="submit" name="submit" value="Submit" />
                                        <button class="btn button-animated" type="submit" name="submit">
											<span><i class="fa fa-comment"></i> Add comment</span>
										</button>
                                    </div>
                                    <!-- Submit Form Button Ends -->
								</form>
							</div>
							<!-- Comments Form Ends -->
						</div>
            </article>
            
            <!-- Article Ends -->
        </div>
    </div>
</section>
<!--Custom scripts for replay section -->
<script>
        
       function myFunction(id) {
       

          var elems = document.getElementsByClassName("comment_rep");
            for (var i=0;i<elems.length;i+=1){
            elems[i].style.display = 'none';
            }

          var element = document.getElementById("reply_comment_"+id);


            element.style.display = "block";
            
        }

        function relpy_reply(id){

            var elems = document.getElementsByClassName("comment_rep");
            for (var i=0;i<elems.length;i+=1){
            elems[i].style.display = 'none';
            }

            var element = document.getElementById("reply_comment_replay_"+id);


            element.style.display = "block";
        }
</script>
<!-- Template JS Files -->
<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/styleswitcher.js"></script>
<script src="js/preloader.min.js"></script>
<script src="js/fm.revealator.jquery.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpGridGallery.js"></script>
<script src="js/jquery.hoverdir.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/custom.js"></script>

</body>


<!-- Mirrored from slimhamdi.net/tunis/dark/blog-post.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Aug 2020 09:24:44 GMT -->
</html>
