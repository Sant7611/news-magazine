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
include('../class/news.class.php');
// $newsobject = new catagory();

$newsobject = new News();
$datalist = $newsobject->retrieve();
include('sidebar.php');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">list News</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="panel-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>S. No</th>
                        <th>title</th>
                        <th>short detail</th>
                        <th>Image</th>
                        <th>featured</th>
                        <th>breaking</th>
                        <th>status </th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datalist as $key => $news) {
                    ?>
                        <tr class="odd gradeX">
                            <td><?php echo $key + 1; ?></td>
                            <td> <?php echo $news['title']; ?> </td>
                            <td> <?php echo $news['short_detail']; ?></td>
                            <td> <img height="100px" width="100px" src="../images/<?php echo $news['image']; ?> "></td>
                            <td> <?php
                                    if ($news['breaking'] == 1) {
                                        echo "<label class='label-success'> Active </label>";
                                    } else {
                                        echo "<label class = 'label-danger'> Inactive </label>";
                                    }
                                    ?>
                            </td>
                            <td> <?php
                                    if ($news['featured'] == 1) {
                                        echo "<label class='label-success'> Active </label>";
                                    } else {
                                        echo "<label class = 'label-danger'> Inactive </label>";
                                    }
                                    ?>
                            </td>

                            <td> <?php
                                    if ($news['status'] == 1) {
                                        echo "<label class='label-success'> Active </label>";
                                    } else {
                                        echo "<label class = 'label-danger'> Inactive </label>";
                                    }
                                    ?>
                            </td>
                            <td class="center" width="15%">
                                <a href="editNews.php?id=<?php echo $newsobject['id']; ?>" class="btn btn-success" role="btn">Edit</a>
                                <a href="deleteNews.php?id=<?php echo $newsobject['id']; ?>" class="btn btn-danger" role="btn">Delete</a>
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