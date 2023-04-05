<?php
require_once VIEW . 'includes/head.php';
require_once VIEW . 'includes/nav.php';
require_once VIEW . 'includes/footer.php';


class ContactIndexView extends View
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
            <div class="inspiration">We, the Gamers, deserve to be heard!</div>
            <h3>If you have information you believe should see the light of day, contact us! Send us leaks, articles,
                extracts, stories, events - local, national, global, interplanetary, interstelar - We dont discriminate,
                we accept it all!</h3>
            <q>Totalitarianism festers in information darkness or something like that, i dont know im making this shit
                up on the fly</q>
            <h2>Where to contact us:</h2>
            <ul>
                <li><i>Comming soon!</i></li>
            </ul>
            <h2>Approval process</h2>
            <p>If you send us an article or anything resembling it, it will undergo a review by our top researchers and
                journalists. They will evaluate the value, quality and efficacy of your work and if all goes well, it
                will be posted on our site!</p>
            <h2>Do you want the source code for the website?</h2>
            <p>Just contact me i guess</p>
        </div>
        <?php
        $footer->render();
    }
}

?>