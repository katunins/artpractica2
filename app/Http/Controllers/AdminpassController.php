<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mail;

class AdminpassController extends Controller
{
    public function setNewAdminPass(Request $request)
    {
        $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        if ($request->input('password_old')) $rules['password_old'] = ['required'];
        $request->validate($rules, [
            'password_old.required' => 'Введите старый пароль',
            'password.required' => 'Введите пароль',
            'password.min' => 'Пароль должен быть не менее 8 символов',
            'password.confirmed' => 'Пароли не совпадают',
        ]);

        if ($request->input('password_old')) {
            $pass = DB::table('adminpass')->get()[0]->password;
            if (!Hash::check($request->input('password_old'), $pass)) return redirect()->back()->withErrors(['password_old' => 'Введеный старый пароль - не верный!']);
        }

        DB::table('adminpass')->delete();
        DB::table('adminpass')->insert(['password' => Hash::make($request->input('password'))]);
        Session::put('auth', $request->input('password'));
        return view('admin/index');
    }

    public function checkAdminPass(Request $request)
    {
        $pass = DB::table('adminpass')->get()[0]->password;
        if (Hash::check($request->input('password'), $pass)) {
            Session::put('auth', $request->input('password'));
            return view('admin/index');
        } else {
            return view('admin/checkadminpass')->withErrors(['password' => 'Не верный пароль!']);
        }
    }

    public function sendMessage(Request $request)
    {
        // отправляет письмо менеджеру
        //         "name" => "wef"
        //   "tel" => "wefewf"
        //   "message" => null

        $details = [
            'title' => 'На сайте оставлена заявка',
            'body' => 'This is for testing email using smtp'
        ];
       
        \Mail::to('katunin.pavel@gmail.com')->send(new \App\Mail\AdminMail($details));


        // $data = array('name' => "Virat Gandhi");

        // Mail::send(['text' => 'mail'], $data, function ($message) {
        //     $message->to('katunin.pavel@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
        //     $message->from('admin@artpractica.ru', 'Virat Gandhi');
        // });

        // dd($request->all());
    }
}
