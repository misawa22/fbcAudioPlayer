var audio,
    playbtn,
    mutebtn,
    seekslider,
    volumeslider,
    seeking=false,
    seekto,
    curtimetext,
    durtimetext;
function initAudioPlayer(){
    audio = new Audio();
    audio.src = "http://www.friendshipbc.net/uploads/2/6/9/7/2697765/3_15_2015_am_rick_johnson.mp3";
    audio.loop = true;
    audio.play();
    // Set object references
    playbtn = document.getElementById("playpausebtn");
    mutebtn = document.getElementById("mutebtn");
    seekslider = document.getElementById("seekslider");
    volumeslider = document.getElementById("volumeslider");
    curtimetext = document.getElementById("curtimetext");
    durtimetext = document.getElementById("durtimetext");
    // Add Event Handling
    playbtn.addEventListener("click",playPause);
    mutebtn.addEventListener("click", mute);
    seekslider.addEventListener("mousedown", function(event){ seeking=true; seek(event); });
    seekslider.addEventListener("mousemove", function(event){ seek(event); });
    seekslider.addEventListener("mouseup",function(){ seeking=false; });
    volumeslider.addEventListener("mousemove", setvolume);
    audio.addEventListener("timeupdate", function(){ seektimeupdate(); });
    // Functions
    function playPause(){
        if(audio.paused){
            audio.play();
            playbtn.style.background = "url(images/play-button-w.png) no-repeat";
        } else {
            audio.pause();
            playbtn.style.background = "url(images/pause-w.png) no-repeat";
        }
    }
    function mute(){
        if(audio.muted){
            audio.muted = false;
            mutebtn.style.background = "<i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i>";
        } else {
            audio.muted = true;
            mutebtn.style.background = "<i class=\"fa fa-volume-off\" aria-hidden=\"true\"></i>";
        }
    }
    function seek(event){
        if(seeking){
            seekslider.value = event.clientX - seekslider.offsetLeft;
            seekto = audio.duration * (seekslider.value / 100);
            audio.currentTime = seekto;
        }
    }
    function setvolume(){
        audio.volume = volumeslider.value / 100;
    }
    function seektimeupdate(){
        var nt = audio.currentTime * (100 / audio.duration);
        seekslider.value = nt;
        var curmins = Math.floor(audio.currentTime / 60);
        var cursecs = Math.floor(audio.currentTime - curmins * 60);
        var durmins = Math.floor(audio.duration / 60);
        var dursecs = Math.floor(audio.duration - durmins * 60);
        if(cursecs < 10){ cursecs = "0"+cursecs; }
        if(dursecs < 10){ dursecs = "0"+dursecs; }
        if(curmins < 10){ curmins = "0"+curmins; }
        if(durmins < 10){ durmins = "0"+durmins; }
        curtimetext.innerHTML = curmins+":"+cursecs;
        durtimetext.innerHTML = durmins+":"+dursecs;
    }
}
window.addEventListener("load", initAudioPlayer);