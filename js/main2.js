//Buttons
var state = 'stop';

function buttonBackPress() {
    console.log("button back invoked.");
}

function buttonForwardPress() {
    console.log("button forward invoked.");
}

function buttonRewindPress() {
    console.log("button rewind invoked.");
}

function buttonFastforwardPress() {
    console.log("button fast forward invoked.");
}

function buttonPlayPress() {
    if(state=='stop'){
        state='play';
        var button = d3.select("#button_play").classed('btn-success', true);
        button.select("i").attr('class', "fa fa-pause");
    }
    else if(state=='play' || state=='resume'){
        state = 'pause';
        d3.select("#button_play i").attr('class', "fa fa-play");
    }
    else if(state=='pause'){
        state = 'resume';
        d3.select("#button_play i").attr('class', "fa fa-pause");
        var playButton = document.getElementById("play");
        var pauseButton = document.getElementById("pause");
        pauseButton.style.visibility = "hidden";
//display and update progress bar
        function progressBar() {
            var oAudio = document.getElementById('myaudio');
    }
    console.log("button play pressed, play was "+state);
}

function buttonStopPress(){
    state = 'stop';
    var button = d3.select("#button_play").classed('btn-success', false);
    button.select("i").attr('class', "fa fa-play");
    console.log("button stop invoked.");
}


//Global variable to track current file name
var currentFile = "";
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