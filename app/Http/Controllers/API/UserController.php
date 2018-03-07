<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\User\UserInterface;
use App\Repo\Item\ItemInterface;
use Auth;

class UserController extends Controller
{
    private $user;
    protected $item;

    public function __construct(UserInterface $user, ItemInterface $item){
        $this->user = $user;
        $this->item = $item;
    }
   
    public function register(Request $request){

        $user = $this->user->create($request);
        return response()->json(['status'=>true,'message'=>'User created successfully','data'=>$user]);
    }
    
    public function login(Request $request){
       
       return $this->user->login($request);
    }
    public function getAuthUser(Request $request){

       
       return $this->user->getAuthUser($request);
    }
    public function logout(Request $request){

       return $this->user->logout($request);
    }

    public function getUserInfo(Request $request){

        return response()->json([
                'user' => Auth::User()
                            ->with(['images'])
                            ->exclude(['email'])->first(),
                'items' => $this->item->getUserItems($request)->withProduct()
            ]);
    }
}
