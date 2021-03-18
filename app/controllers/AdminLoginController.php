<?php
namespace App\controllers;
use App\Blade\Blade;
use App\database\Database;
use App\Users;

new Database;
class AdminLoginController extends Controller
{
    /**
     * @function index()
     * List All data from database
     * Example : Product::all()
     */
    public function index(){
    }
    /**
     * @function create()
     * View form create
     * Type data : Array
     * Example : Product::create($data)
     */
    public function create(){
        Blade::render('admin/auth/login');
    }
    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     * Example : Product::create($data)
     */
    public function store(){
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $flag = 0;
        $users = Users::all();
        foreach ($users as $key => $user){
            if($email == $user->email && md5($password) == $user->password){
                $flag = 1;
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email']
                ];
                if (isset($_POST['remember_me'])) {
                    setcookie('email', $email, time() + (3600 * 24 * 30));
                    setcookie('password', $_POST["password"], time() + (3600 * 24 * 30));
                }
                header('Location:/superFood/admin/dashboard/');
            }
        }
        if ($flag == 0) {
            echo "<script>alert('Sai tài khoản hoặc mật khẩu!'); window.location= '/superFood/admin/login';</script>";
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
    }

    public function edit($id){
    }

    /**
     * @function delete()
     * Delete data with id
     * Type id : number
     * Example : Product::delete()
     */
    public function delete($id){
    }

    public function logout(){
        unset($_SESSION['user']);
        header('Location:/superFood/admin/login');
    }
}
