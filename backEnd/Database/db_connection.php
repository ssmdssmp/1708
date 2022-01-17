<?php

class DB_Maneger
{
    // объявление свойства
    private string $m_host = "localhost";
    private string $m_user = "Max";
    private string $m_pwd = "123789Guber";
    private string $m_db_name = "site_db";
    private mysqli $m_conn;

    public function connectToDb(): mysqli{
        $this->m_conn = new mysqli($this->m_host, $this->m_user, $this->m_pwd, $this->m_db_name);
        return $this->m_conn;
    }

    function getConnection(): mysqli{
        return $this->m_conn;
    }

    function closeConnection(): bool
    {
        return $this->m_conn -> close();
    }
}

?>