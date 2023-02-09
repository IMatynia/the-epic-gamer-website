<?php

class Api_keys extends DBModel
{

    /**
     * @param string $key api key to check the priviliges of (and decrease its quota)
     * @return bool true if api key was valid, false if api key is invalid
     */
    public function checkPriviliges(string $key) : bool
    {
        $this->db->query("SELECT use_api_key(:key) as success");
        $this->db->bind(":key", $key);
        $success = $this->db->single()->success;
        return boolval($success);
    }

    public function generateNewKey(string $gen_string, ?int $quota, ?int $duration)
    {
        $this->db->query("
        SELECT generate_api_key(:gen_string, :quota, :duration);
        ");
        $this->db->bind(":gen_string", $gen_string);
        $this->db->bind(":quota", $quota);
        $this->db->bind(":duration", $duration);
        $key = $this->db->single();
        return $key;
    }
}
