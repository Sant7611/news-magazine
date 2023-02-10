<?php
include('headerfooter/header.php');
include('headerfooter/footer.php');
include('../class/catagory.class.php');
include('../class/news.class.php');

$catagory = new Catagory();
$catagoryList = $catagory->retrieve();

$news = new News();


@session_start();
if (isset($_POST['submit'])) {

    $news->set('title', $_POST['title']);
    $news->set('short_detail', $_POST['short_detail']);
    $news->set('detail', $_POST['detail']);
    $news->set('featured', $_POST['featured']);
    $news->set('breaking', $_POST['breaking']);
    $news->set('status', $_POST['status']);
    $news->set('slider_key', $_POST['slider_key']);
    $news->set('catagory_id', $_POST['catagory_id']);
    $news->set('created_by', $_SESSION['id']);
    $news->set('created_date', date('Y-m-d H:i:s'));

    if ($_FILES['image']['error'] == 0) {
        if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpeg") {
            if ($_FILES['image']['size'] <= 1024 * 1024) {
                $imageName = uniqid() . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $imageName);
                $news->set('image', $imageName);
            } else {
                $imageError = "Error, Exceeded 1Mb!";
            }
        } else {
            $imageError = "Invalid Image!";
        }
    }
    $result = $news->save();
    if (is_integer($result)) {
        $ErrMs = "";
        $msg = "News inserted saved Successfully with id " . $result;
    } else {
        $msg = "";
    }
}
include('sideBar.php');

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create News</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php if (isset($msg)) { ?>
                <div class="alert alert-success"><?php echo $msg;  ?></div>
            <?php  } ?>
            <?php if (isset($ErrMsg)) { ?>
                <div class="alert alert-danger"><?php echo $ErrMsg;  ?></div>
            <?php  } ?>
            <form role="form" id="submitForm" method="post" enctype="multipart/form-data" noValidate>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" id="title" required>
                    <!-- <input type="hidden" name="catagoryEntry" id="catagoryEntry"> -->
                    <!-- <span id="catagoryError" style="color:red"></span> -->
                </div>
                <div class="form-group">
                    <label>News catagory</label>
                    <select class="form-control" name="catagory_id" required>
                        <option vlaue="">Select catagory</option>

                        <?php
                        foreach ($catagoryList as $catagory) { ?>
                            <option value="<?php echo $catagory['id']; ?>">
                                <?php echo $catagory['name']; ?></option>

                        <?php
                        }
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label>Short Detail</label>
                    <textarea class="form-control" rows="3" name="short_detail" required></textarea>
                </div>
                <div class="form-group">
                    <label>Detail</label>
                    <textarea class="form-control ckeditor" rows="3" name="detail"></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" required>
                </div>

                <div class="form-group">
                    <label>Featured News</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="featured" id="optionsRadios1" value="1" checked>Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="featured" id="optionsRadios2" value="0">No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Breaking News</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="breaking" id="optionsRadios1" value="1" checked>Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="breaking" id="optionsRadios2" value="0">No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Slider Key</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="slider_key" id="optionsRadios1" value="1" checked>Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="slider_key" id="optionsRadios2" value="0">No
                        </label>
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
    $(document).ready(function() {
        $('#name').keyup(function() {
            const value = $("#name").val();
            $.ajax({
                url: "checkCatagoryName.php",
                method: "post",
                dataType: "text",
                data: {
                    'catagoryName': value
                },
                success: function(res) {
                    if (res != "success") {
                        $("#catagoryError").text(res);
                    } else {
                        $("#catagoryError").text("");
                    }
                }
            })
        })
    })
</script>