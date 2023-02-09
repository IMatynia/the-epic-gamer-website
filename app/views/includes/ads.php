<?php

class AdsView extends View
{
    public function render(): void
    {
        ?>
        <div class='reklama_space'>
            <div>Reklama:</div>
            <a href="https://en.wikipedia.org/wiki/Trollface" target="_blank"><img alt="Free money scam"
                                                                                   src="<?php echo URLROOT ?>/public/media/reklamy/ez money.webp"/></a>
            <a href="https://aniagotuje.pl/przepis/mizeria" target="_blank"><img alt="Delicious breakfast"
                                                                                 src="<?php echo URLROOT ?>/public/media/reklamy/breakfast.png"/></a>
            <a href="https://web.archive.org/web/20220411071927/https://bitcoin.org/en/buy" target="_blank"><img
                        alt="Bitcoin download"
                        src="<?php echo URLROOT ?>/public/media/reklamy/hax.jpg"/></a>
            <a href="https://www.gimp.org/" target="_blank"><img alt="Ez muscle"
                                                                 src="<?php echo URLROOT ?>/public/media/reklamy/ez win.png"/></a>
        </div>"
        <?php
    }
}


