<?php
include "../inc/header.php";
include "../inc/nav.php";
include "../db/db.php";
include "../db_helper.php";




?>


<div class="row container category_section" style="margin-top: 30px;">
    <?php
    if (isset($_POST['submit'])) {
        $title = $_POST['category_title'];
        add_category($title);
        header("Location: category.php");
        exit;
    }
    ?>
    <form class="col s12 center-align" method="post">
        <div class="row">
            <div class="input-field col s6">
                <input placeholder="Category title" id="category_title" name="category_title" type="text" class="validate">
                <label for="category_title">Name</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="submit">Submit
            <i class="material-icons right">send</i>
        </button>
    </form>

</div>

<?php include "../inc/footer.php" ?>