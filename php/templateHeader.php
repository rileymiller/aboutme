<?php $PATH = "http://luna.mines.edu/rileymiller/website"; ?>
   <section>
        <div class="navBar">
             <a <?php if($current == 'home'){echo 'class="current"';} ?> href="<?php echo $PATH;?>/index.php">Home</a>
            <a <?php if($current == 'aboutme'){echo 'class="current"';} ?> href="<?php echo $PATH;?>/aboutme/aboutme.php">About Me</a>
            <div class="dropdown">
                <button class="dropbtn">CSS Tutorials</button>
                <div class="dropdown-content">
                    <a href="<?php echo $PATH;?>/csstutorial/turtlecoders.html">Turtle Coders</a>
                    <a href="<?php echo $PATH;?>/csstutorial/posEx.html">Position Example 2</a>
                    <a href="<?php echo $PATH;?>/csstutorial/floatExBoxes.html">The Box Model</a>
                    <a href="<?php echo $PATH;?>/csstutorial/clearEx.html">Float and Clear</a>
                </div>
            </div>
            <a <?php if($current == 'smiley'){echo 'class="current"';} ?> href="<?php echo $PATH;?>/javascript/smiley.php">Smile Interaction</a>
            <a <?php if($current == 'keyboard'){echo 'class="current"';} ?> href="<?php echo $PATH;?>/javascript/keyboard.php">Keyboard Mario</a>
            <a <?php if($current == 'quiz'){echo 'class="current"';} ?> href="<?php echo $PATH;?>/jquery/quiz.php">JQuery Quiz</a>
            <div class="dropdown">
                <button class="dropbtn">PHP</button>
                <div class="dropdown-content">
                    <a href="<?php echo $PATH;?>/php/form.php">Form</a>
                    <a href="<?php echo $PATH;?>/php/io.php">File I/O</a>
                    <a href="<?php echo $PATH;?>/php/vieworders.php">View Orders</a>
                </div>
            </div>
        </div>
    </section>