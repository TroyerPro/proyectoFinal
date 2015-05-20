<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UserController;
use App\Subasta;
use App\Categoria;
use DateTime;
use DomDocument;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;

class FacturaController extends UserController {

    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function show()
    {
        // Show the page
        return view('admin.subasta.index');
    }
    public function getFinalizadas(){

      return view('admin.subasta.finalizadas');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate()
    {
        $nombre = "";
        $estado = "";
        $descripcion = "";
		    $categoria = Categoria::all();
		    $precio_inicial = "";
        $imagen = "";
        $metodo = "";

        // Show the page
        return view('user.subasta.create', compact('nombre','estado','descripcion','categoria','precio_inicial','imagen','metodo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate()
    {
      $fechaIni = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['fechaIni']);

      $subasta = new Subasta();
      $subasta -> id_user_vendedor = Auth::id();
      $subasta -> nombre = $_POST['nombre'];
      $subasta -> descripcion = $_POST['desc'];
      $subasta -> id_categoria = $_POST['categoria'];
      $subasta -> metodo_pago = $_POST['metodo'];
      $subasta -> estado = $_POST['estado'];
      $subasta -> estado_subasta = true;
      $subasta -> fecha_inicio = $fechaIni;
      $subasta -> fecha_final = $_POST['fechaFin'];
      $subasta -> precio_inicial = floatval($_POST['precioIni']);
      $subasta -> imagen = "ruta";
      $subasta -> save();

      return view('user.subasta.index');

    }

    public function generateXml(){
      
      $id = $_POST['id'];
      $xml = new DomDocument( "1.0", "UTF-8" );
      $xml_album = $xml->createElement( "Factura" );
      $xml_track = $xml->createElement( "User" );
      $xml_album->appendChild( $xml_track );
      $xml->appendChild( $xml_album );

      $xml->FormatOutput = true;
      $string_value = $xml->saveXml();

      $xml->save("factura.xml");



    }

}
