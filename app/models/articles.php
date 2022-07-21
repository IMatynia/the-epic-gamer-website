<?php
class Articles
{
    private static $_all_articles = null;

    public function __construct()
    {
        if (Articles::$_all_articles == null) {
            $raw_articles = file_get_contents(ARTICLES_DB_FILE);
            Articles::$_all_articles = json_decode($raw_articles);
        }
    }

    /**
     * Returns the data of the article of a given ID
     * 
     * @param string $identifier the identifier 
     */
    public function getArticleByIdentifier($identifier)
    {
        if (property_exists(Articles::$_all_articles, $identifier)) {
            return Articles::$_all_articles->$identifier;
        }
        throw new Exception("Article " . $identifier . " not found!");
    }

    /**
     * Returns a list of articles containing given tag
     * 
     * @param string $tag The tag to filer against
     */
    public function getArticlesByTag($tag)
    {
        $out = [];
        foreach (Articles::$_all_articles as $id => $art_data) {
            if (in_array($tag, $art_data->tags)) {
                $out[$id] = $art_data;
            }
        }
        return $out;
    }

    public function getAllArticles()
    {
        return Articles::$_all_articles;
    }
}
