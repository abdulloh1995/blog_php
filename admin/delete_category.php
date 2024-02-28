<?php
include "../inc/header.php";
include "../inc/nav.php";
include "../db/db.php";
include "../db_helper.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $category_data = get_category_by_id($id);
    // print_r($category_data);

    if (isset($_GET['confirm'])) {
        delete_category($id);
        header("Location: category.php");
        exit;
    } else if (isset($_GET['confirm']) && $_GET['confirm'] == 0) {
        header("Location: category.php");
    }
}
?>

<div class="delete_form container">
    <div class="title_delete">
        <h5><span class="title_item"><?= $category_data[0]['title'] ?></span> o`chirishni tasdiqlang</h5>
    </div>
    <div class="delete_buttons">
        <a href="delete_category.php?id=<?= $id ?>&confirm=0">
            <button class="btn waves-effect waves-light" type="submit" name="cancel">CANCEL
                <i class="material-icons right">cancel</i>
            </button>
        </a>
        <span style="margin: 0 10px 0 10px;"></span>
        <a href="delete_category.php?id=<?= $id ?>&confirm=1">
            <button class="btn waves-effect waves-light red" type="submit" name="delete">DELETE
                <i class="material-icons right">delete_forever</i>
            </button>
        </a>
    </div>
</div>

<?php include "../inc/footer.php" ?>