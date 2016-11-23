<?php

class Database{

    private $db_base;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $con;
    private $query;

    private $check= 'hidden';

    public function __construct($db_host='localhost', $db_user='root', $db_pass='', $db_base='tunisair' ){
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_base = $db_base;

        $this->getConnect();
    }

    public function getConnect(){
        if ($this->con === null){
            $this->con = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_base);
            if ($this->con->connect_errno) {
                echo "Echec lors de la connexion à MySQL : (" . $this->con->connect_errno . ") " . $this->con->connect_error;
            }
        }

        return $this->con;
    }

    public function query($statement){
        $sql = $this->con->query($statement);
        return $sql;
    }

    public function checkPass($username, $pass){
        $this->setCheck('hidden');

        $this->setQuery("select * from user where username='$username' AND password='$pass'");

        $result = $this->query($this->getQuery());

        if ($result) {
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                header('Location: index.php');
            } else {
                $this->setCheck('show');
            }
        }
    }

    public function getCurrentUser($username, $pass){
        $currentUser = $this->query($this->getQuery());
        $result_array = array();

        if($currentUser){
            $row = mysqli_fetch_assoc($currentUser);
            return $row;
        }else{
            return null;
        }
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param mixed $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return null
     */
    public function getCheck()
    {
        return $this->check;
    }

    /**
     * @param null $check
     */
    public function setCheck($check)
    {
        $this->check = $check;
    }
}