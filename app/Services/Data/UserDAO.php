<?php
namespace App\Services\Data;

use App\Models\UserInfo;
use App\Services\Data\SecurityDAO;
use Carbon\Exceptions\Exception;

class UserDAO
{
    //Define the connection string
    private $conn;
    private $dbname = "activity3";
    private $dbQuery;
    private $connection;
    private $dbObj;
    
    //Contructor that creates a connection with the database
    public function __construct($dbObj)
    {
        $this->dbObj = $dObj;
    }
    
    /**
     * Method to add a customer to a database
     */
    public function addUser(UserInfo $userData)
    {
        try
        {
            
            //Define the query to search the database for the credentials
            $this->dbQuery = "INSERT into Users
                              (firstname, lastname)
                              VALUES
                              ('{$userData->getFirstname()}','{$userData->getLastname()}')";
            //If the selected query returns a result set
            
            //$result = mysqli_query($this->conn, $this->dbQuery);
            
            if($this->dbObj->query($this->dbQuery))
            {
                //$this->conn->closeDBConnect();
                return true;
            }
            else
            {
                //$this->conn->closeDBConnect();
                return false;
            }
            
        }
        
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    //ACID
    public function getNextID()
    {
        try
        {
            //Define the query to get the next ID
            $this->dbQuery = "SELECT UserID
                              FROM Users
                              Order BY UserID DESC LIMIT 0,1";
            $result = $this->dbObj->query($this->dbQuery);
            while ($row = mysqli_fetch_array($result))
            {
                return $row['UserID'] + 1;
            }
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
}