<?php 
$mode = true;
if(Session::get('admin_username') == null)
  {
    header("Location: http://localhost:8000/login_admin?Mustlogin=" . urlencode(''));
    exit();
  }
  if(Session::get('admin_super') == "yes")
    {
      session(['admin_super' => "no"]);

    }
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Admin | @yield('title')</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->
      <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/../../plugins/datatables/dataTables.bootstrap.css">

    <link href="/css/lightbox.css" rel="stylesheet"> <!-- display foto -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <?php $msgs = DB::select('SELECT
          transaksi.trans_kode,
          transaksi.updated_at,
          transaksi.trans_read,
          customer.customer_nama
          FROM
          transaksi
          INNER JOIN customer ON transaksi.customer_id = customer.customer_id
          WHERE
          transaksi.trans_read IS NULL OR
          transaksi.trans_read = "ula"
          ORDER BY
          transaksi.updated_at DESC
          '); 

        $totals = DB::select('SELECT
          COUNT(customer_nama) AS total
          FROM
          transaksi
          INNER JOIN customer ON transaksi.customer_id = customer.customer_id
          WHERE
          transaksi.trans_read IS NUll
          ORDER BY
          transaksi.created_at DESC
          ');


        function facebook_time_ago($timestamp)  
        {  
          $time_ago = strtotime($timestamp);  
          $current_time = time();  
          $time_difference = $current_time - $time_ago;  
          $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
       return "Just Now";  
     }  
     else if($minutes <=60)  
     {  
       if($minutes==1)  
       {  
         return "one minute ago";  
       }  
       else  
       {  
         return "$minutes minutes ago";  
       }  
     }  
     else if($hours <=24)  
     {  
       if($hours==1)  
       {  
         return "an hour ago";  
       }  
       else  
       {  
         return "$hours hrs ago";  
       }  
     }  
     else if($days <= 7)  
     {  
       if($days==1)  
       {  
         return "yesterday";  
       }  
       else  
       {  
         return "$days days ago";  
       }  
     }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
       if($weeks==1)  
       {  
         return "a week ago";  
       }  
       else  
       {  
         return "$weeks weeks ago";  
       }  
     }  
     else if($months <=12)  
     {  
       if($months==1)  
       {  
         return "a month ago";  
       }  
       else  
       {  
         return "$months months ago";  
       }  
     }  
     else  
     {  
       if($years==1)  
       {  
         return "one year ago";  
       }  
       else  
       {  
         return "$years years ago";  
       }  
     }  
   }
   ?>

   <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-envelope-o"></i>
          @foreach ($totals as $total)
          <span class="label label-success">{{$total->total}}</span>
        </a>
        <ul class="dropdown-menu">

          <li class="header">You have {{$total->total}} messages</li>
          @endforeach
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
              <!--                       <li><!-- start message -->
                        <!-- <a href="#">

                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li> -->
                      <!-- end message -->
                      @foreach($msgs as $msg)
                      <li>
                        <a href="{{route('transaction.show', $msg->trans_kode)}}">

                          <h4>
                            {{$msg->customer_nama}}


                            <small><i class="fa fa-clock-o"></i><?php echo facebook_time_ago($msg->updated_at);?></small>
                          </h4>
                          <?php 
                          if($msg->trans_read == "ula")
                            echo "<p>Memberi ulasan</p>";
                          else
                            echo "<p>Membeli barang</p>";
                          ?>

                        </a>
                      </li>
                      @endforeach

                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Messages: style can be found in dropdown.less-->
              <li class="messages-menu">
                <?php 
                if (Session::get('admin_super') == "yes" || $mode == true)
                  {
                    echo "<a href=".URL::to('sdashboard')." >
                    SuperAdmin Mode

                    </a>";
                  }
                  ?>



                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="/uploads/admin/<?php echo Session::get('admin_foto'); ?>" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo Session::get('admin_nama'); ?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="/uploads/admin/<?php echo Session::get('admin_foto'); ?>" class="img-circle" alt="User Image">

                      <p>
                        <?php echo Session::get('admin_nama'); ?> - Web Developer
                        <small>Member since Nov. 2012</small>
                      </p>
                    </li>
                    <!-- Menu Body -->
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">

                      </div>
                      <div class="pull-right">
                        <form method="POST" action="/logout_admin">
                          {{csrf_field()}}
                          <input type="submit" value="Sign out" class="btn btn-default btn-flat" style="background-color: transparent;"/>
                        </form>
                      </div>
                    </li>
                  </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
              <div class="pull-left image">
                <img src="/uploads/admin/<?php echo Session::get('admin_foto'); ?>" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p><?php echo Session::get('admin_nama'); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>
            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li @yield('a')>
                <a href="{{URL::to('dashboard')}}">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
              <li @yield('e')>
                <a href="{{URL::to('customers')}}">
                  <i class="fa fa-users"></i> <span>Pembeli</span>
                </a>
              </li>
              <li @yield('b')>
                <a href="">
                  <i class="fa fa-exchange"></i> <span>Transaksi Pembeli</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li @yield('bb')><a href="{{URL::to('transaction_status')}}"><i class="fa fa-circle-o"></i> Transaction Status</a></li>
                  <li @yield('bb2')><a href="{{URL::to('transaction')}}"><i class="fa fa-circle-o"></i> List Transaction</a></li>
                </ul>
              </li>

              <li @yield('c')>
                <a href="{{URL::to('product')}}">
                  <i class="fa fa-shopping-bag"></i> <span>Produk</span>
                </a>
              </li>
              <li @yield('d')>
                <a href="{{URL::to('buyers_data')}}">
                  <i class="fa fa-database"></i> <span>Data Pembelian</span>
                </a>
              </li>
              <li @yield('g')>
                <a href="{{URL::to('bank')}}">
                  <i class="fa  fa-bank "></i> <span>Bank</span>
                </a>
              </li>
              <li @yield('h')>
                <a href="{{URL::to('courier')}}">
                  <i class="fa fa-ship"></i> <span>Kurir</span>
                </a>
              </li>
              <li @yield('i')>
                <a href="{{URL::to('payment')}}">
                  <i class="fa  fa-file-text"></i> <span>Bukti Pembayaran</span>
                </a>
              </li>
              <li @yield('j')>
                <a href="{{URL::to('edit_contact')}}">
                  <i class="fa fa-home"></i> <span>Contact</span>
                </a>
              </li>
            </ul>
          </section>
          <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->


        @yield('content')

        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.12
          </div>
          <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
          reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Create the tabs -->
          <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">

              <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->

            <!-- /.tab-pane -->
          </div>
        </aside>
        <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->
  <script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.6 -->
  <script src="/bootstrap/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="/plugins/morris/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="/plugins/knob/jquery.knob.js"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- DataTables -->
  <script src="/../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/../../plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- datepicker -->
  <script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="/plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="/dist/js/app.min.js"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script @yield('css')></script>
  <!-- AdminLTE for demo purposes -->
  <script src="/dist/js/demo.js"></script>
  <!-- CK Editor -->
  <script @yield('ckedit')></script>
  <!-- date-range-picker -->
  <script src="/plugins/daterangepicker/moment.min.js"></script>
  <script src="/plugins/daterangepicker/daterangepicker.js"></script>

  <?php
  if (isset($tgl))
  {
    echo '<script language="javascript">';
    echo "$(function () {


    //Date range picker
      var start = moment().subtract(29, 'days');
      var end = moment();



      $('#reservation').daterangepicker({
        locale: {
          format: 'DD/MMM/YYYY'
        },

        ranges: {
         'Today': [moment(), moment()],
         'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
         'This Month': [moment().startOf('month'), moment().endOf('month')],
         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
       }
     }, cb);

     cb(start, end);

   });";
   echo '</script>';

 }
 ?>
<!--  <script>
  $(function () {


    //Date range picker
    var start = moment().subtract(29, 'days');
    var end = moment();



    $('#reservation').daterangepicker({
      locale: {
        format: 'DD/MMM/YYYY'
      },

      ranges: {
       'Today': [moment(), moment()],
       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
       'This Month': [moment().startOf('month'), moment().endOf('month')],
       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
     }
   }, cb);

    cb(start, end);

  });
</script> -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script>
  $(function () {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  })
</script>

<script src="/js/lightbox.js"></script>

</body>
</html>

