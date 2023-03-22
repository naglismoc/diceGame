<?php include "./logic.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./parts/head.php"; ?>
</head>

<body>
    <?php if (!isset($_SESSION['game'])) { ?>
        <H1>Pradėkite žaidimą</H1>
        <form action="" method="post">
            <input type="text" name="p1">
            <input type="text" name="p2">
            <button type="submit">Pradėti žaidimą</button>
        </form>
    <?php } else { ?>
        <h2>Taškai:</h2>
        <h2><?= $_SESSION['game']['player1Name'] ?>: <?= $_SESSION['game']['player1Points'] ?> </h2>
        <h2><?= $_SESSION['game']['player2Name'] ?>: <?= $_SESSION['game']['player2Points'] ?> </h2>
        <h1>Dabar mes <?= $player ?>.</h1>
        <form action="" method="post">
            <button type="submit" name="metimas">mesti kauliuką</button>
        </form>
    <?php } ?>

    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Stock</th>
        </tr>
        <?php for ($i=0; $i < count($cars); $i++) { ?>
            <tr>
                <td><?=$cars[$i][0]?></td>
                <td><?=$cars[$i][1]?></td>
            </tr>
       <?php } ?>
    </table>

</body>

</html>