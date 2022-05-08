<?php
class News extends Controller
{
    public function __construct()
    {
        $this->articles = $this->model("Articles");
    }

    public function index()
    {
        $data = [
            "title" => "Epic Gaming, Epic News",
            "articles" => $this->articles->getAllArticles()
        ];
        $this->view('news_feed/index', $data);
    }

    public function show($id_string)
    {
        $article = $this->articles->getArticleByIdentifier($id_string);
        $data = [
            "title" => $article->title,
            "article" => $article
        ];
        $this->view('news_feed/show', $data);
    }
}
