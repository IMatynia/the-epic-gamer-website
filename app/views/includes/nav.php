<?php

class NavView extends View
{
    public function render(): void
    {
        ?>
        <head>
            <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/navigation.css">
        </head>

        <nav class="top_nav">
            <div class="top_title">
                <a href="<?php echo URLROOT ?>">THE EPIC GAMER</a></div>
            </div>
            <div class="link_bar">
                <a class="cool_hover delicate_shadow" href="<?php echo URLROOT . "news"; ?>">
                    <div>NEWS</div>
                </a>
                <a class="cool_hover delicate_shadow" href="<?php echo URLROOT . "trollfacepl"; ?>">
                    <div>FREE MONEY GLITCH</div>
                </a>
                <a class="cool_hover delicate_shadow" href="<?php echo URLROOT . "quiz"; ?>">
                    <div>QUIZES</div>
                </a>
                <a class="cool_hover delicate_shadow" href="<?php echo URLROOT . "contact"; ?>">
                    <div>CONTACT</div>
                </a>
                <a class="cool_hover delicate_shadow" href="<?php echo URLROOT . "about"; ?>">
                    <div>ABOUT</div>
                </a>
            </div>
        </nav>
        <?php
    }
}

