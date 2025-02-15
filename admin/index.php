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
        <h1>Mr. / Mrs. <span style="color:red;">Bashar</span> Welcome to Admin Panel</h1>
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><i class="fa fa-angle-right"></i> Dashboard</li>
        </ol>
      </div>

      <!-- Main content -->
      <div class="content">




        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <?php
            $userId = $_SESSION["id"];
            $posts = new DataController();
            $allPosts = $posts->fetchData('posts', "", '');
            $approvedPost = $posts->fetchData('posts', 'isApproved = "yes"', '' );
            $pendingPost = $posts->fetchData('posts', 'isApproved = "no"', '' );
            $declinedPost = $posts->fetchData('posts', 'isApproved = "declined"', '' );

            ?>
            <div class="info-box"> <span class="info-box-icon bg-aqua"><i class="icon-briefcase"></i></span>
              <div class="info-box-content"> <span class="info-box-number"><?php echo count($allPosts); ?></span> <span class="info-box-text">Total Posts</span> </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-xs-6">
            <div class="info-box"> <span class="info-box-icon bg-green"><i class="icon-pencil"></i></span>
              <div class="info-box-content"> <span class="info-box-number"></span><?php echo count($approvedPost) ?><span class="info-box-text">Approved Post</span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-xs-6">
            <div class="info-box"> <span class="info-box-icon bg-yellow"><i class="icon-wallet"></i></span>
              <div class="info-box-content"> <span class="info-box-number"><?php echo count($pendingPost) ?></span> <span class="info-box-text">Pending Post</span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-xs-6">
            <div class="info-box"> <span class="info-box-icon bg-red"><i class="icon-layers"></i></span>
              <div class="info-box-content"> <span class="info-box-number"><?php echo count($declinedPost) ?></span> <span class="info-box-text">Declined Post</span></div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>


        <div class="row">
          <div class="col-lg-8 m-b-3">
            <div class="box box-info">
              <div class="box-header with-border p-t-1">
                <h3 class="box-title text-black">Latest Orders</h3>
                <div class="pull-right"> <a href="#">Invoice Summary <i class="fa fa-long-arrow-right"></i></a> </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Item</th>
                        <th>Status</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><a href="#">OR9842</a></td>
                        <td>Call of Duty IV</td>
                        <td><span class="label label-success">Shipped</span></td>
                        <td> $ 1200.00 </td>
                      </tr>
                      <tr>
                        <td><a href="#">OR1848</a></td>
                        <td>Samsung Smart TV</td>
                        <td><span class="label label-warning">Pending</span></td>
                        <td> $ 5300.00 </td>
                      </tr>
                      <tr>
                        <td><a href="#">OR7429</a></td>
                        <td>iPhone 6 Plus</td>
                        <td><span class="label label-danger">Delivered</span></td>
                        <td> $ 1500.00 </td>
                      </tr>
                      <tr>
                        <td><a href="#">OR7429</a></td>
                        <td>Samsung Smart TV</td>
                        <td><span class="label label-info">Processing</span></td>
                        <td> $ 2000.00 </td>
                      </tr>
                      <tr>
                        <td><a href="#">OR1848</a></td>
                        <td>Samsung Smart TV</td>
                        <td><span class="label label-warning">Pending</span></td>
                        <td> $ 2500.00 </td>
                      </tr>
                      <tr>
                        <td><a href="#">OR7429</a></td>
                        <td>iPhone 6 Plus</td>
                        <td><span class="label label-danger">Delivered</span></td>
                        <td> $ 3000.00 </td>
                      </tr>
                      <tr>
                        <td><a href="#">OR9842</a></td>
                        <td>Call of Duty IV</td>
                        <td><span class="label label-success">Shipped</span></td>
                        <td> $ 1000.00 </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix"> <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a> <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> </div>
              <!-- /.box-footer -->
            </div>
          </div>
          <div class="col-lg-4 m-b-3">
            <div>
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                  <h3>My Contacts</h3>
                  <h5>Checkout my contacts here</h5>
                </div>
                <ul class="products-list product-list-in-box">
                  <li class="item">
                    <div class="product-img"> <img src="dist/img/img1.jpg" alt="Product Image"> </div>
                    <div class="product-info"> <a href="#" class="product-title">Florence Douglas</a> <span class="product-description"> <a href="#">florencedouglas@gmail.com</a> </span> </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img"> <img src="dist/img/img2.jpg" alt="Product Image"> </div>
                    <div class="product-info"> <a href="javascript:void(0)" class="product-title">Andrew Florence </a> <span class="product-description"> <a href="#">andrewflorence@gmail.com</a> </span> </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img"> <img src="dist/img/img3.jpg" alt="Product Image"> </div>
                    <div class="product-info"> <a href="javascript:void(0)" class="product-title">Florence Sr.</a> <span class="product-description"> <a href="#">florencesr.@gmail.com</a> </span> </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img"> <img src="dist/img/img4.jpg" alt="Product Image"> </div>
                    <div class="product-info"> <a href="javascript:void(0)" class="product-title">Andrew Florence </a> <span class="product-description"> <a href="#">andrewflorence@gmail.com</a> </span> </div>
                  </li>
                  <!-- /.item -->
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img"> <img src="dist/img/img3.jpg" alt="Product Image"> </div>
                    <div class="product-info"> <a href="javascript:void(0)" class="product-title">Florence Sr.</a> <span class="product-description"> <a href="#">florencesr.@gmail.com</a> </span> </div>
                  </li>
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.widget-user -->
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12">
            <div class="info-box">
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-12">
                  <div> <i class="ti-face-smile f-20 text-blue"></i>
                    <div class="info-box-content">
                      <h1 class="f-25 text-black">1,150</h1>
                      <span class="progress-description">New Orders</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:40%; height:6px;"> <span class="sr-only">40% Complete</span> </div>
                    </div>
                  </div>
                  <!-- /.info-box -->
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                  <div> <i class="ti-bar-chart f-20 text-danger"></i>
                    <div class="info-box-content">
                      <h1 class="f-25 text-black">2,030</h1>
                      <span class="progress-description">New Orders</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                    </div>
                  </div>
                  <!-- /.info-box -->
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                  <div> <i class="ti-panel f-20 text-info"></i>
                    <div class="info-box-content">
                      <h1 class="f-25 text-black">4,250</h1>
                      <span class="progress-description">Online Revenue</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:65%; height:6px;"> <span class="sr-only">65% Complete</span> </div>
                    </div>
                  </div>
                  <!-- /.info-box -->
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                  <div> <i class="ti-wallet f-20 text-green"></i>
                    <div class="info-box-content">
                      <h1 class="f-25 text-black">8,350</h1>
                      <span class="progress-description">Total Profit</span>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:85%; height:6px;"> <span class="sr-only">85% Complete</span> </div>
                    </div>
                  </div>
                  <!-- /.info-box -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->



        <!-- Main row -->
        <div class="row">
          <div class="col-lg-7 col-xlg-9">
            <div class="info-box">
              <div class="d-flex flex-wrap">
                <div>
                  <h4 class="text-black">Analytics Overview</h4>
                </div>
                <div class="ml-auto">
                  <ul class="list-inline">
                    <li class="text-info"> <i class="fa fa-circle"></i> Sales</li>
                    <li class="text-blue"> <i class="fa fa-circle"></i> Earning</li>
                  </ul>
                </div>
              </div>
              <div>
                <canvas id="line-chart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-xlg-3">
            <div class="info-box">
              <div class="d-flex flex-wrap">
                <div>
                  <h4 class="text-black">Our Visitors</h4>
                </div>
              </div>
              <div class="m-t-2">
                <canvas id="pie-chart" height="210"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div>
            </div>

          </div>
        </div>












      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">Version 1.0</div>
      Copyright © 2017 Abul Bashar. All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="dist/js/jquery.min.js"></script>

  <!-- v4.0.0-alpha.6 -->
  <script src="dist/bootstrap/js/bootstrap.min.js"></script>

  <!-- template -->
  <script src="dist/js/niche.js"></script>

  <!-- Chartjs JavaScript -->
  <script src="dist/plugins/chartjs/chart.min.js"></script>
  <script src="dist/plugins/chartjs/chart-int.js"></script>

  <!-- Chartist JavaScript -->
  <script src="dist/plugins/chartist-js/chartist.min.js"></script>
  <script src="dist/plugins/chartist-js/chartist-plugin-tooltip.js"></script>
  <script src="dist/plugins/functions/chartist-init.js"></script>
</body>

</html>