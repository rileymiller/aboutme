<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Riley Miller</title>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Riley Miller">
    <link rel="stylesheet" type="text/css" href="aboutme.css">
</head>

<body>
    <header>
        <h1 id="name" style="text-align: center">Riley Miller</h1>
        <p style="text-align: center;">
            <a href="#about">
    <img src="../images/riley.jpg" alt="Pic of Riley" />
    </a>
        </p>
    </header>
    <hr>
    <section>
        <div class="navBar">
            <a href="../index.html">Home</a>
            <p>About Me</p>
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
            <a href="../jquery/quiz.html">JQuery Quiz</a>
        </div>
    </section>
    <!-- The about portion below is really cool!!!!!!!! -->
    <section>
        <div class="seeable">
            <article>
                <h2>About Riley</h2>
                <p>My name is Riley Miller and I'm a junior in CS at Mines, pursuing a McBride Honors minor in Public Affairs. This summer I hiked my first 14er... and nearly died. My favorite website is <a href="http://sunspot.ninja/" style="text-decoration: none; color: none;">http://sunspot.ninja/</a> because it was built by a friend of mine that I've had the pleasure to work with the past two summers and was built with some really neat tech (React Native). His web/app development inspired me to pursue a degree in CS so one day I can take my ideas and bring them to life. <a href="#facts">Click here for some FACTS</a> In terms of my previous experience, I've interned the past two summer with The Regis Company as a Software Development Intern (2016) and the Intern Lead (2017), working with primarily front-end technologies and Continuous Integration. Can't wait to get started!</p>
                <h3>Things I like</h3>
                <ul>
                    <li>Game of Thrones</li>
                    <li>Sports</li>
                    <li>Web Development</li>
                    <li>Vanilla Ice Cream</li>
                </ul>
            </article>
        </div>
    </section>
    <hr />
    <section>
        <h2 id="tables">Tables</h2>
        <table id="contacts">
            <caption>Contacts</caption>
            <thead>
                <tr>
                    <th>Name</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Rich McCourty</td>
                    <td colspan="4">1800HELPNOW</td>
                </tr>
                <tr>
                    <td>Eliis Michels</td>
                    <td colspan="4">2342133331</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Call em up</td>
                </tr>
            </tfoot>
        </table>
        <table id="socialsec">
            <caption>Social Security Numbers</caption>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Social Security</th>
                    <th>Pin</th>
                    <th>House Keys</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nathaniel Hawthorne</td>
                    <td>682-78-5997</td>
                    <td>0021</td>
                    <td rowspan="3">No keys</td>
                </tr>
                <tr>
                    <td>James Harrison</td>
                    <td>875-41-7785</td>
                    <td>3021</td>
                </tr>
                <tr>
                    <td>Nick Graham</td>
                    <td>687-87-5541</td>
                    <td>7845</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">UhOh</td>
                </tr>
            </tfoot>
        </table>
        <br>
        <table id="hairylegs">
            <caption>Hairy leg count</caption>
            <thead>
                <tr>
                    <th>Who</th>
                    <th>Hairy Legs?</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Josh Urbonas</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <td>Grant Stewart</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>Riley Miller</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <td>Zach Peterson</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <td>Josh Odom</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>Cam Mayberry</td>
                    <td>No</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">GROSSSSSSSSS</td>
                </tr>
            </tfoot>
        </table>
    </section>
    <hr />
    <section>
        <article>
            <h2 id="facts">Facts</h2>
            <p>The
                <abbr title="National Collegiate Athletic Association">NCAA</abbr> is corrupt.</p>
            <h3>Swaggy font format</h3>
            <p>Superman thinks <sup>this is <span style="font-weight: bold">super</span>script</sup> ain't that just super.</p>
            <p>Suberman thinks <sub>this is <strong>sub</strong>script</sub> ain't that just subperb ;)</p>
            <hr />
            <p>In my glory days as an amateur Java supercoder I used to write print statements.. they were lit
                <br /> <code>System.out.println("This is the coolest thing of my entire life duuuuuuuuuuuuddddeee");</code>
                <br /> Awesome, right?
                <br /> Ok, it was only sorta awesome, but awesome nontheless.</p>
        </article>
    </section>
    <hr />
    <section>
        <article>
            <h2>Dope Quote</h2>
            <p>A great man once said
                <q>Computer Science is just a bunch of 1s and 0s</q>
                <del>-Wayne Gretzky</del> -Zach Peterson</p>
            <p style="font-weight: bold;">You're not wrong Zach</p>
            <img src="../images/eyeroll.webp" alt="eyeroll" />
            <h3>Symbol(s)</h3>
            <p>Discrete math is &not; cool</p>
        </article>
    </section>
    <hr />
    <section>
        <h2>Mailing</h2>
        <address>Written by <a href="mailto:rileymiller@mymail.mines.edu">Riley Miller</a>.
            <br /> Mail to:
            <br /> Riley Miller
            <br /> 6920 BS Ave.
            <br /> Golden, CO 80401
            <br /> 'Merica
        </address>
    </section>
    <footer>
        <ul>
            <li><img src="../images/css_pass.png" alt="css pass"></li>
            <li><img src="../images/html5_pass.png" alt="html5 pass" id='accessibility'></li>
            <li><img src="../images/wcag2A_pass.png" alt="accessibility pass"></li>
        </ul>
    </footer>
</body>

</html>