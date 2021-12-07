<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SalesProduct;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Jobs\SendEmailApiJob;

class LoginController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['name'] =  $user->name;
            $success['email'] =  $user->email;
            $success['role'] =  $user->is_admin==1 ? 'Admin' : 'Employer' ;
            $success['is_admin'] =  $user->is_admin ;

            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    public function user_info()
	{
	 /**Retrieve the information of the authenticated user
	    */

	    /** Return user's details
	    */
	    return response()->json(['success' => $user], 200);
	}

	public function SendMail(){

        $salesproduct = SalesProduct::all();
		$details = ['to_email' => 'ruban@sparkouttech.com','salesproduct' => $salesproduct];

        $success['salesproduct'] = $salesproduct;

     	SendEmailApiJob::dispatch($details);

        return $this->sendResponse($success, 'Email sent successfully.');
	}
}
