<?php

use App\components\CategoriesRecursive;
use App\NewsCategories;
use Illuminate\Support\Facades\DB;

const BASE_URL = 'http://localhost/superfood/public/';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getCategory($parent_id): string
{
    $data = NewsCategories::all();
    $recursive = new CategoriesRecursive($data);
    return $recursive->categoriesRecursive($parent_id);
}


function uploadFile($file, $path): string
{
    $base_folder = 'uploads';

    //  Lấy tên file
    $name = explode('.', $file['name']);
    $file_name = explode('/', $file['name'])[count(explode('/', $file['name'])) - 1];
    $file_name_insert = str_replace(end($name), '', $file_name) . end($name);

    //  Lấy đường dẫn file
    $dir_name = $path . '/' . date('Y') . '/' . date('m') . '/' . date('d') ;

    //  Kiểm tra nếu mà folder chứa ảnh cho ngày hiện tại mà chưa có thì tạo mới
    if (!is_dir($base_folder . '/' . $dir_name)) {
        // Tạo thư mục của chúng tôi nếu nó không tồn tại
        mkdir($base_folder . '/' . $dir_name, 0755, true);
    }

    move_uploaded_file($file['tmp_name'], $base_folder . '/' . $dir_name . '/' . $file_name_insert);
    return $dir_name . '/' . $file_name_insert;
}

function checkPer($user_id, $per_code){
    $role_pers = \App\LinkRolePermission::join('permissions', 'link_role_permission.permission_id', '=', 'permissions.id')
        ->join('roles','link_role_permission.role_id', '=', 'roles.id')
        ->join('users', 'users.role_id', '=', 'roles.id')
        ->where('users.id', $user_id)
        ->where('permissions.code', $per_code)
        ->select('link_role_permission.*')->get();
        if(!$role_pers->isEmpty()){
            return true;
        }else{
            return false;
        }
}