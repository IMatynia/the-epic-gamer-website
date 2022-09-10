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

    public function addNewArticle($identifier, $title, $author, $thumbnail_image, $text_summary, $contents, $tags)
    {
        # Add article description to articles table
        $this->db->query("INSERT INTO articles (`identifier`, `title`, `author`, `thumbnail_image`, `text_summary`, `contents`) VALUES (:identifier, :title, :author, :thumbnail_image, :text_summary, :contents)");
        $this->db->bind(":identifier", $identifier);
        $this->db->bind(":title", $title);
        $this->db->bind(":author", $author);
        $this->db->bind(":thumbnail_image", $thumbnail_image);
        $this->db->bind(":text_summary", $text_summary);
        $this->db->bind(":contents", $contents);
        $ret = $this->db->execute();
        if ($ret === false) throw new Exception("Failed to add article");

        # Get the new articles' ID
        $article_id = $this->getArticleIDbyIdentifier($identifier);

        # Push it's tags into the DB
        foreach ($tags as $tag_id) {
            $this->addTagToArticle($tag_id, $article_id);
        }
    }

    public function removeArticleByIdentifier($identifier)
    {
        $this->db->query("DELETE FROM articles WHERE identifier=:identifier");
        $this->db->bind(":identifier", $identifier);
        $this->db->execute();
    }

    public function getArticleIDbyIdentifier($identifier)
    {
        $this->db->query("SELECT id FROM articles WHERE identifier = :identifier");
        $this->db->bind(":identifier", $identifier);
        $thing = $this->db->single();
        if ($thing === false) {
            throw new Exception("No article with this identifier is present!");
        } else {
            return $thing->id;
        }
    }

    public function addTagToArticle($tag_id, $article_id)
    {
        $this->db->query("INSERT INTO article_tags (`article_id`, `tag_id`) VALUES (:article_id, :tag_id)");
        $this->db->bind(":article_id", $article_id);
        $this->db->bind(":tag_id", $tag_id);
        $ret = $this->db->execute();
        if ($ret === false) throw new Exception("Failed to add tag");
    }

    public function removeTagFromArticle($tag_id, $article_id)
    {
        $this->db->query("DELETE FROM article_tags WHERE `article_id` = :article_id AND `tag_id` = :tag_id");
        $this->db->bind(":article_id", $article_id);
        $this->db->bind(":tag_id", $tag_id);
        $this->db->execute();
    }
}
