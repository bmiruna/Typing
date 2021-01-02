<?php require_once '../server.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Typing</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--CSS-->
	<style>
		.corect{
			color: #04AF71;
		}

		.gresit {
			color: red;
		}

		span {
			font-size: 15.5px;
			font-weight:bold;
        }
        input:focus{
            border: none;
            background: transparent;
        }
        input {
            border: none;
            background: transparent;
        }
	</style>
    <link rel="stylesheet" href="style.css"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/easytimer@1.1.1/dist/easytimer.min.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

 <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="keyboard.php">Typing</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                     <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../practice.php">Practice</a>
                </li>
            </ul>
            <ul class="navbar-nav justify-content-end">
            <?php if(!isset($_SESSION['id'])){?>
                    <li class="nav-item">
                        <a class="nav-link" href="../signin.php">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../register.php">Sign up</a>
                    </li>
                <?php } else{ ?>
                    <li class="nav-item">
                        <a href="keyboard.php.php?logout=1" class="nav-link">Logout</a>
                    </li>
                <?php }?>
            </ul>
      </div>
    </nav>
    <div class = "infobuttons">
        <button type="button" class="btn btn-info" id="beginner" aria-pressed="true">Beginner</button> 
        <button type="button" class="btn btn-info" id="intermediate" aria-pressed="true">Intermediate</button> 
        <button type="button" class="btn btn-info" id="advanced" aria-pressed="true">Advanced</button>
		<button type="button" class="btn btn-info" id="refresh" aria-pressed="true">Refresh</button>
    </div>
    <div class="elem">
        <div>Timer:<p id="time" name="time">00:00:00</p></div>
        <div>Score:<p id="score" name="score">0</p></div>

        <form action="" method="POST" class="hiddenForm" name="scoring" id="scoring">
            <input type="hidden" name="timer" id="timer" value="">
            <input type="hidden" name="scor" id="scor" value="">
           

            <input type="submit" class="btn btn-info" id="save" name="save-btn" value="Save">
        </form>

    </div>
    <div class = "container">
            <p id="text"></p>
            <div class = "row one">
                <button id="Backquote">~<br>`</button>
                <button id="Digit1">!<br>1</button>
                <button id="Digit2">@<br>2</button>
                <button id="Digit3">#<br>3</button>
                <button id="Digit4">$<br>4</button>
                <button id="Digit5">%<br>5</button>
                <button id="Digit6">^<br>6</button>
                <button id="Digit7">&<br>7</button>
                <button id="Digit8">*<br>8</button>
                <button id="Digit9">(<br>9</button>
                <button id="Digit0">)<br>0</button>
                <button id="Minus">_<br>-</button>
                <button id="Equal">+<br>=</button>
                <button id="Backspace">backspace</button>
            </div>
            <div class="row two">
                <button id="Tab">tab</button>
                <button id="KeyQ">Q</button>
                <button id="KeyW">W</button>
                <button id="KeyE">E</button>
                <button id="KeyR">R</button>
                <button id="KeyT">T</button>
                <button id="KeyY">Y</button>
                <button id="KeyU">U</button>
                <button id="KeyI">I</button>
                <button id="KeyO">O</button>
                <button id="KeyP">P</button>
                <button id="BracketLeft">{<br>[</button>
                <button id="BracketRight">}<br>]</button>
                <button id="Backslash">|<br>\</button>
            </div>
            <div class = "row three">
                <button id="CapsLock">caps lock</button>
                <button id="KeyA">A</button>
                <button id="KeyS">S</button>
                <button id="KeyD">D</button>
                <button id="KeyF">F</button>
                <button id="KeyG">G</button>
                <button id="KeyH">H</button>
                <button id="KeyJ">J</button>
                <button id="KeyK">K</button>
                <button id="KeyL">L</button>
                <button id="Semicolon">:<br>;</button>
                <button id ="Quote">"<br>'</button>
                <button id="Enter">enter</button>
            </div>
            <div class="row four">
                <button id="ShiftLeft">shift</button>
                <button id="KeyZ">Z</button>
                <button id="KeyX">X</button>
                <button id="KeyC">C</button>
                <button id="KeyV">V</button>
                <button id="KeyB">B</button>
                <button id="KeyN">N</button>
                <button id="KeyM">M</button>
                <button id="Comma"><<br>,</button>
                <button id="Period">><br>.</button>
                <button id="Slash">?<br>/</button>
                <button id="ShiftRight">shift</button>
            </div>
            <div class="row five">
                <button id="ControlLeft">ctrl</button>
                <button id="MetaLeft">Win</button>
                <button id="AltLeft">alt</button>
                <button id="Space">space</button>
                <button id="AltRight">alt</button>
                <button id="MetaRight">Win</button>
                <button id="ControlRight">ctrl</button>
            </div>
        </div>
		<script src="tastatura.js"></script>
    </body>
</html>
