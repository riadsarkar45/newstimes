<?php
include('functions/data-controller.php');

if (isset($_POST['submit'])) {
  $imagePath = null;


  $dataToInsert = [
    'main_title' => trim($_POST['main_title']),
    'slug_title' => trim($_POST['slug_title']),
    'single_page_title' => trim($_POST['single_page_title']),
    'special_title' => trim($_POST['special_title']),
    'category' => trim($_POST['category']),
    'sub_category' => trim($_POST['sub_category']),
    'tags' => isset($_POST['tags']) ? $_POST['tags'] : null,
    'division' => isset($_POST['division']) ? $_POST['division'] : null,
    'district' => isset($_POST['district']) ? $_POST['district'] : null,
    'sub_district' => isset($_POST['sub_district']) ? $_POST['sub_district'] : null,
    'image' => $imagePath, // Store the image path (not just the name)
    'article' => trim($_POST['article']),
    'summary' => trim($_POST['summary'])
  ];

  // Insert data using the controller
  $controller = new DataController();
  $insert = $controller->insertData('posts', $dataToInsert);

  // Check if the insertion was successful
  if ($insert) {
    if (!empty($_FILES['image']['name'])) {
      $targetDir = "uploads/";
      $imagePath = $targetDir . basename($_FILES["image"]["name"]);


      if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {

        echo "File uploaded successfully: " . $imagePath;
      } else {

        echo "Error moving the file.";
        exit;
      }
    }
    echo "Data inserted successfully!";
  } else {
    echo "Error inserting data.";
  }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add New Post</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

  <!-- v4.0.0-alpha.6 -->
  <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/style.css">
  <link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
  <link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper boxed-wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="index.php" class="logo blue-bg">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="dist/img/logo-n.png" alt=""></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="dist/img/logo.png" alt=""></span> </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar blue-bg navbar-static-top">
        <!-- Sidebar toggle button-->
        <ul class="nav navbar-nav pull-left">
          <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a> </li>
        </ul>
        <div class="pull-left search-box">
          <form action="#" method="get" class="search-form">
            <div class="input-group">
              <input name="search" class="form-control" placeholder="Search..." type="text">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
              </span>
            </div>
          </form>
          <!-- search form -->
        </div>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i>
                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 new messages</li>
                <li>
                  <ul class="menu">
                    <li><a href="#">
                        <div class="pull-left"><img src="dist/img/img1.jpg" class="img-circle" alt="User Image"> <span class="profile-status online pull-right"></span></div>
                        <h4>Alex C. Patton</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">9:30 AM</span></p>
                      </a></li>
                    <li><a href="#">
                        <div class="pull-left"><img src="dist/img/img3.jpg" class="img-circle" alt="User Image"> <span class="profile-status offline pull-right"></span></div>
                        <h4>Nikolaj S. Henriksen</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">10:15 AM</span></p>
                      </a></li>
                    <li><a href="#">
                        <div class="pull-left"><img src="dist/img/img2.jpg" class="img-circle" alt="User Image"> <span class="profile-status away pull-right"></span></div>
                        <h4>Kasper S. Jessen</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">8:45 AM</span></p>
                      </a></li>
                    <li><a href="#">
                        <div class="pull-left"><img src="dist/img/img4.jpg" class="img-circle" alt="User Image"> <span class="profile-status busy pull-right"></span></div>
                        <h4>Florence S. Kasper</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">12:15 AM</span></p>
                      </a></li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View All Messages</a></li>
              </ul>
            </li>


            <!-- Others -->
            <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-book fa-fw"></i>
                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 new messages</li>
                <li>
                  <ul class="menu">
                    <li><a href="#">
                        <div class="pull-left"><img src="dist/img/img1.jpg" class="img-circle" alt="User Image"> <span class="profile-status online pull-right"></span></div>
                        <h4>Alex C. Patton</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">9:30 AM</span></p>
                      </a></li>
                    <li><a href="#">
                        <div class="pull-left"><img src="dist/img/img3.jpg" class="img-circle" alt="User Image"> <span class="profile-status offline pull-right"></span></div>
                        <h4>Nikolaj S. Henriksen</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">10:15 AM</span></p>
                      </a></li>
                    <li><a href="#">
                        <div class="pull-left"><img src="dist/img/img2.jpg" class="img-circle" alt="User Image"> <span class="profile-status away pull-right"></span></div>
                        <h4>Kasper S. Jessen</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">8:45 AM</span></p>
                      </a></li>
                    <li><a href="#">
                        <div class="pull-left"><img src="dist/img/img4.jpg" class="img-circle" alt="User Image"> <span class="profile-status busy pull-right"></span></div>
                        <h4>Florence S. Kasper</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">12:15 AM</span></p>
                      </a></li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View All Messages</a></li>
              </ul>
            </li>


            <!-- -->

            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i>
                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Notifications</li>
                <li>
                  <ul class="menu">
                    <li><a href="#">
                        <div class="pull-left icon-circle red"><i class="icon-lightbulb"></i></div>
                        <h4>Alex C. Patton</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">9:30 AM</span></p>
                      </a></li>
                    <li><a href="#">
                        <div class="pull-left icon-circle blue"><i class="fa fa-coffee"></i></div>
                        <h4>Nikolaj S. Henriksen</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">1:30 AM</span></p>
                      </a></li>
                    <li><a href="#">
                        <div class="pull-left icon-circle green"><i class="fa fa-paperclip"></i></div>
                        <h4>Kasper S. Jessen</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">9:30 AM</span></p>
                      </a></li>
                    <li><a href="#">
                        <div class="pull-left icon-circle yellow"><i class="fa  fa-plane"></i></div>
                        <h4>Florence S. Kasper</h4>
                        <p>I've finished it! See you so...</p>
                        <p><span class="time">11:10 AM</span></p>
                      </a></li>
                  </ul>
                </li>
                <li class="footer"><a href="#">Check all Notifications</a></li>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="dist/img/img1.jpg" class="user-image" alt="User Image"> <span class="hidden-xs">Md. Abul Bashar</span> </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <div class="pull-left user-img"><img src="dist/img/img1.jpg" class="img-responsive" alt="User"></div>
                  <p class="text-left">Md. Abul Bashar <small>mabashar52@gmail.com</small> </p>
                  <div class="view-link text-left"><a href="#">View Profile</a> </div>
                </li>
                <li><a href="#"><i class="icon-profile-male"></i> My Profile</a></li>
                <li><a href="#"><i class="icon-wallet"></i> My Balance</a></li>
                <li><a href="#"><i class="icon-envelope"></i> Inbox</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><i class="icon-gears"></i> Account Setting</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->

    <?php
    include('includes/sidebar.php')
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header sty-one">
        <h1 class="text-black">Post Layouts</h1>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="sub-bread"><i class="fa fa-angle-right"></i> Posts</li>
          <li><i class="fa fa-angle-right"></i> post Layouts</li>
        </ol>
      </div>

      <!-- Main content -->
      <div class="content">
        <div class="row m-t-3">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header bg-blue">
                <h5 class="m-b-0">Add Post</h5>
              </div>
              <div class="card-body">
                <form action="add-new-post.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-bordered">
                  <div class="form-body">

                    <style>
                      .word-count {
                        display: flex;
                      }

                      .span-title {
                        width: 85%;
                      }

                      .count-span {
                        border: 1px solid lightgray;
                        padding: 0 5px 13px;
                      }
                    </style>
                    <div class="form-group row">
                      <label class="control-label text-bold text-right col-md-2">Main Page Title</label>
                      <div class="col-md-10 word-count">
                        <div class="span-title">
                          <input placeholder="Main Page Title" name="main_title" class="form-control" type="text" name="post_name" id="post_name">
                        </div>
                        <div class="span-div-style">
                          <span class="count-span"> Word count: 0</span>
                        </div>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label class="control-label text-bold text-right col-md-2">Post title Slug</label>
                      <div class="col-md-10">
                        <input type="text" name="slug_title" id="post_slug" class="form-control" readonly="" placeholder="Auto Post title slug">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label text-bold text-right col-md-2">Single Page Title</label>
                      <div class="col-md-10">
                        <input name="single_page_title" placeholder="Single Page Title if you want another" class="form-control" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label text-bold text-right col-md-2">Main Special Title</label>
                      <div class="col-md-10">
                        <input name="special_title" placeholder="Main Page Red Special Title if needed" class="form-control" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label text-bold text-right col-md-2">Category & tags</label>
                      <div class="row">
                        <div class="col-lg-4">
                          <select name="category" class="form-control custom-select">
                            <option disabled="" selected="">==SELECT Category==</option>
                            <option>Education</option>
                            <option>Bangladesh</option>
                            <option>International</option>
                          </select>
                        </div>

                        <div class="col-lg-4">
                          <select name="sub_category" class="form-control custom-select">
                            <option disabled="" selected="">==Select SubCategory==</option>
                            <option>primary</option>
                            <option>College</option>
                            <option>University</option>
                          </select>
                        </div>

                        <div class="col-lg-4">
                          <select name="tags" class="form-control custom-select">
                            <option disabled="" selected="">==Select Tags==</option>
                            <option>SEO</option>
                            <option>innovative seo</option>
                            <option>masterclass</option>
                            <option>we are proud</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label text-bold text-right col-md-2">Division, District & Subdistrict</label>
                      <div class="row">
                        <div class="col-lg-4">
                          <select name="division" class="form-control custom-select">
                            <option disabled="" selected="">=SELECT Division=</option>
                            <option>Rajshahi</option>
                            <option>Dhaka</option>
                            <option>barishal</option>
                          </select>
                        </div>

                        <div class="col-lg-4">
                          <select name="district" class="form-control custom-select">
                            <option disabled="" selected="">=SELECT District=</option>
                            <option>Natore</option>
                            <option>Rajshahi</option>
                            <option>Kustia</option>
                          </select>
                        </div>

                        <div class="col-lg-4">
                          <select name="sub_district" class="form-control custom-select">
                            <option disabled="" selected="">=SELECT Subdistrict=</option>
                            <option>Gurudaspur</option>
                            <option>SiNgra</option>
                            <option>Lalpur</option>
                            <option>we are proud</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label text-bold text-right col-md-2" for="file">Choose Your Featured Image</label>
                      <div class="col-lg-8">
                        <div class="form-group">
                          <input name="image" type="file">
                        </div>
                      </div>
                    </div>




                    <div class="form-group row">
                      <label class="control-label text-bold text-right col-md-2">Write Your Article</label>
                      <div class="col-md-10">
                        <textarea name="article" class="form-control" id="placeTextarea" rows="3" placeholder="Write Your Article"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label text-bold text-right col-md-2">Write Post Summary</label>
                      <div class="col-md-10">
                        <textarea name="summary" class="form-control" id="placeTextarea" rows="3" placeholder="Write Post Summary"></textarea>
                      </div>
                    </div>



                    <div class="form-group row">
                      <label class="control-label text-bold text-right col-md-2" for="place">Post Placement</label>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">
                              Option one </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">
                              Option two is disabled </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">
                              Option one </label>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">
                              Option one </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">
                              Option two is disabled </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">
                              Option one </label>
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">
                              Option one </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">
                              Option two is disabled </label>
                          </div>
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">
                              Option one </label>
                          </div>
                        </div>
                      </div>

                    </div>



                  </div>
                  <div class="form-actions">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="offset-sm-4 col-md-10">
                            <button type="submit" name="submit" class="btn btn-success btn-lg"> Submit</button>
                            <button type="button" class="btn btn-danger btn-lg">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">Version 1.2</div>
      Copyright © 2017 Yourdomian. All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->



  <!-- jQuery 3 -->
  <script src="dist/js/jquery.min.js"></script>

  <!-- v4.0.0-alpha.6 -->
  <script src="dist/bootstrap/js/bootstrap.min.js"></script>

  <!-- template -->
  <script src="dist/js/niche.js"></script>
  <script type="text/javascript" src="dist/js/myscript.js"></script>

</body>

</html>