<?php
include('includes/styles.php');
include 'functions/data-controller.php';
session_start();
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
        <h1 class="text-black">All Posts</h1>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="sub-bread"><i class="fa fa-angle-right"></i> Tables</li>
          <li><i class="fa fa-angle-right"></i>All Posts</li>
        </ol>
      </div>

      <!-- Main content -->
      <div class="content">
        <div class="info-box">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Posted By</th>
                <th scope="col">Image</th>
                <th scope="col">Posted At</th>
                <th scope="col">Updated</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $srNo = 0;
              $post = new DataController();
              $allPost = $post->fetchData('posts', null, 'id');
              foreach ($allPost as $post) {
                $status = "Approved";
                $status = "Declined";
                if ($post['isApproved'] === 'no') {
                  $status = '<button type="button" class="badge badge-warning border-0">Pending</button>';
                }
                if ($post['isApproved'] === 'yes') {
                  $status = '<button type="button" class="badge badge-success border-0">Approved</button>';
                }
                if ($post['isApproved'] === 'declined') {
                  $status = '<button type="button" class="badge badge-danger border-0">Declined</button>';
                }
                $srNo++;

              ?>
                <tr>
                  <th scope="row"><?php echo $srNo ?></th>
                  <td><?php echo $post['main_title']; ?></td>
                  <td><?php echo $post['category']; ?></td>
                  <td><?php echo "Admin" ?></td>
                  <td><img src=<?php echo $post['image'] ?> alt=""></td>
                  <td><?php echo $post['created_at'] ?></td>
                  <td>Nono</td>
                  <td><?php echo $status ?></td>
                  <td>
                    <button type="button" class="badge badge-danger border-0">Delete</button>
                    |<button type="button" class="badge badge-success border-0">Approve </button>|
                      <button type="button" class="badge badge-warning border-0">UnApprove</button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>



        </div>
        <!-- /.content -->
      </div>
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

  <!-- jsgrid Tables -->
  <script src="dist/plugins/jsgrid/db.js"></script>
  <script src="dist/plugins/jsgrid/jsgrid.min.js"></script>
  <script src="dist/plugins/jsgrid/jsgrid.int.js"></script>
</body>

</html>