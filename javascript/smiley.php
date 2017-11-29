<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Smiley</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="smiley.css">
</head>

<body>
    <header>
        <h1>HTML5 Canvas</h1>
    </header>
    <hr />
        <?php 
        $current = "smiley";
    ?>
    <?php include '../php/templateHeader.php';?>
    <hr />
    <section>
        <canvas id="canvas" width="650" height="650"></canvas>
        <button id="smile" class="smile">Make Me Sad</button>
    </section>
    <hr />
<?php include '../php/templateFooter.php'; ?>
        <script src="jsmouse.js"></script>
</body>

</html>