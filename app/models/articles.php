<?php
class Articles
{
    private $_all_articles;

    public function __construct()
    {
        $raw_articles = file_get_contents(ARTICLES_DB_FILE);
        $json = json_decode($raw_articles);
        $this->_all_articles = $json;
    }

    /**
     * Returns the data of the article of a given ID
     * 
     * @param string $identifier the identifier 
     */
    public function getArticleByIdentifier($identifier)
    {
        if (property_exists($this->_all_articles, $identifier)) {
            return $this->_all_articles->$identifier;
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
        foreach ($this->_all_articles as $id => $art_data) {
            if (in_array($tag, $art_data->tags)) {
                $out[$id] = $art_data;
            }
        }
        return $out;
    }

    public function getAllArticles()
    {
        return $this->_all_articles;
    }
}
