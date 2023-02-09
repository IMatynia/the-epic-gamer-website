<?php
require_once VIEW . 'includes/head.php';

class WeDoABitOfTrolling extends View
{
    public OGPdata $ogp;

    public function __construct(OGPdata $ogp_data)
    {
        $this->ogp = $ogp_data;
    }

    public function render(): void
    {
        $head = new HeadView($this->ogp, "We do a bit of trolling");

        $head->render();
        ?>

        <head>
            <style>
                body {
                    background: black;
                    margin: 0;
                    border: 0;
                }

                #contents {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100%;
                    width: 100%;
                    overflow: hidden;
                }

                #trollfacer {
                    height: 0%;
                    width: 0%;
                    visibility: collapse;
                }

                #butt {
                    height: 50%;
                    width: 50%;
                    font-size: xx-large;
                    border-radius: 20%;
                }

                #number13 {
                    height: 0;
                    width: 0;
                }
            </style>
        </head>

        <body>
        <div id="contents">
            <a href="<?php echo URLROOT . "niceopinion"; ?>">
                <video id="trollfacer" src="<?php echo URLROOT ?>/public/media/troll.mp4" loop></video>
            </a>
            <button id="butt">Click me! (not a troll)</button>
            <audio id="number13" src="<?php echo URLROOT ?>/public/media/disk_13.mp3" loop></audio>
        </div>


        <script>
            video = document.getElementById("trollfacer")
            audio = document.getElementById("number13")
            button = document.getElementById("butt")

            function play_vid() {
                // mfs from chrome forbid autoplay without user interaction...
                button.style.visibility = "collapse"
                button.style.width = "0"
                button.style.height = "0"
                video.style.visibility = "visible"
                video.style.width = "100%"
                video.style.height = "100%"
                video.play()
                audio.play()
            }

            button.onclick = play_vid
        </script>
        </body>
        <?php
    }
}