<?php

class Api_keys
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function checkRemainingRequests($key)
    {
        $this->db->query("SELECT remaining_requests FROM api_keys WHERE api_key=:key");
        $this->db->bind(":key", $key);
        $result = $this->db->single();
        if ($result == false)
        {
            return 0;
        }
        else
        {
            return $result->remaining_requests;
        }
    }

    public function checkPrivilige($key)
    {
        $remaining = $this->checkRemainingRequests($key);
        if ($remaining > 0) {
            // Decrease the remaining requests
            $this->db->query("UPDATE api_keys SET remaining_requests = :remaining WHERE api_key=:key");
            $this->db->bind(":remaining", $remaining - 1);
            $this->db->bind(":key", $key);
            $this->db->execute();
            return true;
        } else {
            return false;
        }
    }
}
