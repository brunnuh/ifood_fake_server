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

                $code = rand(10000, 99999);
                $new_code = $this->codeuser->create(["code" => $code]);

                $user->update(["code_id" => $new_code->id]);
                Mail::send('api.login', ["code" => $new_code->code], function ($msg){
                    $msg->from(env('MAIL_USERNAME'), env('Ifood_Fake'));
                    $msg->subject("codigo de login");
                    $msg->to('buhsantos16@gmail.com');
                });
                return Response()->json(["stts" => "ok"]);
            }
            return Response()->json(["stts" => "not email"]);
        }catch (\Exception $e){
            return Response()->json(["stts" => $e->getMessage()]);
        }

    }
}
