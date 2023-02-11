<?php

class Ads extends DBModel
{
    public function getAllAds()
    {
        $this->db->query("select * from ads");
        return $this->db->resultSet();
    }

    public function addAd(string $redirect_url, string $image, ?string $hint = null)
    {
        $this->db->query("insert into ads values (null, :url, :image, :hint)");
        $this->db->bind(":url", $redirect_url);
        $this->db->bind(":image", $image);
        $this->db->bind(":hint", $hint);
        return $this->db->execute();
    }

    public function purgeAds()
    {
        $this->db->query("delete from ads");
        return $this->db->execute();
    }
}