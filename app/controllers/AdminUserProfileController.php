<?php

namespace App\controllers;

use App\Blade\Blade;
use App\database\Database;
use App\Users;

new Database;

class AdminUserProfileController extends Controller
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
    }

    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     * Example : Product::create($data)
     */
    public function store()
    {

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
        $firstname = $_POST['profileFirstName'];
        $lastname = $_POST['profileLastName'];
        $email = $_POST['profileEmail'];
        $flag = 1;
        if ($firstname === "" || $lastname === "" || $email === "") {
            $flag = 0;
        }
        if ($flag === 1) {
            $user = Users::find($id)->update([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email
            ]);
            if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
                $image_src = uploadFile($_FILES['fileToUpload'], 'user');
                $user = Users::find($id)->update([
                    'images' => $image_src
                ]);
            }
            if ($user) {
                header('Location: /superFood/admin/userProfile/edit/' . $id);
            } else {
                echo "<script>alert('Sửa không thành công'); window.location= '/superFood/admin/userProfile/edit/$id'</script>";
            }
        } else {
            echo "<script>alert('Sửa không thành công'); window.location= '/superFood/admin/userProfile/edit/$id'</script>";
        }
    }

    public function edit($id)
    {
        $user = Users::find($id['id']);
        Blade::render('admin/userProfile/edit', compact('user'));
    }

    /**
     * @function delete()
     * Delete data with id
     * Type id : number
     * Example : Product::delete()
     */
    public function delete($id)
    {
        Users::find($id['id'])->update([
           'images' => ''
        ]);
        header("Location:/superFood/admin/userProfile/edit/".$id['id']);
    }
}
