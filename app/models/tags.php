<?php
class Tags
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function isValidTag($tag)
    {
        $this->db->query("SELECT id FROM tags WHERE name=:name");
        $this->db->bind(":name", $tag);
        $result = $this->db->rowCount();
        return ($result > 0);
    }

    public function getTagDescription($tag)
    {
        $this->db->query("SELECT description FROM tags WHERE name=:name");
        $this->db->bind(":name", $tag);
        $result = $this->db->single()->description;
        return $result;
    }

    public function getAllTags()
    {
        $this->db->query("SELECT name, description FROM tags");
        $raw_results = $this->db->resultSet();
        $results = [];
        foreach ($raw_results as $key => $tag_description) {
            $results[$tag_description->name] = $tag_description->description;
        }
        return $results;
    }
}
