//Global variable to track current file name
var currentFile = "";
var playButton = document.getElementById("play");
var pauseButton = document.getElementById("pause");
pauseButton.style.visibility = "hidden";
//display and update progress bar
function progressBar() {
    var oAudio = document.getElementById('myaudio');
    //get current time in seconds
    var elapsedTime = Math.round(oAudio.currentTime);
    //update the progress bar
    if (canvas.getContext) {
        var ctx = canvas.getContext("2d");
        //clear canvas before painting
        ctx.clearRect(0, 0, canvas.clientWidth, canvas.clientHeight);
        ctx.fillStyle = "#8c9aef";
        var fWidth = (elapsedTime / oAudio.duration) * (canvas.clientWidth);
        if (fWidth > 0) {
            ctx.fillRect(0, 0, fWidth, canvas.clientHeight);
        }
    }
}
//Play and pause function
function playAudio() {
    try {
        //return objects we need to work with
        var oAudio = document.getElementById('myaudio');
        var btn = document.getElementById('play');
        var audioURL = document.getElementById('audiofile');

        //Skip loading if current file hasn't changed.
        if (audioURL.value !== currentFile) {
            oAudio.src = audioURL.value;
            currentFile = audioURL.value;
        }

        //Tests the paused attribute and set state.
        if (oAudio.paused) {
            oAudio.play();
            btn.textContent = "Pause";
            btn.style.visibility = "hidden";
            pauseButton.style.visibility = "visible";
        }
        else {
            oAudio.pause();
            btn.textContent = "Play";
            pauseButton.style.visibility = "hidden";
            btn.style.visibility = "visible";
        }
    }
    catch (e) {
        // Fail silently but show in F12 developer tools console
        if (window.console && console.error("Error:" + e));
    }
}

/*function playAudio() {
 try {
 //return objects we need to work with
 var oAudio = document.getElementById('myaudio');
 var audioURL = document.getElementById('audiofile');
 var playButton = document.getElementById("play");
 var pauseButton = document.getElementById("pause");


 //Skip loading if current file hasn't changed.
 if (audioURL.value !== currentFile) {
 oAudio.src = audioURL.value;
 currentFile = audioURL.value;
 }
 //Tests the paused attribute and set state.
 if (oAudio.paused) {
 oAudio.play();
 playButton.style.visibility = "hidden";
 pauseButton.style.visibility = "visible";
 }
 else if (oAudio.play) {
 oAudio.pause();
 playButton.style.visibility = "visible";
 pauseButton.style.visibility = "hidden";
 }
 }
 catch (e) {
 // Fail silently but show in F12 developer tools console
 if (window.console && console.error("Error:" + e));
 }
 }
 */

/*playButton = function() {

    playButton.style.visibility = "hidden";
    pause.style.visibility = "visible";
}

pauseButton = function() {

    playButton.style.visibility = "visible";
    pause.style.visibility = "hidden";
}*/

//Rewinds the audio file by 30 seconds.
function rewindAudio() {
    try {
        var oAudio = document.getElementById('myaudio');
        oAudio.currentTime -= 30.0;
    }
    catch (e) {
        // Fail silently but show in F12 developer tools console
        if (window.console && console.error("Error:" + e));
    }
}

//Fast forwards the audio file by 30 seconds.
function forwardAudio() {
    try {
        var oAudio = document.getElementById('myaudio');
        oAudio.currentTime += 30.0;
    }
    catch (e) {
        // Fail silently but show in F12 developer tools console
        if (window.console && console.error("Error:" + e));
    }
}

//Restart the audio file to the beginning.

function restartAudio() {
    try {
        var oAudio = document.getElementById('myaudio');
        oAudio.currentTime = 0;
    }
    catch (e) {
        // Fail silently but show in F12 developer tools console
        if (window.console && console.error("Error:" + e));
    }
}

//added events

function initEvents() {
    var canvas = document.getElementById('canvas');
    var oAudio = document.getElementById('myaudio');

    //set up event to toggle play button to pause when playing
    oAudio.addEventListener("playing", function() {
        document.getElementById("play").textContent = "Pause";
    }, true);

    //set up event to toggle play button to play when paused
    oAudio.addEventListener("pause", function() {
        document.getElementById("play").textContent = "Play";
    }, true);
    //set up event to update the progress bar
    oAudio.addEventListener("timeupdate", progressBar, true);
    //set up mouse click to control position of audio
    canvas.addEventListener("click", function(e) {
        //this might seem redundant, but this these are needed later - make global to remove these
        var oAudio = document.getElementById('myaudio');
        var canvas = document.getElementById('canvas');

        if (!e) {
            e = window.event;
        } //get the latest windows event if it isn't set
        try {
            //calculate the current time based on position of mouse cursor in canvas box
            oAudio.currentTime = oAudio.duration * (e.offsetX / canvas.clientWidth);
        }
        catch (err) {
            // Fail silently but show in F12 developer tools console
            if (window.console && console.error("Error:" + err));
        }
    }, true);
}
//this event gets fired when a page has loaded
window.addEventListener("DOMContentLoaded", initEvents, false);