<?php

class Tags extends DBModel
{

    public function getTagDescription(string $tag): ?string
    {
        $this->db->query("SELECT description FROM tags WHERE name=:name");
        $this->db->bind(":name", $tag);
        $res = $this->db->single();
        if ($res) {
            return $this->db->single()->description;
        }
        return null;
    }

    public function getAllTags(): array
    {
        $this->db->query("SELECT name, description FROM tags ORDER BY name");
        return $this->db->resultSet();
    }

    /**
     * @return array array of tags relevant to articles only (at least 1 article has this tag). Also contains its count
     */
    public function getAllArticleTags(): array
    {
        $this->db->query("
            SELECT name, description, count(article_id) as n
            FROM article_tags
                     inner join tags on article_tags.tag_id = tags.tag_id
            group by name, description
            ORDER BY name
        ");
        return $this->db->resultSet();
    }

    /**
     * @return array array of tags relevant to quizes only (at least 1 quiz has this tag). Also contains its count
     */
    public function getAllQuizTags(): array
    {
        $this->db->query("
            SELECT name, description, count(quiz_id) as n
            FROM quiz_tags
                     inner join tags on quiz_tags.tag_id = tags.tag_id
            group by name, description
            ORDER BY name
        ");
        return $this->db->resultSet();
    }

    public function addTag($name, $description)
    {
        $this->db->query("INSERT INTO tags (`name`, `description`) VALUES (:name, :description)");
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);
        return $this->db->execute();
    }

    public function purgeTags()
    {
        $this->db->query("delete from tags");
        $this->db->execute();
    }
}
