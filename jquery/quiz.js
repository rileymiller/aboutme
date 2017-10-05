var question_selected = false;
var answer_selected = false;
var q1_displayed = false;
var q2_displayed = false;
var q3_displayed = false;
var q4_displayed = false;
var current_q = '';
var game_over = false;
var num_questions = 4;
var num_correct = 0;
var best_score = '';
$('#qn1').hover(function() {
        console.log('hovering over a question');
        toggle('#qn1', true);
    },
    function() {

        console.log('leaving hover');
        toggle('#qn1', false);

    });

$('#qn2').hover(function() {
        console.log('hovering over a question');
        toggle('#qn2', true);
    },
    function() {
        console.log('leaving hover');
        toggle('#qn2', false);
    });

$('#qn3').hover(function() {
        console.log('hovering over a question');
        toggle('#qn3', true);
    },
    function() {
        console.log('leaving hover');
        toggle('#qn3', false);
    });

$('#qn4').hover(function() {
        console.log('hovering over a question');
        toggle('#qn4', true);
    },
    function() {
        console.log('leaving hover');
        toggle('#qn4', false);
    });

$('#checkAnswer').hover(function() {
    $(this).css('cursor', 'pointer');
    $(this).css('background-color', '#F7B733');
    $(this).css('color', '#FC4A1A');
    $(this).css('border', '1px #FC4A1A solid');
}, function() {
    $(this).css('background-color', '#FC4A1A');
    $(this).css('color', '#F7B733');
    $(this).css('border', '1px #F7B733 solid');
});

$('#checkAnswer').click(function() {
    if (!question_selected) {
        alert('You must select a question!');
        return;
    }
    answer_selected = radio_selected();
    if (!answer_selected) {
        alert('You must select an answer!');
        return;
    }
    if (current_q === 'qn1') {
        console.log('checkAnswer qn1 is current_q');
        //check if answer selected
        //consider writing a function that return true or false for selection
        var rad = getRadio();
        console.log('rad: ' + rad);
        if (rad == 'true') {
            num_questions--;
            console.log('John Snow is not a Stark');
            $('div#history_head').append('<p id=\"qn1_result\">House Stark: Red Wedding :-(</p>');
            clearContent();
            removeQuestion('#qn1');
        } else {
            num_questions--;
            num_correct++;
            console.log('Yay you got the Stark question right');
            $('div#history_head').append('<p id=\"qn1_result\">House Stark: King in the North :-)</p>');
            clearContent();
            removeQuestion('#qn1');
        }
    } else if (current_q === 'qn2') {
        console.log('checkAnswer qn2 is current_q');
        //check if answer selected
        //consider writing a function that return true or false for selection
        var rad = getRadio();
        console.log('rad: ' + rad);
        if (rad == 'true') {
            num_questions--;
            num_correct++;
            console.log('Jaime loves Cersei');
            $('div#history_head').append('<p id=\"qn1_result\">House Lannister: Rains of Castermere :-)</p>');
            clearContent();
            removeQuestion('#qn2');
        } else {
            num_questions--;
            console.log('Bran died because of you');
            $('div#history_head').append('<p id=\"qn1_result\">House Lannister: Bran Fell :-(</p>');
            clearContent();
            removeQuestion('#qn2');
        }
    } else if (current_q === 'qn3') {
        console.log('checkAnswer qn3 is current_q');
        //check if answer selected
        //consider writing a function that return true or false for selection
        var rad = getRadio();
        console.log('rad: ' + rad);
        if (rad == 'true') {
            num_questions--;
            num_correct++;
            console.log('Dany rules');
            $('div#history_head').append('<p id=\"qn1_result\">House Targaryen: Fire and Blood :-)</p>');
            clearContent();
            removeQuestion('#qn3');
        } else {
            num_questions--;
            console.log('King Aegon gotcha');
            $('div#history_head').append('<p id=\"qn1_result\">House Targaryen: Viserion Died :-(</p>');
            clearContent();
            removeQuestion('#qn3');
        }
    } else if (current_q === 'qn4') {
        console.log('checkAnswer qn4 is current_q');
        //check if answer selected
        //consider writing a function that return true or false for selection
        var rad = getRadio();
        console.log('rad: ' + rad);
        if (rad == 'true') {
            num_questions--;
            console.log('Jaime loves Cerseiq4');
            $('div#history_head').append('<p id=\"qn1_result\">House Baratheon: RIP Robert :-(</p>');
            clearContent();
            removeQuestion('#qn4');
        } else {
            num_questions--;
            num_correct++;
            console.log('Joffrey died because of youq4');
            $('div#history_head').append('<p id=\"qn1_result\">House Baratheon: Joffrey gets Married:-)</p>');
            clearContent();
            removeQuestion('#qn4');
        }
    }
});

function gameOver() {
    $('div#gameOver').css('visibility', 'visible');
    $('div#game_stats').text("You answered " + num_correct + "/4 questions correctly");
}


function removeQuestion(id) {

    $('div' + id).css('visibility', 'hidden');

    if (num_questions === 0){
        gameOver();
    }
}

function clearContent() {
    question_selected = false;
    answer_selected = false;
    current_q = 'q';
    $('div#question div').text('...');
    $('div#answer form').empty();
}

