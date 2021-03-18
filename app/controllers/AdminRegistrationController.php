<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Mail\Mail;
use App\Users;

new Database;
new Mail();
class AdminRegistrationController extends Controller
{

    /**
     * @function index()
     * List All data from database
     * Example : Product::all()
     */
    public function index()
    {

    }

    /**
     * @function create()
     * View form create
     * Type data : Array
     * Example : Product::create($data)
     */
    public function create()
    {
        Blade::render('admin/auth/register');
    }

    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     * Example : Product::create($data)
     */
    public function store()
    {
        $time = date('Y-m-d H:i:s');
        $firstname = $lastname = $email = $password = $confirm = "";
        if (!empty($_POST["firstname"])) {
            $firstname = test_input($_POST["firstname"]);
        }
        if (!empty($_POST["lastname"])) {
            $lastname = test_input($_POST["lastname"]);
        }
        if (!empty($_POST["email"])) {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email = "";
            }
            $checkMailUser = Users::where('email', $email)->get();
            if (!$checkMailUser->isEmpty()) {
                $email = "";
            }
        }
        if (!empty($_POST["password"])) {
            $password = test_input($_POST["password"]);
            if (!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $password)) {
                $password = "";
            }
        }
        if (!empty($_POST["confirm"])) {
            $confirm = test_input($_POST["confirm"]);
        }
        if ($password !== $confirm) {
            $confirm = "";
        }
        if ($firstname != "" && $lastname != "" && $password != "" && $email != "" && $confirm != "") {
            $md5Password = md5($password);

            $register = Users::create([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $md5Password
            ]);
            if ($register) {
                $content =
                    'Chúc mừng ' . $lastname . ' đã đăng ký tài khoản thành công<br>
                    Tài khoản của bạn là :<br>
                    username: ' . $email . '<br>' .
                    'password: ' . $password . '<br>' .
                    'Click vào đây để kích hoạt tài khoản <a href="http://' . $_SERVER['HTTP_HOST'] . '/superFood/admin/activeAccount/update/'. $register->id . '?time=' . $time .'">Kích hoạt tài khoản</a>';;
                    Mail::send($email,$firstname,"Đăng ký tài khoản thành công", $content);
                echo "<script>alert('Đăng ký thành công'); window.location= '/superFood/admin/login';</script>";
            } else {
                echo "<script>alert('Đăng ký không thành công'); window.location= '/superFood/admin/register';</script>";
            }
        }else{
            echo "<script>alert('Đăng ký không thành công, '); window.location= '/superFood/admin/register';</script>";
        }
    }

    /**
     * @function show()
     * Get detail a data in database
     * Type id : number
     * Get id from URl
     * Example : Product::find($id)
     */
    public function show($id)
    {
    }

    /**
     * @function update()
     * Update data with id to database
     * Type id :number
     * Get id from URL
     * Type data : Array
     * Example : Product::find($id)->update($data)
     */
    public function update($id)
    {

    }

    public function edit($id)
    {
    }

    /**
     * @function delete()
     * Delete data with id
     * Type id : number
     * Example : Product::delete()
     */
    public function delete($id)
    {
    }
}
