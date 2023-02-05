<?php
@session_start();

include('../class/catagory.class.php');
$catagory = new Catagory();
if(isset($_POST['submit'])){
    $catagory->set('name', $_POST['name']);
    $catagory->set('rank', $_POST['rank']);
    $catagory->set('status', $_POST['status']);
    $catagory->set('created_by',$_SESSION['id']);
    $catagory->set('created_date',date('Y-m-d H:i:s'));
    
    $result = $catagory->save();

    if(is_integer($result)){
        $msg = "Catagory inserted successfully with id ".$result;
    }
    else{
        $msg= "";
    }
}else{
    $ErrMsg = "Category Already Taken!";
}

include('headerfooter/header.php');
// print_r($catagory);
include('sidebar.php');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!-- col-sl/lg/-6 bootstrap -->
            <h1 class="page-header">Create Catagory</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php if(isset($msg)){ ?>

                <div class="alert alert-success"> <?php echo $msg; ?> </div>
            <?php } ?>
            <form role="form" id="submitForm" method="post" novalidate>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" type="text" required>
                </div>
                <div class="form-group">
                    <label>Rank</label>
                    <input class="form-control" name="rank" type="number" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="optionsRadios1" value="1" checked>Active
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="optionsRadios2" value="0">Inactive
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" name="submit">Submit Button</button>
                <button type="reset" class="btn btn-danger">Reset Button</button>
            </form>
        </div>
    </div>

</div>

<?php
include('headerfooter/footer.php');
?>

<script>
    $(document).ready(function(){
        $('#name').keyup(function(){
            const value = $("#name").val();
            $.ajax({
                url:"checkCatagoryName.php",
                method:"post",
                dataType:"text",
                data:{'catagoryName': value},
                success:function(res){
                    if( res != "success"){
                        $("#catagoryError").text(res);
                    }else{
                        $("#catagoryError").text("");
                    }
                }
            })
        })
    })
    </script>