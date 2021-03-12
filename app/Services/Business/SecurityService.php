<?php
namespace App\Services\Business;

use App\Models\UserModel;
use App\Services\Data\UserDAO;
use App\Services\Data\SecurityDAO;
use App\Services\Data\DBConnect;
use App\Models\UserInfo;

class SecurityService
{
    //Define the properties
    private $verifyCred;
    public function login(UserModel $credentials)
    {
        //Instantiate the Data Access Layer
        $this->verifyCred = new SecurityDAO();
        
        //Return true or false by passing credentials
        //to the object
        return $this->verifyCred->findByUser($credentials);
    }
    
    //Method to manage the customer data
    public function addCustomer(UserInfo $customerData)
    {
        //Instantiate the data layer
        $this->addNewUser = new UserDAO();
        //Return true or false
        return $this->addNewUser->addUser($userData);
    }
    
    
    //Manage ACID
    public function addAllInformation(string $product, int $userID, UserInfo $userData)
    {
        //Create a connection to the database
        //Create an instance of the class
        $conn = new DBConnect("Milestone3");
        //Call the method to create a connection
        $dbObj = $conn->getDBConnect();
        
        //first turn off autocommit
        $conn->setDBAutocommitFalse();
        
        //Instantiate the Data Access Layer
        $this->addNewUser = new UserDAO($dbObj);
        //Get the customer ID
        $userID = $this->addNewUser->getNextID();
        
        //Add the customer Data
        $isSuccessful = $this->addNewUser->addUser($userData);
    }
}