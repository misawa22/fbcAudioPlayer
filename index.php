<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<div class="player">
    <ul>
        <div class="sermon">
            <li>
                <p>
                    <label for="audiofile"></label><input type="text" id="audiofile" size="80" value="http://www.friendshipbc.net/uploads/2/6/9/7/2697765/3_15_2015_am_rick_johnson.mp3" />
                </p>
            </li>
        </div>
        <li class="cover"><img src="images/logo.png"/></li>
        <li class="info">
            <h1>Pastor Rick</h1>
            <h4>Scripture Here</h4>
            <h2>How to Reap for a Spiritual Harvest</h2>
            <div class="button-items">
                <audio id="myaudio">
                    HTML5 audio not supported
                </audio>
                <canvas id="canvas" width="425" height="20">
                    canvas not supported
                </canvas>
                <p id="timer">0:00</p>
                <div class="controls">
                    <span class="expend"><svg class="step-backward" viewBox="0 0 25 25" xml:space="preserve">
                  <g><polygon points="4.9,4.3 9,4.3 9,11.6 21.4,4.3 21.4,20.7 9,13.4 9,20.7 4.9,20.7"></polygon></g>
               </svg></span>

                <svg id="play" onclick="playAudio();" viewBox="0 0 25 25" xml:space="preserve">
               <defs><rect x="-49.5" y="-132.9" width="446.4" height="366.4"></rect></defs>
                    <g><circle fill="none" cx="12.5" cy="12.5" r="10.8"></circle>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.7,6.9V18c0,0,0.2,1.4,1.8,0l8.1-4.8c0,0,1.2-1.1-1-2L9.8,6.5 C9.8,6.5,9.1,6,8.7,6.9z"></path>
                    </g>
                </svg>


               <svg id="pause" onclick="playAudio();" viewBox="0 0 25 25" xml:space="preserve">
                  <g>
                      <rect x="6" y="4.6" width="3.8" height="15.7"></rect>
                      <rect x="14" y="4.6" width="3.9" height="15.7"></rect>
                  </g>
               </svg>

                    <!--<button id="play" onclick="playAudio();" disabled>
                        Play
                    </button>-->
                    <button id="rewind" onclick="rewindAudio();" disabled>
                        Rewind
                    </button>
                    <button id="forward" onclick="forwardAudio();" disabled>
                        Fast forward
                    </button>
                    <button id="restart" onclick="restartAudio();" disabled>
                        Restart
                    </button>
                </div>
            </div>
        </li>
    </ul>
</div>

<script src="js/main2.js"></script>
<script type="text/javascript">
    //Check for support and enable buttons
    if (window.HTMLAudioElement) {
        document.getElementById("play").disabled = false;
        document.getElementById("rewind").disabled = false;
        document.getElementById("forward").disabled = false;
        document.getElementById("restart").disabled = false;
    }
</script>