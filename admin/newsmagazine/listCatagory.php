<?php
include('headerfooter/header.php');
include('../class/catagory.class.php');
$catagoryobject = new Catagory();
print_r($catagoryobject);
$datalist = $catagoryobject->retrieve();
?>

<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">List Catagory</h1>
            </div>
        </div>
        <div class="row">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Serial Number </th>
                            <th>Name</th>
                            <th>Rank </th>
                            <th>Status </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">
                            <td>Trident</td>
                            <td>Internet Explorer 4.0</td>
                            <td>Win 95+</td>
                            <td class="center">4</td>
                            <td class="center">X</td>
                        </tr>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                <div class="well">
                    <h4>DataTables Usage Information</h4>
                    <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                    <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                </div>
            </div>
        </div>
    </div>


    <?php
    include('headerfooter/footer.php');
    ?>