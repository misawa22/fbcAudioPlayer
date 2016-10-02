<?php
/**
 * Created by PhpStorm.
 * User: misawa22
 * Date: 10/1/16
 * Time: 7:59 PM
 */

function player_2014($dbc) {

        $q = "SELECT * FROM player WHERE id = 1 AND ORDER BY D ASC";
        $r = mysqli_query($dbc, $q);

    while($p = mysqli_fetch_assoc($r)) { ?>
        <li><a href=<?php echo $p['url']; ?> target="<?php echo $p['target']; ?>"><?php echo $p['label']; ?></a></li>
    <?php }

}

function player_2015($dbc) {

    $q = "SELECT * FROM player WHERE id = 1 AND ORDER BY D ASC";
    $r = mysqli_query($dbc, $q);

    while($p = mysqli_fetch_assoc($r)) { ?>
        <li><a href=<?php echo $p['url']; ?> target="<?php echo $p['target']; ?>"><?php echo $p['label']; ?></a></li>
    <?php }

}