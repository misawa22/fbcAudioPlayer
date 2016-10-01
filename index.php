<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <div id="audio_player">
            <div id="audio_controls">
                <button id="playpausebtn"></button>
                <input id="seekslider" type="range" min="0" max="100" value="0" step="1">
                <div id="timebox">
                    <span id="curtimetext">00:00</span> / <span id="durtimetext">00:00</span>
                </div>
                <button id="mutebtn"></button>
                <input id="volumeslider" type="range" min="0" max="100" value="100" step="1">
            </div>
        </div>
        <script src="js/main.js"></script>
    </body>
</html>