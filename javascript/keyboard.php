<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Keyboard Mario</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="keyboard.css">
</head>

<body>
    <header>
        <h1>Keyboard Mario</h1>
    </header>
    <hr />
    <?php 
        $current = "keyboard";
    ?>
    <?php include '../php/templateHeader.php';?>
    <hr />
    <section>
        <canvas id="canvas" width="650" height="650"></canvas>
        <img id="mario" src="../images/mario.png" alt="Mario">
    </section>
    <hr />
<?php include '../php/templateFooter.php'; ?>
        <script src="jskeyboard.js"></script>
</body>

</html>