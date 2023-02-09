<?php

class Articles extends DBModel
{
    /**
     * @param string $sname sname of the article
     * @return array array of tag names
     */
    public function getTagsOfArticle(string $sname): array
    {
        $this->db->query("
        select tags.name from tags
        inner join article_tags on tags.tag_id = article_tags.tag_id
        inner join articles on article_tags.article_id = articles.article_id
        where articles.sname = :sname;
        ");
        $this->db->bind(":sname", $sname);
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
     * @param string $sname the identifier
     */
    public function getArticleByIdentifier(string $sname)
    {
        $this->db->query("SELECT * FROM articles_w_authors WHERE sname=:sname ");
        $this->db->bind(":sname", $sname);
        $result = $this->db->single();
        $tags = $this->getTagsOfArticle($sname);
        $result->tags = $tags;
        return $result;
    }

    /**
     * Returns a list of articles containing given tag
     *
     * @param string $tag The tag to filer against
     */
    public function getArticlesByTag(string $tag): array
    {
        $this->db->query("
        select articles_w_authors.* from tags
        inner join article_tags on tags.tag_id = article_tags.tag_id
        inner join articles_w_authors on article_tags.article_id = articles_w_authors.article_id
        where tags.name = :tag
        ORDER BY date_published DESC");
        $this->db->bind(":tag", $tag);
        $result = $this->db->resultSet();

        $out = [];
        foreach ($result as $lp => $art_data) {
            $sname = $art_data->sname;
            $tags = $this->getTagsOfArticle($sname);
            $art_data->tags = $tags;
            array_push($out, $art_data);
        }
        return $out;
    }

    public function getAllArticles()
    {
        $this->db->query("SELECT * FROM articles_w_authors ORDER BY date_published DESC");
        $result = $this->db->resultSet();

        $out = [];
        foreach ($result as $lp => $art_data) {
            $sname = $art_data->sname;
            $tags = $this->getTagsOfArticle($sname);
            $art_data->tags = $tags;
            array_push($out, $art_data);
        }
        return $out;
    }

    public function addArticle(string $sname, string $title, string $author, string $summary, string $content, ?string $thumbnail = null): bool
    {
        $this->db->query("
            call add_article(:sname, :author, :title, :thumbnail, :summary, :content);
        ");
        $this->db->bind(":author", $author);
        $this->db->bind(":sname", $sname);
        $this->db->bind(":title", $title);
        $this->db->bind(":thumbnail", $thumbnail);
        $this->db->bind(":summary", $summary);
        $this->db->bind(":content", $content);
        return $this->db->execute();
    }

    public function addTagToArticle(string $art_sname, string $tag_name): bool
    {
        $this->db->query("
            call add_article_tag(:sname, :tag_name);
            ");
        $this->db->bind(":sname", $art_sname);
        $this->db->bind(":tag_name", $tag_name);
        return $this->db->execute();
    }

    public function purgeArticles(): bool
    {
        $this->db->query("delete from articles");
        return $this->db->execute();
    }

    public function purgeArticleTags(): bool
    {
        $this->db->query("delete from article_tags");
        return $this->db->execute();
    }
}