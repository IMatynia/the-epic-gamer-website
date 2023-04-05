<?php
require_once VIEW . 'includes/head.php';
require_once VIEW . 'includes/nav.php';
require_once VIEW . 'includes/footer.php';

class AboutIndexView extends View
{
    public OGPdata $ogp_data;

    public function __construct(OGPdata $ogp_data)
    {
        $this->ogp_data = $ogp_data;
    }

    public function render(): void
    {
        $head = new HeadView($this->ogp_data);
        $nav = new NavView();
        $footer = new FooterView();

        $head->render();
        $nav->render();
        ?>

        <head>
            <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/nice_default_tags.css">
            <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/misc.css">
        </head>

        <div class="sections nice_default_tags">
            <div class="inspiration">Welcome to the only unbiased, uncensored news source for pogger gamers like you!
            </div>
            <h1 id="mission">Our mission</h1>
            <h3>Gamers in our society are arguably the most opressed minorty out there. Everywhere in media we are
                portrayed
                as fat, ugly, lonely basement dwelers. This destructive image
                creates social tension driving the inequality between the gamer class and the rest of modern day
                society.</h3>
            <q>A spectre is haunting society - a spectre of gaming [...]</q>
            <h3>In these desperate times we aim to be a beacon of hope, a safe heaven for gamers like you. By providing
                news
                untainted by anti-gamer mindsets and systemic opression or censorship.
                For we the gamers have to stick together and press on - resist our opressors.</h3>

            <div class="inspiration">Gamers of the world UNITE!</br>All you have to loose are your virginities...</div>
            <h2 id="data_and_privacy">Data protection and privacy</h2>
                <h3>This website doesn't use any cookies at all and does not save any user data anywhere. Data transfer
                    is
                    only one way - from the server to the user. That's it. No targeted ads, no trackers, no tracking
                    cookies. Nothing. </h3>
        </div>

        <?php
        $footer->render();
    }
}

?>