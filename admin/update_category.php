<?php
include "../inc/header.php";
include "../inc/nav.php";
include "../db/db.php";
include "../db_helper.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $category_data = get_category_by_id($id);
    // print_r($category_data);
}

?>


<div class="row container category_section" style="margin-top: 30px;">
    <?php
    if (isset($_POST['update'])) {
        $title = $_POST['category_title'];
        update_category($id, $title);
        header("Location: category.php");
        exit;
    }
    ?>
    <form class="col s12 center-align" method="post">
        <div class="row">
            <div class="input-field col s6">
                <input placeholder="Category title" id="category_title" name="category_title" type="text" class="validate" value="<?= $category_data[0]['title'] ?>">
                <label for="category_title">Name</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="update">Update
            <i class="material-icons right">send</i>
        </button>
    </form>

</div>

<?php include "../inc/footer.php" ?>