<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{
    // To obtain an instance of the current http request from a post
    public function index(Request $request)
    {
        //Create a UserModel with username and password
        $credentials = new UserModel(request()->get('user_name'),  request()->get('password'));
        
        //Instantiate the Business Logic Layer
        $serviceLogin = new SecurityService();
        
        //Pass the credentials to the business layer
        $isValid = $serviceLogin->login($credentials);
        
        //Determine which view to display
        echo($isValid);
        if($isValid)
        {
            //
            return view('loginPassed');
        }
        else
        {
            return view('loginFailed');
        }
    }
    
    
    //Validation
    public function validateForm(Request $request)
    {
        //setup data validation rules for logic form
        $rules = ['user_name' => 'Required | Between: 4, 10 | Alpha',
                'password' => 'Required | Between: 4,10'];
        //Run data validation rules
        $this->validate($request, $rules);
    }
    
}
