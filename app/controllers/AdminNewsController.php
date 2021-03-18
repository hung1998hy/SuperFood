<?php
namespace App\controllers;
use App\Blade\Blade;
use App\components\CategoriesRecursive;
use App\database\Database;
use App\LinkNewsTags;
use App\News;
use App\NewsCategories;
use App\NewsTags;

new Database;
class AdminNewsController extends Controller
{
    /**
     * @function index()
     * List All data from database
     * Example : Product::all()
     */
    public function index(){
        $news = News::all();
        $categories = NewsCategories::all();
        $tags = NewsTags::all();
        $newsTags = LinkNewsTags::all();
        Blade::render('admin/news/index', compact('news', 'categories', 'tags', 'newsTags'));
    }
    /**
     * @function create()
     * View form create
     * Type data : Array
     * Example : Product::create($data)
     */
    public function create(){
        $tags = NewsTags::all();
        $html = getCategory($parent_id = 0);
        Blade::render('admin/news/add', compact('html', 'tags'));
    }
    /**
     * @function store()
     * Insert data to database
     * Type data : Array
     * Example : Product::create($data)
     */
    public function store(){
        $title = $_POST['newsTitleAdd'];
        $desc = $_POST['newsDescAdd'];
        $content = $_POST['newsContentAdd'];
        $author = $_POST['newsAuthorAdd'];
        $category = $_POST['newsCategoryAdd'];

        if (is_uploaded_file($_FILES['images']['tmp_name'])) {
            $image_src = uploadFile($_FILES['images'], 'news');
            $news = News::create([
                'title' => $title,
                'description' => $desc,
                'content' => $content,
                'author' => $author,
                'category_id' => $category,
                'images' => $image_src
            ]);
        }else{
            $news = News::create([
                'title' => $title,
                'description' => $desc,
                'content' => $content,
                'author' => $author,
                'category_id' => $category
            ]);
        }
        if ($news) {
            $tags = $_POST["tags"];
            if (!empty($tags)) {
                foreach ($tags as $tag_id) {
                    LinkNewsTags::create([
                        'news_id' => $news->id,
                        'tag_id' => $tag_id
                    ]);
                }
            }
            header('Location:/superFood/admin/news/');
        } else {
            echo "<script>alert('Thêm tin thất bại'); window.location= '/superFood/admin/news';</script>";
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
        $title = $_POST['newsTitleUpdate'];
        $desc = $_POST['newsDescUpdate'];
        $content = $_POST['newsContentUpdate'];
        $author = $_POST['newsAuthorUpdate'];
        $category = $_POST['newsCategoryUpdate'];

        $found_news = News::find($id['id']);
        if (is_uploaded_file($_FILES['images']['tmp_name'])){
            $image_src = uploadFile($_FILES['images'], 'news');
            $news = $found_news->update([
                'title' => $title,
                'description' => $desc,
                'content' => $content,
                'author' => $author,
                'category_id' => $category,
                'images' => $image_src
            ]);
        } else{
            $news = $found_news->update([
                'title' => $title,
                'description' => $desc,
                'content' => $content,
                'author' => $author,
                'category_id' => $category,
            ]);
        }


        if ($news) {
            //  Gắn tags
            $tags = $_POST["tags"];
            if (!empty($tags)) {
                //  Lấy tag đã tồn tại
                $newsTag = LinkNewsTags::where('news_id', $found_news->id)->get();
                $selected_tags = [];
                if (!$newsTag->isEmpty()) {
                    foreach ($newsTag as $tag) {
                        $selected_tags[$tag->tag_id] = $tag->tag_id;
                    }
                }

                foreach ($tags as $tag_id) {
                    //  Kiểm tra nếu có rồi thì bỏ qua
                    $newsTag = LinkNewsTags::where('news_id', $found_news->id)->where('tag_id', $tag_id)->get();
                    //  Insert thêm vào nếu chưa có
                    if ($newsTag->isEmpty()){
                        LinkNewsTags::create([
                            'news_id' => $found_news->id,
                            'tag_id' => $tag_id
                        ]);
                    }
                    unset($selected_tags[$tag_id]);
                }
                //  Loại bỏ tag thừa
                if (!empty($selected_tags)){
                    $arr = [];
                    foreach ($selected_tags as $v) {
                        $arr[] = $v;
                    }
                    LinkNewsTags::where('news_id', $found_news->id)->whereIn('tag_id', $arr)->delete();
                }
            }else{
                // trường hợp mà không chọn tag nào thì xóa hết các liên kết
                LinkNewsTags::where('news_id', $found_news->id)->delete();
            }
            header('Location:/superFood/admin/news/');
        } else {
            echo "<script>alert('Sửa tin thất bại'); window.location= '/superFood/admin/news/';</script>";
        }
    }

    public function edit($id){
        $tags = NewsTags::all();
        $news = News::find($id['id']);
        $newsTags = LinkNewsTags::all();
        $html = getCategory($news->category_id);
        Blade::render('admin/news/edit', compact('news', 'html', 'tags', 'newsTags'));
    }

    /**
     * @function delete()
     * Delete data with id
     * Type id : number
     * Example : Product::delete()
     */
    public function delete($id){
        News::destroy($id);
        header('Location:/superFood/admin/news/');
    }
}
