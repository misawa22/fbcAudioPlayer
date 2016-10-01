var audio, playbtn;
function initAudioPlayer() {
    audio = new Audio();
    audio.src = "http://www.friendshipbc.net/uploads/2/6/9/7/2697765/3_15_2015_am_rick_johnson.mp3";
    audio.pause();
}
window.addEventListener("load", initAudioPlayer);