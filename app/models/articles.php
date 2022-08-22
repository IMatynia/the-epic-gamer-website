<?php
class Articles
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTagsByIdentifier($identifier)
    {
        $this->db->query("
        SELECT name
        FROM articles, article_tags, tags 
        WHERE articles.id = article_tags.article_id AND tags.id = article_tags.tag_id AND articles.identifier = :identifier
        ORDER BY name");
        $this->db->bind(":identifier", $identifier);
        $result_tags = $this->db->resultSet();
        $out = [];
        foreach ($result_tags as $lp => $tag) {
            array_push($out, $tag->name);
        }
        return $out;
    }

    /**
     * Returns the data of the article of a given ID
     * 
     * @param string $identifier the identifier 
     */
    public function getArticleByIdentifier($identifier)
    {
        $this->db->query("SELECT * FROM articles WHERE identifier=:id");
        $this->db->bind(":id", $identifier);
        $result = $this->db->single();
        $tags = $this->getTagsByIdentifier($identifier);
        $result->tags = $tags;
        return $result;
    }

    /**
     * Returns a list of articles containing given tag
     * 
     * @param string $tag The tag to filer against
     */
    public function getArticlesByTag($tag)
    {
        $this->db->query("
        SELECT identifier, title, date_published, author, thumbnail_image, text_summary, contents 
        FROM articles, article_tags, tags 
        WHERE articles.id = article_tags.article_id AND tags.id = article_tags.tag_id AND tags.name = :tag
        ORDER BY date_published DESC;");
        $this->db->bind(":tag", $tag);
        $result = $this->db->resultSet();

        $out = [];
        foreach ($result as $lp => $art_data) {
            $identifier = $art_data->identifier;
            $tags = $this->getTagsByIdentifier($identifier);
            $art_data->tags = $tags;
            array_push($out, $art_data);
        }
        return $out;
    }

    public function getAllArticles()
    {
        $this->db->query("SELECT * FROM articles ORDER BY date_published DESC");
        $result = $this->db->resultSet();

        $out = [];
        foreach ($result as $lp => $art_data) {
            $identifier = $art_data->identifier;
            $tags = $this->getTagsByIdentifier($identifier);
            $art_data->tags = $tags;
            array_push($out, $art_data);
        }
        return $out;
    }
}
