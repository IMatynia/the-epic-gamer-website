<?php
class Articles
{
    public function __construct()
    {
        $this->filename = APPROOT . "/database/articles.json";
        // $raw_database = file_get_contents($this->filename);
        //$this->all_articles = json_decode($raw_database);
    }

    public function getArticleByIdentifier($identifier)
    {
        // foreach ($this->all_articles as $article) {
        //     if($article->id == $identifier)
        //     {
        //         return $article;
        //     }
        // }
        // die("Article " . $identifier . " was not found!");
    }

    public function getAllArticles()
    {
        // return $this->all_articles;
        return [];
    }
}
