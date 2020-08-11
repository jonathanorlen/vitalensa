<?php

class Logins extends CI_Model
{
    private $table = "user";

    public function cek($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get("user");
    }

}
?>