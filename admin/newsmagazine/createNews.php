<?php
@session_start();

include('sidebar.php');
include('../class/catagory.class.php');
include('../class/news.class.php');
include('headerfooter/header.php');


$catagory = new Catagory();
$catagoryList = $catagory->retrieve();
print_r($catagoryList);

$news = new News();

if (isset($_POST['submit'])) {
    $catagory->set('title', $_POST['title']);
    $catagory->set('short_detail', $_POST['short_detail']);
    $catagory->set('detail', $_POST['detail']);
    $catagory->set('featured', $_POST['featured']);
    $catagory->set('breaking', $_POST['breaking']);
    $catagory->set('status', $_POST['status']);
    $catagory->set('slider_key', $_POST['slider_key']);
    $catagory->set('catagory_id', $_POST['catagory_id']);
    $catagory->set('created_by', $_SESSION['id']);
    $catagory->set('created_date', date('Y-m-d H:i:s'));

    if ($_FILES['image']['name'] == 0) {
        if (
            $_FILES['image']['type'] == "image/png" ||
            $_FILES['image']['type'] == "image/jpg" ||
            $_FILES['image']['type'] == "image/jpeg"
        ) {
            if ($_FILES['image']['size'] <= 1024 * 1024) {
                $imageName = uniqid() . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], 
                '../images/' . $imageName);
                $news->set('image', $imageName);
            }else{
                $imageError = "Error, Exceeded 1mb";
            }
        }else{
            $imageError = "Invalid Image!";
        }
    }

    if (is_integer($result)) {
        $msg = "Catagory inserted successfully with id " . $result;
    } else {
        $msg = "";
    }
} else {
    $ErrMsg = "Category Already Taken!";
}

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!-- col-sl/lg/-6 bootstrap -->
            <h1 class="page-header">Create News</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php if (isset($msg)) { ?>
                <div class="alert alert-success"> <?php echo $msg; ?> </div>
            <?php } ?>
            <form role="form" id="submitForm" method="post" novalidate>
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" name="title" type="text" required>
                </div>
                <div class="form-group">
                    <label>News catagory</label>
                    <select class="form-control" name="catagory_id" required>
                        <option>Select catagory</option>
                        <?php foreach ($catagoryList as $catagory) { ?>
                            <option value="<?php echo $catagory['id']; ?>"> <?php echo $catagory['name']; ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Short detail</label>
                    <textarea class="form-control" name="short_detail" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label> detail</label>
                    <textarea class="form-control ckeditor" name=" detail" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" required>
                </div>
                <div class="form-group">
                    <label>Featured News</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="feature_news" id="optionsRadios1" value="1" checked>Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="optionsRadios2" value="0">No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Breaking news</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="breaking_news" id="optionsRadios1" value="1" checked>Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="optionsRadios2" value="0">No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Slider key</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="slider_key" id="optionsRadios1" value="1" checked>Yes
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" id="optionsRadios2" value="0">No
                        </label>
                    </div>
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

<script src="../js/ckeditor/ckeditor.js"></script>

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