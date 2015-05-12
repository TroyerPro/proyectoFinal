<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use App\Article;
use App\ArticleCategory;
use App\Language;
use App\Chatusuarios;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class ChatController extends UserController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function show()
    {
        // Show the page
        return view('user.chat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $languages = Language::all();
        $language = "";
		$newscategories = ArticleCategory::all();
		$newscategory = "";
        // Show the page
        return view('admin.news.create_edit', compact('languages', 'language','newscategories','newscategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(NewsRequest $request)
    {
        $news = new Article();
        $news -> user_id = Auth::id();
        $news -> language_id = $request->language_id;
        $news -> title = $request->title;
        $news -> article_category_id = $request->newscategory_id;
        $news -> introduction = $request->introduction;
        $news -> content = $request->content;
        $news -> source = $request->source;

        $picture = "";
        if(Input::hasFile('picture'))
        {
            $file = Input::file('picture');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $news -> picture = $picture;
        $news -> save();

        if(Input::hasFile('picture'))
        {
            $destinationPath = public_path() . '/images/news/'.$news->id.'/';
            Input::file('picture')->move($destinationPath, $picture);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id)
    {
        $news = Article::find($id);
        $languages = Language::all();
        $language = $news->language_id;
		$newscategories = ArticleCategory::all();
		$newscategory = $news->newscategory_id;

        return view('admin.news.create_edit',compact('news','languages','language','newscategories','newscategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postEdit(NewsRequest $request, $id)
    {
        $news = Article::find($id);
        $news -> user_id = Auth::id();
        $news -> language_id = $request->language_id;
        $news -> title = $request->title;
        $news -> article_category_id = $request->newscategory_id;
        $news -> introduction = $request->introduction;
        $news -> content = $request->content;
        $news -> source = $request->source;

        $picture = "";
        if(Input::hasFile('picture'))
        {
            $file = Input::file('picture');
            $filename = $file->getClientOriginalName();
            $extension = $file -> getClientOriginalExtension();
            $picture = sha1($filename . time()) . '.' . $extension;
        }
        $news -> picture = $picture;
        $news -> save();

        if(Input::hasFile('picture'))
        {
            $destinationPath = public_path() . '/images/news/'.$news->id.'/';
            Input::file('picture')->move($destinationPath, $picture);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */

    public function getDelete($id)
    {
        $news = Article::find($id);
        // Show the page
        return view('admin.news.delete', compact('news'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $news = Article::find($id);
        $news->delete();
    }


    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
     public function data()
     {
       $subasta = Chatusuarios::select('chatusuarios.id','chatusuarios.id_user1','chatusuarios.id_user2','chatusuarios.created_at')
       ->where('chatusuarios.id_user1', Auth::id());

       return Datatables::of($subasta)
       ->remove_column('id')


       ->make();
     }
    /**
     * Reorder items
     *
     * @param items list
     * @return items from @param
     */
    public function getReorder(ReorderRequest $request) {
        $list = $request->list;
        $items = explode(",", $list);
        $order = 1;
        foreach ($items as $value) {
            if ($value != '') {
                Article::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }
}
