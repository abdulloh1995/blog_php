<?php
include "../inc/header.php";
include "../inc/nav.php";
include "../db/db.php";
include "../db_helper.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

?>



<h1>category</h1>

<div class="container">
    <a class="btn-floating btn-large waves-effect waves-light suucess right" href="add_category.php"><i class="material-icons">add</i></a>
    <table class="highlight centered">
        <thead>
            <tr>
                <th>#id</th>
                <th>Name</th>
                <th>action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach (get_category_list($page) as $categorydata) {
            ?>
                <tr>
                    <td><?= $categorydata['id'] ?></td>
                    <td><?= $categorydata['title'] ?></td>
                    <td>
                        <a href="update_category.php?id=<?= $categorydata['id'] ?>"><span style="cursor: pointer;"><i class="material-icons" style="color: orange;">edit</i></span></a>
                        <a href="delete_category.php?id=<?= $categorydata['id'] ?>"><span style="cursor: pointer;"><i class="material-icons" style="color: red;">delete</i></span></a>
                    </td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>
    <ul class="pagination">
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <?php for ($i = 1; $i <= get_pagination(); $i++) { ?>

            <?php
            $active = '';
            if (isset($_GET['page']) && $_GET['page'] == $i) {
                $active = 'active';
            } else if (!isset($_GET['page']) && $i == 1) {
                $active = 'active';
            }
            ?>

            <li class="<?= $active ?>"><a href="category.php?page=<?= $i ?>"><?= $i ?></a></li>

        <?php } ?>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>

</div>
<?php include "../inc/footer.php" ?>