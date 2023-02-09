<?php

class Authors extends DBModel
{
    /**
     * Adds a new author to database
     *
     * @param string $full_name
     * @param string|null $picture
     * @param string|null $info
     * @return bool
     */
    public function addAuthor(string $full_name, ?string $picture = null, ?string $info = null): bool
    {
        $this->db->query("
            insert into authors (full_name, picture, info) values (:full_name, :picture, :info)
        ");
        $this->db->bind(":full_name", $full_name);
        $this->db->bind(":picture", $picture);
        $this->db->bind(":info", $info);
        return $this->db->execute();
    }

    public function purgeAuthors(): bool
    {
        $this->db->query("delete from authors");
        return $this->db->execute();
    }
}