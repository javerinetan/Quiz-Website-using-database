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
    
    function retrieveData($sql){
        $con=mysqli_connect('localhost','root','','webdb_project');
        $results=mysqli_query($con,$sql);
        $row=$results->fetch_assoc();
        return $row;
    }

    function createQuizTable($quiz_no){
        $con=mysqli_connect('localhost','root','','webdb_project');
        $table_query="create table quiz_".$quiz_no."(
            quiz_no INT PRIMARY KEY AUTO_INCREMENT,
            question VARCHAR(255) NOT NULL, 
            option_1 VARCHAR(255) NOT NULL, 
            option_2 VARCHAR(255) NOT NULL, 
            option_3 VARCHAR(255) NOT NULL, 
            option_4 VARCHAR(255) NOT NULL, 
            answer VARCHAR(255) NOT NULL
        )";
        mysqli_query($con,$table_query);
    }

}

?>