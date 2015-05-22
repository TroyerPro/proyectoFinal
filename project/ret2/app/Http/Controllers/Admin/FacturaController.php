<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UserController;
use App\Subasta;
use App\Empresa;
use App\Puja;
use App\User;
use App\Categoria;
use App\Factura;
use DateTime;
use DomDocument;
use URL;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\DeleteRequest;
use App\Http\Requests\Admin\ReorderRequest;
use Illuminate\Support\Facades\Auth;
use Datatables;
use Response;
use File;
use Carbon\Carbon;
use App;


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
    public function generatePdf(){
      $id = $_POST['id'];
      $subasta =  Subasta::find($id);
      $factura = Factura::find($subasta->id_factura);

      if(File::exists( "facturas/".$factura->id.".pdf")){
            return asset('facturas/'.$factura->id.'.pdf');
      }
      else{


      $idcomprador = Puja::find($subasta->puja_ganadora);
      $comprador = User::find($idcomprador->id_usuario);
      $vendedor = User::find($subasta->id_user_vendedor);
      $empresa = Empresa::find(1);
      $fecha = Carbon::createFromTimestamp(strtotime($factura->fecha));
      $fecha = $fecha -> format('d/m/Y');

      $pdf = App::make('dompdf'); //Note: in 0.6.x this will be 'dompdf.wrapper'
      $logo = asset("/img/logo-med.png");
      $pdf->loadHTML('<html>
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>

    <body>

    	<h1 style="text-align:center">Factura</h1>
    	<hr style="width:90%">
    	<table border="1" style="width:80%" align="center">
    		<tr style="height: 50px">
    			<th colspan="2">Datos Factura</th>
    			<th colspan="3">Datos Empresa</th>
    		</tr>
    		<tr>
    			<td>Id Factura :</td>
    			<td>'.$factura->id.'</td>
    			<td>Nombre :</td>
    			<td>'.$empresa->nombre.'</td>
    			<td rowspan="2" align="center"><img src="'.$logo.'" style="width:100px" ></td>
    		</tr>

    		<tr>
    			<td>Fecha :  </td>
    			<td>'.$fecha.'</td>
    			<td>Direccion</td>
    			<td>'.$empresa->direccion.'</td>
    		</tr>
    	</table>

    	<h2 style="text-align:center" >Usuarios</h2>
    	<hr style="width:80%">
    	<table border="1" style="width:80%" align="center">
    		<tr style="height: 50px">
    			<th colspan="2">Vendedor</th>
    			<th colspan="2">Comprador</th>
    		</tr>
    		<tr>
    			<td>Nombre :</td>
    			<td>'.$vendedor->name.'</td>
    			<td>Nombre :</td>
    			<td>'.$comprador->name.'</td>
    		</tr>
    		<tr>
    			<td>DNI </td>
    			<td>'.$vendedor->nif.'</td>
    			<td>DNI</td>
    			<td>'.$comprador->nif.'</td>
    		</tr>
    	</table>
    	<table border="1" style="width:80%" align="center">
    		<caption><h3>Subasta</h3></caption>
    		<tr>
    			<td>Nombre</td>
    			<td>'.$subasta->nombre.'</td>
    			<td rowspan="3" style="width:120px"></td>
    		</tr>
    		<tr>
    			<td>Metodo de Pago</td>
    			<td> '.$subasta->metodo_pago.' </td>

    		</tr>
    		<tr style="height:120px">
    			<td>Descripcion</td>
    			<td>'.$subasta->descripcion.' </td>

    		</tr>
    		<tr>
    			<td>Total</td>
    			<td>............................................................................</td>
    			<td style="width:120px">'.$factura->precio.' €</td>
    		</tr>
    	</table>
    </body>
    </html>');
          $pdf->save('facturas/'.$factura->id.'.pdf');
          return asset('facturas/'.$factura->id.'.pdf');
    }


    }

    public function generateXml(){
      $id = $_POST['id'];
      $subasta =  Subasta::find($id);
      $factura = Factura::find($subasta->id_factura);

      if(File::exists( "facturas/".$factura->id.".xml")){
            return asset('facturas/'.$factura->id.'.xml');
      }
      else{

      $idcomprador = Puja::find($subasta->puja_ganadora);
      $comprador = User::find($idcomprador->id_usuario);
      $vendedor = User::find($subasta->id_user_vendedor);
      $empresa = Empresa::find(1);


      $xml = new DomDocument( "1.0", "UTF-8" );
      $xml_factura = $xml->createElement( "Factura" );

      //Empresa
      $xml_empresa = $xml->createElement( "Empresa");
      $xml_empNom = $xml->createElement( "Nombre",$empresa->nombre);
      $xml_empDir = $xml->createElement( "Direccion",$empresa->direccion);

      $xml_factura->appendChild($xml_empresa);
      $xml_empresa->appendChild($xml_empNom);
      $xml_empresa->appendChild($xml_empDir);

      //Datos
      $xml_datos = $xml->createElement("Datos");
      $xml_id = $xml->createElement("Id_Factura",$factura->id);
      $xml_fecha = $xml->createElement("Fecha",$factura->fecha);

      $xml_factura->appendChild($xml_datos);
      $xml_datos->appendChild($xml_id);
      $xml_datos->appendChild($xml_fecha);


      //Usuario
      //Vendedor
      $xml_user = $xml->createElement( "Usuarios");
      $xml_vendedor = $xml->createElement( "Vendedor");
      $xml_vendname = $xml->createElement( "Nombre",$vendedor->name);
      $xml_venddni = $xml->createElement( "Dni",$vendedor->nif);
      //Comprador
      $xml_comprador = $xml->createElement( "Comprador");
      $xml_compname = $xml->createElement( "Nombre",$comprador->name);
      $xml_compdni = $xml->createElement( "Dni",$comprador->nif);

      $xml_factura->appendChild($xml_user );
      $xml_user->appendChild($xml_vendedor);
      $xml_vendedor->appendChild($xml_vendname);
      $xml_vendedor->appendChild($xml_venddni);
      $xml_user->appendChild($xml_comprador);
      $xml_comprador->appendChild($xml_compname);
      $xml_comprador->appendChild($xml_compdni);

      //Subasta
      $xml_subasta = $xml->createElement( "Subasta");
      $xml_nombre = $xml->createElement( "Nombre",$subasta->nombre);
      $xml_descripcion = $xml->createElement( "Descripcion",$subasta->descripcion);
      $xml_precio = $xml->createElement( "Precio",$factura->precio);
      $xml_metodo = $xml->createElement( "Metodo_Pago",$subasta->metodo_pago);
      $xml_factura->appendChild($xml_subasta );
      $xml_subasta->appendChild($xml_nombre);
      $xml_subasta->appendChild($xml_descripcion);
      $xml_subasta->appendChild($xml_metodo);
      $xml_subasta->appendChild($xml_precio);

      $xml->appendChild( $xml_factura );

      $xml->FormatOutput = true;
      $string_value = $xml->saveXml();

      $xml->save('facturas/'.$factura->id.'.xml');
      return asset('facturas/'.$factura->id.'.xml');
    }



    }

}
