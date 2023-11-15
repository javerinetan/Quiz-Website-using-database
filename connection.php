<?php
$con=mysqli_connect('localhost','root','','webdb_project');

// if(!$con)
// {
//     die(' Please Check Your Connection'.mysqli_error($con));
// }
class DatabaseConnection {
    protected $db_host;
    protected $db_username;
    protected $db_password;
    protected $db_databasename;
    protected $db_port;
    protected $db_socket;
    protected $mysqli;

    function __construct() {
        $this->db_host = 'localhost';
        $this->db_username = 'root';
        $this->db_password =  '';
        $this->db_databasename = 'webdb_project';
        $this->db_connect();
    }

    private function db_connect() {
        $this->mysqli = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_databasename);
        if ($this->mysqli->connect_error) {
            die('Connection Failed' . $this->mysqli->connect_error);
        }
    }
    

}

?>