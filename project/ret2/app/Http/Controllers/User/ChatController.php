<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use App\Article;
use App\ArticleCategory;
use App\Chatusuarios;
use App\Lineachat;
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


    public function abrirChat($id)
    {
      $chat = Chatusuarios::where('chatusuarios.id_subasta',$id)->get()->first();

      return redirect('user/chat/'.$chat->id);
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
     public function data()
     {

       $chat = Chatusuarios::select('chatusuarios.id','u1.name','chatusuarios.created_at')
       ->where('chatusuarios.id_user1', Auth::id())
       ->orWhere('chatusuarios.id_user2', Auth::id())
       ->join('users as u1','chatusuarios.id_user1','=','u1.id');

       $table = Datatables::of($chat)
       ->remove_column('id')
       ->addColumn('Acciones', '<a href="{{{ URL::to(\'user/chat/\' . $id ) }}}" class="btn btn-info btn-sm iframe" ><span class="fa fa-comments-o"></span>  Abrir </a>')
       ->make();

       return $table;
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
                Chatusuarios::where('id', '=', $value) -> update(array('position' => $order));
                $order++;
            }
        }
        return $list;
    }

    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
     public function getChat($id)
     {
       $lineas = lineachat::select('lineachats.id','lineachats.text','users.name','lineachats.created_at')
       ->where('lineachats.id_chat', $id)
       ->join('users','users.id','=','lineachats.id_usuario')
       ->orderBy('created_at', 'ASC')
       ->get();

       return view('user.chat.view', compact('lineas','id'));

     }
     public function getChatAJAX($id)
     {
       $lineas = lineachat::select('lineachats.id','lineachats.text','users.name','lineachats.created_at')
       ->where('lineachats.id_chat', $id)
       ->join('users','users.id','=','lineachats.id_usuario')
       ->orderBy('created_at', 'ASC')
       ->get();

       return $lineas;

     }
     public function postChatAJAX($id)
     {

       $newLinea = new lineachat();
       $newLinea -> id_usuario = Auth::id();
       $newLinea -> text = $_POST['mensaje'];
       $newLinea -> id_chat = $id;
       $newLinea -> save();
       $lineas = lineachat::select('lineachats.id','lineachats.text','users.name','lineachats.created_at')
       ->where('lineachats.id_chat', $id)
       ->join('users','users.id','=','lineachats.id_usuario')
       ->orderBy('created_at', 'ASC')
       ->get();

       return $lineas;

     }
}
