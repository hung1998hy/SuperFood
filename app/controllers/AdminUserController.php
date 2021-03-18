<?php
namespace App\controllers;
use App\Blade\Blade;
use App\database\Database;
use App\Permissions;
use App\Roles;
use App\Users;

new Database;
class AdminUserController extends Controller
{
    /**
     * @function index()
     * List All data from database
     * Example : Product::all()
     */
    public function index(){
        $users = Users::all();
        $roles = Roles::all();
        Blade::render('admin/users/index', compact('users', 'roles'));
    }
    /**
     * @function create()
     * View form create
     * Type data : Array
     * Example : Product::create($data)
     */
    public function create(){
        $roles = Roles::all();
        Blade::render('admin/users/add',compact('roles'));
    }
    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     * Example : Product::create($data)
     */
    public function store(){
        $firstname = test_input($_POST["userFirstNameAdd"]);
        $lastname = test_input($_POST["userLastNameAdd"]);
        $email = test_input($_POST["userEmailAdd"]);
        $role_id = $_POST['role_id'];
        if ($role_id == '') {
            $role_id = null;
        }
        $password = test_input($_POST["userPasswordAdd"]);
        $repassword = test_input($_POST["userRepasswordAdd"]);
        $flag = 1;
        if ($firstname === "" || $lastname === "" || $email === "") {
            $flag = 0;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $flag = 0;
        }
        if (!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $password)) {
            $flag = 0;
        }
        if ($password !== $repassword) {
            $flag = 0;
        }
        if ($flag === 1){
            if (is_uploaded_file($_FILES['userImage']['tmp_name'])){
                $image_src = uploadFile($_FILES['userImage'], 'users');
                $user = Users::create([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'password' => md5($password),
                    'role_id' => $role_id,
                    'images' => $image_src
                ]);
            }else{$user = Users::create([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => md5($password),
                'role_id' => $role_id,
                ]);
            }
            if ($user){
                header('Location: /superFood/admin/users/');
            }else{
                echo "<script>alert('Tạo người dùng không thành công'); window.location= '/superFood/admin/users/';</script>";
            }
        }else{
            echo "<script>alert('Tạo người dùng không thành công'); window.location= '/superFood/admin/users/';</script>";
        }
    }
    /**
     * @function show()
     * Get detail a data in database
     * Type id : number
     * Get id from URl
     * Example : Product::find($id)
     */
    public function show($id){
    }
    /**
     * @function update()
     * Update data with id to database
     * Type id :number
     * Get id from URL
     * Type data : Array
     * Example : Product::find($id)->update($data)
     */
    public function update($id){
        $firstname = $_POST['userFirstNameUpdate'];
        $lastname = $_POST['userLastNameUpdate'];
        $email = $_POST['userEmailUpdate'];
        $role_id = $_POST['role_id'];
        if ($role_id == '') {
            $role_id = null;
        }
        $password = $_POST['userPasswordUpdate'];
        $repassword = $_POST['userRepasswordUpdate'];
        $flag = 1;
        if ($firstname === "" || $lastname === "" || $email === "") {
            $flag = 0;
        }
        if ($password !== $repassword) {
            $flag = 0;
        }
        if ($flag === 1){
            $image_src = uploadFile($_FILES['userImageUpdate'], 'users');
            if ($password == ""){
                $user = Users::find($id['id'])->update([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'role_id' => $role_id,
                    'images' => $image_src

                ]);
            }
            if (is_uploaded_file($_FILES['userImageUpdate']['tmp_name'])){
                $user = Users::find($id['id'])->update([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'role_id' => $role_id,
                    'images' => $image_src
                ]);
            }
            else{
                $user = Users::find($id['id'])->update([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'password' => md5($password),
                    'role_id' => $role_id,
                    'images' => $image_src
                ]);
            }
            if ($user){
                header('Location: /superFood/admin/users/');
            }else{
                echo "<script>alert('Sửa người dùng không thành công'); window.location= '/superFood/admin/users/';</script>";
            }
        }else{
            echo "<script>alert('Sửa người dùng không thành công'); window.location= '/superFood/admin/users/';</script>";
        }
    }

    public function edit($id){
        $user = Users::find($id['id']);
        $roles = Roles::all();
        Blade::render('admin/users/edit', compact('user', 'roles'));
    }

    /**
     * @function delete()
     * Delete data with id
     * Type id : number
     * Example : Product::delete()
     */
    public function delete($id){
        Users::destroy($id);
        header('Location: /superFood/admin/users/');
    }
}
