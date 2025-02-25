<?php
class db_connection {
    protected $connect;

    private $host = "localhost";
    private $dbname = "climbing_gym";
    private $username = "root";
    private $password = "";

    public function __construct() {
        $this->connect = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->connect->connect_error) {
            die("Connection failed: " . $this->connect->connect_error);
        }
    }

    public function close() {
        $this->connect->close();
    }

    public function wQueryToFile($query)
    {
        //Linux:
        $myfile = fopen("/opt/lampp/htdocs/github/projekt_strona_internetowa/DB/testfile.txt", "a") or die("Unable to open file!");

        //Windows:
        // $myfile = fopen("C:/xampp/htdocs/dashboard/Strony Internetowe/secur-it/DB/testfile.txt", "a") or die("Unable to open file!");
        fwrite($myfile, $query."\n\n");
        fclose($myfile);
    }
}
?>