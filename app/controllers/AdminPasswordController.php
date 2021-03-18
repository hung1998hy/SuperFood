<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Mail\Mail;
use App\Users;

new Database;

class AdminPasswordController extends Controller
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
        Blade::render('admin/password/forgot');
    }

    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     * Example : Product::create($data)
     */
    public function store()
    {
        $mail = test_input($_POST['emailForgot']);
        $user_mail = Users::where('email', $mail)->get();
        if (!$user_mail->isEmpty()){
        $content = 'Đặt lại mật khẩu' . '<br>' .
            'Click vào đây để đặt lại mật khẩu <a href="http://' . $_SERVER['HTTP_HOST'] . '/superFood/admin/resetPassword/create?email=' . $mail . '">Đặt lại mật khẩu</a>';

        Mail::send($mail, $user_mail[0]->firstname, 'Mật khẩu mới của bạn!', $content);
        }
    else{
        echo "<script>alert('Ko có Email nào như vậy'); window.location = '/superFood/admin/forgotPassword/create';</script>";

    }
        echo "<script>alert('Vui lòng kiểm tra Email của bạn'); window.location = '/superFood/admin/forgotPassword/create';</script>";
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
        $id = $id['id'];
        $user = Users::find($id);
        $confirmPass = test_input($_POST['profileConfirmPass']);
        $newPass = test_input($_POST['newPassword']);
        $repeatNewPassword = test_input($_POST['repeatNewPassword']);
        $editOk = 1;
        if ($confirmPass == "" || $newPass == "" || $repeatNewPassword == "") {
            $editOk = 0;
        }
        if ($user['password'] != md5($confirmPass)) {
            $editOk = 0;
        }
        if ($newPass != $repeatNewPassword) {
            $editOk = 0;
        }
        if (!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $newPass)) {
            $editOk = 0;
        }
        if ($editOk != 0) {
            $newPass = md5($newPass);
            $change = $user->update([
                'password' => $newPass
            ]);
            if ($change){
                header('Location: /superFood/admin/userProfile/passEdit/' . $id);
            }
            else{
                echo "<script>alert('Sửa mật khẩu không thành công'); window.location= '/superFood/admin/userProfile/passEdit/$id'</script>";
            }
        }
        else{
            echo "<script>alert('Sửa mật khẩu không thành công'); window.location= '/superFood/admin/userProfile/passEdit/$id'</script>";
        }
    }

    public function edit($id)
    {
        $user = Users::find($id['id']);
        Blade::render('admin/password/change', compact('user'));
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