function radio_selected() {
    if ($('.radio_button').is(':checked')) {
        console.log('radio_button is checked');
        return true;
    } else {
        console.log('radio_button not checked');
        return false;
    }
};

function getRadio() {
    var val = $('.radio_button:checked').val();
    console.log(val);
    return val;
}

$('div#gameOver').dblclick(function() {
    console.log('gameover double clicked, animation triggered');
//insert animation here
    /*
    var div = $('div#gameOver');
    div.animate({height: '600px', opacity: '.4'}, 'slow');
    div.animate({width: '600px', opacity: '.8'}, 'slow');
    div.animate({height: '200px', opacity: '.4'}, 'slow');
    div.animate({width: '200px', opacity: '.8'}, 'slow');*/
    var div = $('div#gameOver');
    div.animate({
        opacity: 0.1
    }, 1500);
    setTimeout(function() {resetGame();}, 1500);
    //need some type of jQuery animation to be implemented on dblclick
    
    
    
    //$('div#gameOver').css('visibility', 'hidden');
});

function updateBestScore() {
    if(best_score === NaN){
        console.log('first time best_score is updated');
        best_score = num_correct;
        $('div#high_score').text('High Score: ' + best_score + "/4");
    } else{
        if(num_correct > best_score){
            console.log('NEW HIGH SCORE!!');
            best_score = num_correct;
            $('div#high_score').text('High Score: ' + best_score + "/4");
        }
    }
}

function resetGame(){
    updateBestScore();
    $('div#history_head').empty();
    $('div#history_head').append('<h2>Question History</h2>');
    num_correct = 0;
    num_questions = 4;
    question_selected = false;
    q1_displayed = false;
    q2_displayed= false;
    q3_displayed = false;
    q4_displayed = false;
    current_q = ' ';
    answer_selected = false;
    $('div#question div').text('...');
    $('div#gameOver').css('opacity', '1.0');
    $('div#gameOver').css('visibility', 'hidden');
    /*change visibility instead of creating and removing elements*/
    /*
    $('div#questions').append('<div id=\"qn1\">House Stark</div>')
    .append('<div id=\"qn2\">House Lannister</div>')
    .append('<div id=\"qn3\">House Targaryen</div>')
    .append('<div id=\"qn4\">House Baratheon</div>');*/
    for(var i = 1; i < 5; i++){
        $('div#qn'+i).css('visibility', 'visible');
    }

    for (var i = 1; i < 5; i++){
        $('div#qn' + i).toggleClass('hover');
    }
}

$('#qn1').click(function() {
    if (!question_selected) {
        console.log('qn1 clicked');
        current_q = $(this).attr('id');
        question_selected = true;
        console.log(current_q);
        if (!q1_displayed) {
            q1_displayed = true;
            $('#question div').text("John Snow is a Stark.");

            $('#answer form').append("<input type=\"radio\" class=\"radio_button\" name=\"answer\" value=\"true\">True</br>");

            $('#answer form').append("<input type=\"radio\"  class=\"radio_button\" name=\"answer\" value=\"false\">False</br>");
        }
    } else {
        alert('must answer current question.');
    }
});

$('#qn2').click(function() {
    if (!question_selected) {
        console.log('qn2 clicked');
        current_q = $(this).attr('id');
        question_selected = true;
        console.log(current_q);
        if (!q2_displayed) {
            q2_displayed = true;
            $('#question div').text("Jaime has the hots for Cersei.");

            $('#answer form').append("<input type=\"radio\" class=\"radio_button\" name=\"answer\" value=\"true\">True</br>");

            $('#answer form').append("<input type=\"radio\"  class=\"radio_button\" name=\"answer\" value=\"false\">False</br>");
        }
    } else {
        alert('must answer current question.');
    }
});

$('#qn3').click(function() {
    if (!question_selected) {
        console.log('qn3 clicked');
        current_q = $(this).attr('id');
        question_selected = true;
        console.log(current_q);
        if (!q3_displayed) {
            q3_displayed = true;
            $('#question div').text("Daenerys is the Mother of Dragons.");

            $('#answer form').append("<input type=\"radio\" class=\"radio_button\" name=\"answer\" value=\"true\">True</br>");

            $('#answer form').append("<input type=\"radio\"  class=\"radio_button\" name=\"answer\" value=\"false\">False</br>");
        }
    } else {
        alert('must answer current question.');
    }
});

$('#qn4').click(function() {
    if (!question_selected) {
        console.log('qn4 clicked');
        current_q = $(this).attr('id');
        question_selected = true;
        console.log(current_q);
        if (!q4_displayed) {
            q4_displayed = true;
            $('#question div').text("Joffrey is a Baratheon.");

            $('#answer form').append("<input type=\"radio\" class=\"radio_button\" name=\"answer\" value=\"true\">True</br>");

            $('#answer form').append("<input type=\"radio\"  class=\"radio_button\" name=\"answer\" value=\"false\">False</br>");
        }
    } else {
        alert('must answer current question.');
    }
});

function toggle(element, display) {

    if (!question_selected) {
        $(element).toggleClass('hover');
        $(element).css('cursor', 'pointer');
        if (display) {
            $('div#question div').text('Click to see the question.');
        } else {
            $('div#question div').text('...');
        }
    }
}