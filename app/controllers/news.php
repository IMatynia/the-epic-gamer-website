<?php
class News extends Controller
{
    public function __construct()
    {
        $this->article_model = $this->model("Articles");
    }

    public function index($tag = null)
    {
        $this->browse($tag);
    }

    public function browse($tag = null)
    {
        if ($tag != null) {
            $title = ucfirst($tag) . " - The Epic Gamer";
            $articles = $this->article_model->getArticlesByTag($tag);
        } else {
            $title = "Epic gaming. Epic news.";
            $articles = $this->article_model->getAllArticles();
        }

        $data = [
            "title" => $title,
            "articles" => $articles,
            "tag" => $tag,
            "ogp_data" => new OGPdata(
                $title,
                "Browse REAL news brought to you by epic gamer journalists like you. Epic gaming. Epic news."
            )
        ];
        $this->view('news_feed/browse', $data);
    }

    public function show($id_string)
    {
        $article = $this->article_model->getArticleByIdentifier($id_string);
        $data = [
            "title" => $article->title,
            "article" => $article,
            "ogp_data" => new OGPdata(
                $article->title,
                $article->text_summary,
                $article->thumbnail_image,
                "article"
            )
        ];
        $this->view('news_feed/show', $data);
    }
}
