<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Users;

new Database;

class AdminResetPasswordController extends Controller
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
        Blade::render('admin/password/reset');
    }

    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     * Example : Product::create($data)
     */
    public function store()
    {
        $email = $_POST['emailReset'];

        $newPass = test_input($_POST['newPassword']);
        $confirm = test_input($_POST['confirmPassword']);
        $ok = 1;
        if($newPass !== $confirm){
            $ok = 0;
        }
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[0-9a-zA-Z\d]{8,}$/", $newPass)){
            $ok = 0;
        }
        if ($ok === 1){
            Users::where('email', $email)->update([
                'password' => md5($newPass)
            ]);
            header('Location: /superFood/admin/login');
        }else{
            echo "<script>alert('Không thành công!'); window.location='/superFood/admin/resetPassword/create?email=$email'  ; </script>";
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
