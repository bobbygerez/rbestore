<?php 

namespace App\Repo\User;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\User;
use Hash;
use JWTAuth;
use Auth;
use JWTAuthException;

class UserRepository extends BaseRepository implements UserInterface{

	public function __construct(){

		$this->modelName = new User();
	}

	
	public function create($request){
		
		$requestAll = $request->all();
		$requestAll["password"] = Hash::make($request->input('password'));
		return $this->modelName->create($requestAll);
	}

	public function login($request){

		$credentials = $request->only('email', 'password');
        $token = null;
        try {
           if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json('Invalid username or password', 422);
           }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }

        $user = JWTAuth::toUser($token);
        $user = User::where('id', $user->id)->with(['company.branches'])->first();

        return response()->json([
                'token' => $token,
                'user' => $user
            ]);
	}

	public function getAuthUser($request){
        //Useful in deleting
        //$movie->find(1)->people()->newPivotStatement()->where('people_id',1)->where('role', 'Producer')->delete();
        //$movie->find(1)->people()->newPivotStatementForId(1)->where('id', 2)->delete();

        // $user = JWTAuth::toUser($request->token);
        // $user = User::where('id', '=', $user->id)
        //     ->with(['company.branches', 'roles'])
        //     ->first();
        // return response()->json(['user' => $user]);
        $user = JWTAuth::toUser($request->token);
        $user = User::where('id', '=', $user->id)
            ->with(['company.branches', 'roles.menu'])
            ->first();
        return response()->json(['user' => $user]);
    }

    public function logout($request){

        JWTAuth::setToken($request->token)->invalidate();
        return response()->json(['result' => 'logout']);
    }

    

	
}