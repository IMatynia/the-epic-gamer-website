<?php

class AdsView extends View
{
    public array $ads;

    public function __construct(?array $ads)
    {
        $this->ads = $ads ?: [];
        shuffle($this->ads);
    }

    public function render(): void
    {
        ?>
        <div class='reklama_space'>
            <div style="text-align: center">Ads: <b>(NOT ACTUAL SPONSORS, NONE OF THESE ARE AFFILIATED WITH THE EPIC GAMER)</b></div>
            <?php
            foreach ($this->ads as $i => $ad) {
                ?>
                <a href="<?= $ad->redirect_url ?>" target="_blank">
                    <img alt="<?= $ad->hint ?>" title="<?= $ad->hint ?>" src="<?= $ad->image ?>"/>
                </a>
                <?php
            }
            ?>
        </div>
        <?php
    }
}


