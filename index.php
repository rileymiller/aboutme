<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Riley Miller</title>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Riley Miller">
    <link rel="stylesheet" type="text/css" href="csci445.css">
</head>

<body>
    <header>
        <h1 id="name" style="text-align: center">Riley Miller</h1>
        <p style="text-align: center;">
            <img src="images/riley.jpg" alt="Pic of Riley" />
        </p>
    </header>
    <hr />
    <?php 
        $current = "home";
    ?>
    <?php include 'php/templateHeader.php';?>
    <hr />
    <section>
        <div class="introtran">
            <p class="center"></p>
            <h1 id="intro">Hey Everybody</h1>
        </div>
        <p id="introP">welcome to my page, this is the root home page of my website that I'm building for Web Programming!</p>
    </section>
    <hr />
    <section>
        <div class="flip-container">
            <div class="mailrot">
                <div class="front">
                    <h2>Mailing</h2>
                    <address>Written by <a href="mailto:rileymiller@mymail.mines.edu">Riley Miller</a>.
                        <br /> Mail to:
                        <br /> Riley Miller
                        <br /> 6920 BS Ave.
                        <br /> Golden, CO 80401
                        <br /> 'Merica
                    </address>
                </div>
                <div class="back">
                    <h2>Github /rileymiller</h2>
                </div>
            </div>
        </div>
        <div class="smallFooter">
            <h2>Mailing</h2>
            <address>Written by <a href="mailto:rileymiller@mymail.mines.edu">Riley Miller</a>.
                <br /> Mail to:
                <br /> Riley Miller
                <br /> 6920 BS Ave.
                <br /> Golden, CO 80401
                <br /> 'Merica
            </address>
        </div>
    </section>
    <hr />
    <?php include 'php/templateFooter.php'; ?>
</body>
</html>