<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CodeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /**
     * @var User
     */
    private $user;
    private $codeuser;

    public function __construct(User $user, CodeUser $codeUser)
    {
        $this->user = $user;
        $this->codeuser = $codeUser;
    }


    public function verifycode(Request $request)
    {
        try{
            if($user = $this->user->where("email", $request->email)->first() ){

                $code = rand(10000, 99999); // mudar para nao pegar numeros repetidos ?
                $new_code = $this->codeuser->create(["code" => $code]);

                $user->update(["code_id" => $new_code->id]);
                Mail::send('api.login', ["code" => $new_code->code], function ($msg) use ($request){
                    $msg->from(env('MAIL_USERNAME'), env('Ifood_Fake'));
                    $msg->subject("codigo de login");
                    $msg->to($request->email);
                });
                return Response()->json(["stts" => "ok"]);
            }
            return Response()->json(["stts" => "not email"]);
        }catch (\Exception $e){
            return Response()->json(["stts" => $e->getMessage()]);
        }
    }

    public function loginwithcode(Request $request)
    {
        try{

            $user_code = $this->codeuser->where("code", $request->code)->with("user:id,code_id,email")->first();

            if($user_code->user->email == $request->email){
                return Response()->json(["stts" => "ok"]);
            }

            return Response()->json(["stts" => "erro"]);

        }catch (\Exception $e){
            return Response()->json(["stts" => $e->getMessage()], 400);
        }
    }
}
