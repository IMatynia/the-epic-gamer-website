<?php

require_once MODEL . "articles.php";
require_once MODEL . "tags.php";
require_once MODEL . "ads.php";

require_once VIEW . "news_feed/browse.php";
require_once VIEW . "news_feed/show.php";

class News extends Controller
{
    public Articles $article_model;
    public Tags $tags_model;
    public Ads $ads_model;
    public string $url_destination;

    public function __construct()
    {
        $this->article_model = new Articles();
        $this->tags_model = new Tags();
        $this->ads_model = new Ads();
        $this->url_destination = "news/browse/";
    }

    public function index($tag = null)
    {
        $this->browse($tag);
    }

    public function browse($tag = null)
    {
        if ($tag == "favicon.ico") $tag = null;
        $tag_description = null;
        // Filter by tag
        if ($tag != null) {
            $title = ucfirst($tag) . " - The Epic Gamer";
            $articles = $this->article_model->getArticlesByTag($tag);
            $tag_description = $this->tags_model->getTagDescription($tag);
        } else {
            $title = "Epic gaming. Epic news.";
            $articles = $this->article_model->getAllArticles();
        }

        $view = new NewsBrowseView(
            $tag,
            $tag_description,
            $articles,
            $this->ads_model->getAllAds(),
            new OGPdata(
                $title,
                "Browse REAL news brought to you by epic gamer journalists like you. Epic gaming. Epic news."
            ),
            $this->tags_model->getAllArticleTags(),
            $this->url_destination
        );
        $view->render();
    }

    public function show(string $id_string)
    {
        $article = $this->article_model->getArticleByIdentifier($id_string);
        $view = new ShowArticleView($article, new OGPdata(
            $article->title,
            $article->summary,
            $article->thumbnail,
            "article"
        ), $this->tags_model->getAllArticleTags(), $this->url_destination);
        $view->render();
    }
}
