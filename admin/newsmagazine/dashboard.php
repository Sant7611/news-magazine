<?php
@session_start();
print_r($_SESSION);
print_r($_COOKIE);
if(array_key_exists('username', $_SESSION) && array_key_exists('username',$_COOKIE)){ 
    
}else{
    header('location:../index.php');
}
include('headerfooter/header.php');
include('sidebar.php');
?>

<body>

    <div id="wrapper">

                       
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php
   include('headerfooter/footer.php');
   ?>
