<?php
require('ClientModel.php');
//запросы в бд
class Query_Manager
{

    public function connectToDb(): mysqli {
        $this->m_conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
        return $this->m_conn;
    }

    function getConnection(): mysqli {
        return $this->m_conn;
    }

    function closeConnection(): bool
    {
        return$this->m_conn -> close();
    }

    function addClientQuery(mysqli $conn, string $name, string $phone) : bool {
        $query = "INSERT INTO clients (name, phone) VALUES (\"$name\", \"$phone\"); ";
        return $conn->query($query);
    }

    function readAllClients(mysqli $conn) {
        $query = "SELECT * FROM clients ; ";
        $this->parseClientsFromQueryResult($conn->query($query));
        // return $array;
    }

    function parseClientsFromQueryResult(mysqli_result $res) {
        // print_r($res);
        while($row = mysqli_fetch_assoc($res)) {
            $arr[] = $row;

            print_r($arr[0]["name"]);
            print_r($arr);
        }
    }
}
    // function OpenCon()
    //  {
    //  $dbhost = "localhost";
    //  $dbuser = "Max";
    //  $dbpass = "123789Guber";
    //  $db = "site_db";
    //  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
     
    //  return $conn;
    //  }
     
    // function CloseCon($conn)
    //  {
    //  $conn -> close();
    //  }
       
?>