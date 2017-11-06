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
    <section>
        <div class="navBar">
            <a href="../index.html">Home</a>
            <a href="../aboutme/aboutme.html">About Me</a>
            <div class="dropdown">
                <button class="dropbtn">CSS Tutorials</button>
                <div class="dropdown-content">
                    <a href="../csstutorial/turtlecoders.html">Turtle Coders</a>
                    <a href="../csstutorial/posEx.html">Position Example 2</a>
                    <a href="../csstutorial/floatExBoxes.html">The Box Model</a>
                    <a href="../csstutorial/clearEx.html">Float and Clear</a>
                </div>
            </div>
            <a href="../javascript/smiley.html">Smile Interaction</a>
            <a href="../javascript/keyboard.html">Keyboard Mario</a>
            <p>JQuery Quiz</p>
        </div>
    </section>
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
    <footer>
        <ul>
            <li><img src="../images/css_pass.png" alt="css pass"></li>
            <li><img src="../images/html5_pass.png" alt="html5 pass" id='accessibility'></li>
            <li><img src="../images/wcag2A_pass.png" alt="accessibility pass"></li>
        </ul>
        <script type="text/javascript" src='quiz.js'></script>
    </footer>
</body>

</html>