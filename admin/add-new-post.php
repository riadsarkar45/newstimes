<?php
include('functions/data-controller.php');
include('includes/styles.php');
if (isset($_POST['submit'])) {

  $imagePath = null;

  if (!empty($_FILES['image']['name'])) {
    $targetDir = "uploads/";
    $imagePath = $targetDir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
  }

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

  $controller = new DataController();
  $insert = $controller->insertData('posts', $dataToInsert);

  if ($insert) {
    echo "Data inserted successfully!";
  } else {
    echo "Error inserting data.";
  }
};
?>



<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper boxed-wrapper">

    <?php
    include 'includes/header.php';
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