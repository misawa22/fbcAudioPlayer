<?php
## MySQL Query Function:

// Load the MySQL Connection Script:
// Setup Files:
include('../../public_ftp/connect.php'); // Connection stored in $dbc variable

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
    <!--
      Audio player courtesy of Ivan
      http://codepen.io/k-ivan/pen/pJMLmJ
    -->

    <div class="audio-player">
        <div class="player-head">
            <div class="player-image">
                <img src="https://hd.unsplash.com/photo-1461301214746-1e109215d6d3" alt="" />
            </div>
            <div class="player-close-icon">
                <i class="ion-ios-close"></i>
            </div>
            <div class="player-description">
                <h2>Friendship Baptist Church</h2>
                <p>A Church With A Heart</p>
            </div>
        </div>
        <div class="player-controls">
            <div class="ap" id="ap">
                <div class="ap__inner">
                    <div class="ap__item ap__item--playback">
                        <button class="ap__controls ap__controls--prev">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#333" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M9.516 12l8.484-6v12zM6 6h2.016v12h-2.016v-12z"></path>
                            </svg>
                        </button>
                        <button class="ap__controls ap__controls--toggle">
                            <svg class="icon-play" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#333" width="36" height="36" viewBox="0 0 36 36" data-play="M 12,26 18.5,22 18.5,14 12,10 z M 18.5,22 25,18 25,18 18.5,14 z" data-pause="M 12,26 16.33,26 16.33,10 12,10 z M 20.66,26 25,26 25,10 20.66,10 z">
                                <path d="M 12,26 18.5,22 18.5,14 12,10 z M 18.5,22 25,18 25,18 18.5,14 z"></path>
                            </svg>
                        </button>
                        <button class="ap__controls ap__controls--next">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#333" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M15.984 6h2.016v12h-2.016v-12zM6 18v-12l8.484 6z"></path>
                            </svg>
                        </button>
                        <div class="ap__controls volume-container">
                            <button class="volume-btn">
                                <svg class="icon-volume-on" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#333" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M14.016 3.234q3.047 0.656 5.016 3.117t1.969 5.648-1.969 5.648-5.016 3.117v-2.063q2.203-0.656 3.586-2.484t1.383-4.219-1.383-4.219-3.586-2.484v-2.063zM16.5 12q0 2.813-2.484 4.031v-8.063q2.484 1.219 2.484 4.031zM3 9h3.984l5.016-5.016v16.031l-5.016-5.016h-3.984v-6z"></path>
                                </svg>
                                <svg class="icon-volume-off" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#333" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M12 3.984v4.219l-2.109-2.109zM4.266 3l16.734 16.734-1.266 1.266-2.063-2.063q-1.734 1.359-3.656 1.828v-2.063q1.172-0.328 2.25-1.172l-4.266-4.266v6.75l-5.016-5.016h-3.984v-6h4.734l-4.734-4.734zM18.984 12q0-2.391-1.383-4.219t-3.586-2.484v-2.063q3.047 0.656 5.016 3.117t1.969 5.648q0 2.25-1.031 4.172l-1.5-1.547q0.516-1.266 0.516-2.625zM16.5 12q0 0.422-0.047 0.609l-2.438-2.438v-2.203q2.484 1.219 2.484 4.031z"></path>
                                </svg>
                            </button>
                            <div class="volume">
                                <div class="volume__track">
                                    <div class="volume__bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ap__item ap__item--track">
                        <div class="track">
                            <div class="track__title">Queue is empty</div>
                            <div class="track__time">
                                <span class="track__time--current">--</span>
                                <span> / </span>
                                <span class="track__time--duration">--</span>
                            </div>

                            <div class="progress-container">
                                <div class="progress">
                                    <div class="progress__bar"></div>
                                    <div class="progress__preload"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ap__item ap__item--settings">
                        <button class="ap__controls ap__controls--repeat">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#333" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M17.016 17.016v-4.031h1.969v6h-12v3l-3.984-3.984 3.984-3.984v3h10.031zM6.984 6.984v4.031h-1.969v-6h12v-3l3.984 3.984-3.984 3.984v-3h-10.031z"></path>
                            </svg>
                        </button>
                        <button class="ap__controls ap__controls--playlist">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#333" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M17.016 12.984l4.969 3-4.969 3v-6zM2.016 15v-2.016h12.984v2.016h-12.984zM18.984 5.016v1.969h-16.969v-1.969h16.969zM18.984 9v2.016h-16.969v-2.016h16.969z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>