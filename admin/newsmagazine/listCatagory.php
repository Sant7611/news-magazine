<?php
@session_start();

// print_r($_SESSION);
// print_r($_COOKIE);
if (!array_key_exists('username', $_SESSION) && !array_key_exists('username', $_COOKIE)) { {
        header('location:../index.php');
    }
}
include('headerfooter/header.php');
include('../class/catagory.class.php');
$catagoryobject = new catagory();
$datalist = $catagoryobject->retrieve();
include('sidebar.php');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">list_catagory</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>serial no</th>
                        <th>name</th>
                        <th>rank</th>
                        <th>status </th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datalist as $key => $catagoryobject) {
                    ?>
                        <tr class="odd gradeX">
                            <td><?php echo $key + 1; ?></td>
                            <td> <?php echo $catagoryobject['name']; ?> </td>
                            <td> <?php echo $catagoryobject['rank']; ?></td>
                            <td> <?php
                                    if ($catagoryobject['status'] == 1) {
                                        echo "<label class='label-success'> Active </label>";
                                    } else {
                                        echo "<label class = 'label-danger'> Inactive </label>";
                                    }
                                    ?></td>
                            <td class="center" width="15%">
                                <a href="editCatagory.php?id=<?php echo $catagoryobject['id']; ?>" class="btn btn-success" role="btn">Edit</a>
                                <a href="deleteCatagory.php?id=<?php echo $catagoryobject['id']; ?>" class="btn btn-danger" role="btn">Delete</a>

                            </td>
                        </tr>
                    <?php } ?>


                </tbody>
            </table>
            <!-- /.table-responsive -->
        </div>
    </div>

    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

<!-- /#wrapper -->
<?php
require_once('headerfooter/footer.php')
?>