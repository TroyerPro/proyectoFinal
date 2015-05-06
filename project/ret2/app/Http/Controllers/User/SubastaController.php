<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use App\Subasta;
use App\Categoria;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class SubastaController extends UserController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('user.subasta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $nombre = "";
        $descripcion = "";
		    $categoria = Categoria::all();
		    $precio_inicial = "";
        $imagen = "";
        $metodo = "";

        // Show the page
        return view('user.subasta.create', compact('nombre', 'descripcion','categoria','precio_inicial','imagen','metodo'));
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
        $subasta = Subasta::select('subastas.id','subastas.nombre','subastas.descripcion','subastas.fecha_final','subastas.precio_actual');

        return Datatables::of($subasta)
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/subasta/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ trans("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/subasta/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ trans("admin/modal.delete") }}</a>
                    <input type="hidden" name="row" value="{{$id}}" id="row">')
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
