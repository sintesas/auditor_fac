<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Reminder;
use Mail;

class ForgotPasswordController extends Controller{

	public function forgotPassword(Request $request){
		// dd($request->email);

        $notification = array(
            'message' => 'Mensaje Enviado', 
            'alert-type' => 'success'
        );



        $user = User::whereEmail($request->email)->first();

        if(count($user) == 0){
            return back()->with($notification);
        }

        $reminder = Reminder::exists($user) ?: Reminder:: create($user);

        $this->sendEmail($user, $reminder->code);

        return back()->with($notification);


	}

	private function sendEmail($user, $code){
		Mail::send('email.forgot-password', [
			'user' => $user,
			'code' => $code
		], function($message) use ($user){
			$message->to($user->email);
			$message->subject("Reinicio de contraseña");
		});
	}
    
}
