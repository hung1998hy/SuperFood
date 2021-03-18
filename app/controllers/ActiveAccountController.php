<?php
namespace App\controllers;
use App\Blade\Blade;
use App\database\Database;
use App\LinkNewsTags;
use App\News;
use App\NewsCategories;
use App\NewsTags;
use App\Users;

new Database;
class  ActiveAccountController extends Controller
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
    }
    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     * Example : Product::create($data)
     */
    public function store(){

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
        $time = $_GET['time'];
        $now  = date('Y-m-d H:i:s');
        $tg_hop_le = $now - (60 * 60 * 24 * 3);
        if (strtotime($time) > $tg_hop_le) {
            Users::where('id', $id['id'])->where('is_active', 0)->update([
                'status' => 1,
                'is_active' => 1
            ]);
        }
        header("Location: /superFood/admin/login");
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
}
