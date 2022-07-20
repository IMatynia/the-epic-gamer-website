<?php
class Tags
{
    private $_all_tags;

    public function __construct()
    {
        $raw_tags = file_get_contents(TAGS_DB_FILE);
        $this->_all_tags = json_decode($raw_tags);
    }

    public function isValidTag($tag)
    {
        return isset($this->_all_tags[$tag]);
    }

    public function getTagDescription($tag)
    {
        return $this->_all_tags[$tag];
    }

    public function getAllTags()
    {
        return $this->_all_tags;
    }
}
