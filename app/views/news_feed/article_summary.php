<?php

class ArticleSummaryView extends View
{
    public stdClass $article;

    public function __construct(stdClass $article)
    {
        $this->article = $article;
    }

    public
    function render(): void
    {
        ?>
        <div class="article_summary">
            <div class="thumbnail">
                <?php echo snug_image($this->article->thumbnail); ?>
            </div>

            <div class="text_summary">
                <div class="title_container">
                    <div class="title delicate_shadow"><a
                                href="<?php echo URLROOT . "news/show/" . $this->article->sname; ?>"><?php echo $this->article->title; ?></a>
                    </div>
                </div>
                <div class="details"> <?php echo $this->article->date_published . " | " . $this->article->author . " | " . join(" / ", $this->article->tags); ?>
                </div>
                <p> <?php echo $this->article->summary; ?><a
                            href="<?php echo URLROOT . "news/show/" . $this->article->sname; ?>"><i> Read
                            more...</i></a>
                </p>
            </div>
        </div>
        <?php
    }
}
