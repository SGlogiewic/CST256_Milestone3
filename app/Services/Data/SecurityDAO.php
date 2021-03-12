<?php
namespace App\Services\Data;

use App\Models\UserModel;
use Carbon\Exceptions\Exception;

class SecurityDAO
{
    //Define the connection string
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "cst256_milestone";
    private $dbQuery;
    
    //Contructor that creates a connection with the database
    public function __construct()
    {
        //Create a connection to the database
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        //Make sure to test the connection and see if there are any errors.
    }
    
    /**
     * Method to verify user credentials
     */
    public function findByUser(UserModel $credentials)
    {
        try 
        {
            //Define the query to search the database for the credentials
            $this->dbQuery = "SELECT Username, Password 
                              FROM users 
                              WHERE Username = '{$credentials->getUsername()}'
                                    AND Password = '{$credentials->getPassword()}'";
            //If the selected query returns a result set
            $result = mysqli_query($this->conn, $this->dbQuery);
            
            if(mysqli_num_rows($result) > 0)
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return true;
            }
            else
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return false;
            }
            
        }
        
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
}