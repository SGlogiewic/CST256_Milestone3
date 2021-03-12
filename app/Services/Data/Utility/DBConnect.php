<?php
namespace App\Services\Data;

use App\Models\CustomerModel;
use App\Services\Data\SecurityDAO;
use Carbon\Exceptions\Exception;
use mysqli;

class DBConnect
{
    //Define the connection string
    private $conn;
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $dbQuery;
    
    //Contructor that creates a connection with the database
    public function __construct(string $dbname)
    {
        $this->dbname = $dbname;
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "root";
        
        
    }
    
    public function getDBConnect()
    {
        //OOP style programming
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        
        //Create a connection to the database
        //Procedural style programming
        //$this->conn = mysqli::connect($this->servername, $this->username, $this->password, $this->dbname);
        //Make sure to test the connection and see if there are any errors.
        
        //Error checking
        if ($this->conn->connect_errno)
        {
            echo "failed to connect to MySQL: " . $this->conn->connect_errno;
            exit();
        }
        return($this->conn);
    }
    
    /*
     * close the connection
     */
    public function closeDBConnect()
    {
        //OOP style
        $this->conn->close();
        //Procedural style
        mysqli_close($this->conn);
    }
    
    /*
     * Turn ON Autocommit
     */
    public function setDbAutocommitTrue()
    {
        //TURN autocommit ON
        $this->conn->autocommit(TRUE);
    }
    
    /*
     * Turn OFF Autocommit
     */
    public function setDbAutocommitFalse()
    {
        // Turn autocommit OFF
        $this->conn->autocommit(FALSE);
    }
    
    /*
     * Begin a transaction
     */
    public function beginTransaction()
    {
        $this->conn->begin_transaction();
    }
    
    /*
     * Commit the transaction
     */
    public function commitTransaction()
    {
        $this->conn->commit();
    }
    
    /*
     * Rollback a transaction
     */
    public function rollbackTransaction()
    {
        $this->conn->rollback();
    }
    
    
}