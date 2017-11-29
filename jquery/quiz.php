<!DOCTYPE html>
<html lang="en">

<head>
    <title>JQuery Quiz</title>
    <meta charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="quiz.css">
</head>

<body>
    <header>
        <h1>JQuery Quiz</h1>
    </header>
    <hr />
    <?php 
        $current = "quiz";
    ?>
    <?php include '../php/templateHeader.php';?>
    <hr />
    <section>
        <div id="gameOver">
            <h1>Game Over</h1>
            <div id="game_stats">PlaceHolder</div>
        </div>
    </section>
    <section>
        <div id="quiz">
            <aside id="history">
                <div id="history_head">
                    <h2>Question History</h2>
                </div>
            </aside>
            <div id="content">
                <h2>Question</h2>
                <div id="question">
                    <div>...</div>
                </div>
                <h2>Answer</h2>
                <div id="answer">
                    <div></div>
                    <form></form>
                    <button id="checkAnswer">Check Answer</button>
                </div>
                <div id="questions">
                    <div id="qn1">House Stark</div>
                    <div id="qn2">House Lannister</div>
                    <div id="qn3">House Targaryen</div>
                    <div id="qn4">House Baratheon</div>
                </div>
                <div id="high_score">High Score: </div>
            </div>
        </div>
    </section>
    <hr />
<?php include '../php/templateFooter.php'; ?>
        <script type="text/javascript" src='quiz.js'></script>
</body>

</html>