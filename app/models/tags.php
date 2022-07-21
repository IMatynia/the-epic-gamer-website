<?php
class Tags
{
    private static $_all_tags;

    public function __construct()
    {
        if (Tags::$_all_tags == null) {
            $raw_tags = file_get_contents(TAGS_DB_FILE);
            Tags::$_all_tags = json_decode($raw_tags);
        }
    }

    public function isValidTag($tag)
    {
        return isset(Tags::$_all_tags[$tag]);
    }

    public function getTagDescription($tag)
    {
        return Tags::$_all_tags[$tag];
    }

    public function getAllTags()
    {
        return Tags::$_all_tags;
    }
}
