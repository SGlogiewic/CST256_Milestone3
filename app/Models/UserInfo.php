<?php
namespace App\Models;

class UserInfo
{
    private $firstname;
    private $lastname;
    private $username;
    private $jobhistory;
    private $education;
    private $skills;
    
    //Class contructor
    public function __construct($firstname, $lastname, $username, $jobhistory, $education, $skills)
    {
        $this->username = $firstname;
        $this->password = $lastname;
        $this->password = $username;
        $this->password = $jobhistory;
        $this->password = $education;
        $this->password = $skills;
    }
    
    /**
     * Getter Method -> firstname
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
    
    /**
     * Getter Method -> lastname
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }
    
    /**
     * Getter Method -> username
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * Getter Method -> jobhistory
     * @return string
     */
    public function getJobHistory()
    {
        return $this->jobhistory;
    }
    
    /**
     * Getter Method -> education
     * @return string
     */
    public function getEducation()
    {
        return $this->education;
    }
    
    /**
     * Getter Method -> skills
     * @return string
     */
    public function getSkills()
    {
        return $this->skills;
    }
}