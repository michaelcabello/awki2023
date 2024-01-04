<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Anio;
use App\Models\Color;
use App\Models\Marca;
use App\Models\Modello;
use App\Models\Categoria;
use App\Models\Expediente;
use App\Models\Awkicliente;
use App\Models\Statusfinal;
use App\Models\Tipodeventa;
use Illuminate\Support\Arr;
use App\Models\Statussunarp;
use Illuminate\Http\Request;
use App\Models\Tipodedocumento;
use App\Models\Oficinaregistral;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ExpedienteController extends Controller
{

    public function index()
    {
    }


    public function create(Awkicliente $clientee)
    {
        //dd($clientee->id);
        $expedientes = new Expediente(); //instanciamos el modelo expediente
        //$this->authorize('create', $user);
        //$roles = Role::with('permissions')->get();
        //$permissions = Permission::pluck('name','id');
        //$positions = Position::all();
        $tipodedocumentos = Tipodedocumento::pluck('nombre', 'id');
        $tipodeventas = Tipodeventa::pluck('nombre', 'id');
        $marcas = Marca::pluck('nombre', 'id');
        $modellos = Modello::pluck('nombre', 'id');
        $colors = Color::pluck('nombre', 'id');
        $anios = Anio::pluck('nombre', 'id');
        $categorias = Categoria::pluck('nombre', 'id');
        $oficinaregistrals = Oficinaregistral::pluck('nombre', 'id');
        $statussunarps = Statussunarp::pluck('nombre', 'id');
        $statusfinals = Statusfinal::pluck('nombre', 'id');
        return view('admin.expedientes.create', compact('expedientes', 'tipodedocumentos', 'tipodeventas', 'marcas', 'modellos', 'colors', 'categorias', 'oficinaregistrals', 'statussunarps', 'statusfinals', 'anios', 'clientee'));
    }


    public function store(Request $request)
    {
        //validar
        //dd($request->confirmaciondeplaca);

        $data = $request->validate([
            'awkicliente_id' => 'required',
            'awkitienda_id' => 'nullable',
            'awkizona_id' => 'nullable',
            'tipodedocumento_id' => 'nullable',
            'numdocumento' => 'nullable',
            'fechaventa' => 'nullable',
            'fecharecepcion' => 'nullable',
            'pagoadministrativo' => 'nullable',
            'tipodeventa_id' => 'nullable',
            'montodelacompra' => 'nullable',
            'marca_id' => 'nullable',
            'modello_id' => 'nullable',
            'chasis' => 'nullable',
            'motor' => 'nullable',
            'color_id' => 'nullable',
            'anio_id' => 'nullable',
            'categoria_id' => 'nullable',
            'dua' => 'nullable',
            'item' => 'nullable',
            'certificado' => 'nullable',
            'archivocertificado' => 'nullable',
            'oficinaregistral_id ' => 'nullable',
            'fechaingreso' => 'nullable',
            'titulo' => 'nullable',
            'codigodeverificacion' => 'nullable',
            'recibo' => 'nullable',
            'importe' => 'nullable',
            'statussunarp_id' => 'nullable',
            'tarjetadepropiedad' => 'nullable',
            'cargoenvio' => 'nullable',
            'numerodeplaca' => 'nullable',
            'fechadeenvio' => 'nullable',
            'guiaderemision' => 'nullable',
            'statusfinal' => 'nullable',
            'legalizacion_id' => 'nullable',
            'statusfinal_id' => 'nullable',
            'observacion' => 'nullable',
            'confirmaciondeplaca' => 'nullable',
            'fechaderevision' => 'nullable',
            'placa' => 'nullable',
            'codigoplaca' => 'nullable',
            'monto' => 'nullable',
            'fechadepago' => 'nullable',
            'facturaapp' => 'nullable',
            'confirmaciondeenvio' => 'nullable',
            'confirmaciondecobro' => 'nullable',
            'confirmarfindetramite' => 'nullable',
           'factura' => 'nullable',
           'fechadefacturacion' => 'nullable',
           'fechadeabonoaap' => 'nullable',
           'abonoaap' => 'nullable',
           'pendientedepago' => 'nullable',




        ]);

        $data['user_id'] = Auth()->user()->id; //le pasamos el usuario autentificado

        $datafinal = Arr::except($data, ['fechaventa', 'fecharecepcion', 'fechaingreso', 'fechaderevision']);
        //$user_id = Auth()->user()->id;

        // dd($user_id);

        $expedientee = Expediente::create($datafinal);

        //$expedientee->update($request->except(['fechaventa','fecharecepcion','fechaingreso']));//actualiza todos los campos excepto fechaventa


        if ($data['fechaventa']) { //validamos cuando no ingresan fecha
            $fechaVenta = Carbon::createFromFormat('d-m-Y', $request->input('fechaventa'))->format('Y-m-d');

            $expedientee->update([
                'fechaventa' => $fechaVenta,
                // Añade otros campos aquí según sea necesario
            ]);
        }


        if ($data['fechaderevision']) { //validamos cuando no ingresan fecha
            $fechaderevision = Carbon::createFromFormat('d-m-Y', $request->input('fechaderevision'))->format('Y-m-d');

            $expedientee->update([
                'fechaderevision' => $fechaderevision,
                // Añade otros campos aquí según sea necesario
            ]);
        }



        if($request->file('tarjetadepropiedad')){
            $expedientee->tarjetadepropiedad = Storage::disk('s3')->put('tarjetadepropiedad', $request->file('tarjetadepropiedad'), 'public');
        }else{
            $expedientee->tarjetadepropiedad = null;
        }

        if($request->file('cargoenvio')){
            $expedientee->cargoenvio = Storage::disk('s3')->put('cargoenvio', $request->file('cargoenvio'), 'public');
        }else{
            $expedientee->cargoenvio = null;
        }

        $expedientee->save();



        return redirect()->route('expediente.list')->withFlash('El Expediente fue creado correctamente');
    }


    public function show($id)
    {
        //
    }


    public function edit(Expediente $expedientee)
    {
        $awkicliente_id = $expedientee->awkicliente_id;
        $clientee = Awkicliente::find($awkicliente_id);

        $tipodedocumentos = Tipodedocumento::pluck('nombre', 'id');
        $tipodeventas = Tipodeventa::pluck('nombre', 'id');
        $marcas = Marca::pluck('nombre', 'id');
        $modellos = Modello::pluck('nombre', 'id');
        $colors = Color::pluck('nombre', 'id');
        $anios = Anio::pluck('nombre', 'id');
        $categorias = Categoria::pluck('nombre', 'id');
        $oficinaregistrals = Oficinaregistral::pluck('nombre', 'id');
        $statussunarps = Statussunarp::pluck('nombre', 'id');
        $statusfinals = Statusfinal::pluck('nombre', 'id');


        if ($expedientee->fecharecepcion) {
            // Convertir y formatear la fecha si existe
            $expedientee->fecharecepcion = Carbon::parse($expedientee->fecharecepcion)->format('d-m-Y');
        }

        if ($expedientee->fechaventa) {
            // Convertir y formatear la fecha si existe
            $expedientee->fechaventa = Carbon::parse($expedientee->fechaventa)->format('d-m-Y');
        }

        if ($expedientee->fechaingreso) {
            // Convertir y formatear la fecha si existe
            $expedientee->fechaingreso = Carbon::parse($expedientee->fechaingreso)->format('d-m-Y');
        }

        if ($expedientee->fechadeenvio) {
            // Convertir y formatear la fecha si existe
            $expedientee->fechadeenvio = Carbon::parse($expedientee->fechadeenvio)->format('d-m-Y');
        }

        if ($expedientee->fechaderevision) {
            // Convertir y formatear la fecha si existe
            $expedientee->fechaderevision = Carbon::parse($expedientee->fechaderevision)->format('d-m-Y');
        }

        if ($expedientee->fechadepago) {
            // Convertir y formatear la fecha si existe
            $expedientee->fechadepago = Carbon::parse($expedientee->fechadepago)->format('d-m-Y');
        }

        if ($expedientee->fechadefacturacion) {
            // Convertir y formatear la fecha si existe
            $expedientee->fechadefacturacion = Carbon::parse($expedientee->fechadefacturacion)->format('d-m-Y');
        }

        if ($expedientee->fechadeabonoaap) {
            // Convertir y formatear la fecha si existe
            $expedientee->fechadeabonoaap = Carbon::parse($expedientee->fechadeabonoaap)->format('d-m-Y');
        }


        return view('admin.expedientes.edit', compact('expedientee', 'tipodedocumentos', 'tipodeventas', 'marcas', 'modellos', 'colors', 'categorias', 'oficinaregistrals', 'statussunarps', 'statusfinals', 'anios', 'clientee'));
    }


    public function update(Request $request, Expediente $expedientee)
    {

        //dd($request);

        //validar
        $request->validate([
            'awkicliente_id' => 'required',
            'awkitienda_id' => 'nullable',
            'awkizona_id' => 'nullable',
            'tipodedocumento_id' => 'nullable',
            'numdocumento' => 'nullable',
            'fechaventa' => 'nullable',
            'fecharecepcion' => 'nullable',
            'pagoadministrativo' => 'nullable',
            'tipodeventa_id' => 'nullable',
            'montodelacompra' => 'nullable',
            'marca_id' => 'nullable',
            'modello_id' => 'nullable',
            'chasis' => 'nullable',
            'motor' => 'nullable',
            'color_id' => 'nullable',
            'anio_id' => 'nullable',
            'categoria_id' => 'nullable',
            'dua' => 'nullable',
            'item' => 'nullable',
            'certificado' => 'nullable',
            'archivocertificado' => 'nullable',
            'oficinaregistral_id ' => 'nullable',
            'fechaingreso' => 'nullable',
            'titulo' => 'nullable',
            'codigodeverificacion' => 'nullable',
            'recibo' => 'nullable',
            'importe' => 'nullable',
            'statussunarp_id' => 'nullable',
            'tarjetadepropiedad' => 'nullable',
            'cargoenvio' => 'nullable',
            'numerodeplaca' => 'nullable',
            'fechadeenvio' => 'nullable',
            'guiaderemision' => 'nullable',
            'statusfinal' => 'nullable',
            'legalizacion_id' => 'nullable',
            'statusfinal_id' => 'nullable',
            'fechaderevision' => 'nullable',
            'fechadepago' => 'nullable',
            'fechadefacturacion' => 'nullable',
            'fechadeabonoaap' => 'nullable',
        ]);
        //dd($expedientee);
        //$expedientee->update($request->all());
        $expedientee->update($request->except(['fechaventa', 'fecharecepcion', 'fechaingreso', 'fechadeenvio', 'fechaderevision', 'fechadepago', 'fechadefacturacion', 'fechadeabonoaap'])); //actualiza todos los campos excepto fechaventa

        if ($request->input('fechaventa')) {//verificamos que exista los datos
            $fechaventa = Carbon::createFromFormat('d-m-Y', $request->input('fechaventa'))->format('Y-m-d');
        }
        else{
            $fechaventa = null;
        }

        if ($request->input('fecharecepcion')) {//verificamos que exista los datos
            $fecharecepcion = Carbon::createFromFormat('d-m-Y', $request->input('fecharecepcion'))->format('Y-m-d');
        }
        else{
            $fecharecepcion = null;
        }

        if ($request->input('fechaingreso')) {//verificamos que exista los datos
            $fechaingreso = Carbon::createFromFormat('d-m-Y', $request->input('fechaingreso'))->format('Y-m-d');
        }
        else{
            $fechaingreso = null;
        }

        if ($request->input('fechadeenvio')) {//verificamos que exista los datos
            $fechadeenvio = Carbon::createFromFormat('d-m-Y', $request->input('fechadeenvio'))->format('Y-m-d');
        }
        else{
            $fechadeenvio = null;
        }


        if ($request->input('fechaderevision')) {//verificamos que exista los datos
            $fechaderevision = Carbon::createFromFormat('d-m-Y', $request->input('fechaderevision'))->format('Y-m-d');
        }
        else{
            $fechaderevision = null;
        }

        if ($request->input('fechadepago')) {//verificamos que exista los datos
            $fechadepago = Carbon::createFromFormat('d-m-Y', $request->input('fechadepago'))->format('Y-m-d');
        }
        else{
            $fechadepago = null;
        }

        if ($request->input('fechadefacturacion')) {//verificamos que exista los datos
            $fechadefacturacion = Carbon::createFromFormat('d-m-Y', $request->input('fechadefacturacion'))->format('Y-m-d');
        }
        else{
            $fechadefacturacion = null;
        }


        //dd($request->fechadeabonoapp);

        if ($request->input('fechadeabonoaap')) {
            $fechadeabonoaap = Carbon::createFromFormat('d-m-Y', $request->input('fechadeabonoaap'))->format('Y-m-d');
        }
        else{
            $fechadeabonoaap = null;
        }

        //dd($fechadeabonoapp);

        if($request->hasFile('tarjetadepropiedad')){
            $tarjetadepropiedad = Storage::disk('s3')->put('tarjetadepropiedad', $request->file('tarjetadepropiedad'), 'public');
            $expedientee->update([
                'tarjetadepropiedad' => $tarjetadepropiedad
            ]);
        }

        if($request->hasFile('cargoenvio')){
            $cargoenvio = Storage::disk('s3')->put('cargoenvio', $request->file('cargoenvio'), 'public');
            $expedientee->update([
                'cargoenvio' => $cargoenvio
            ]);
        }



        //$fecharecepcion = Carbon::createFromFormat('d-m-Y', $request->input('fecharecepcion'))->format('Y-m-d');
        //$fechaingreso = Carbon::createFromFormat('d-m-Y', $request->input('fechaingreso'))->format('Y-m-d');
        //$fechadeenvio = Carbon::createFromFormat('d-m-Y', $request->input('fechadeenvio'))->format('Y-m-d');

        $expedientee->update([
            'fechaventa' => $fechaventa,
            'fecharecepcion' => $fecharecepcion,
            'fechaingreso' => $fechaingreso,
            'fechadeenvio' => $fechadeenvio,
            'fechaderevision' => $fechaderevision,
            'fechadepago' => $fechadepago,
            'fechadefacturacion' => $fechadefacturacion,
            'fechadeabonoaap' => $fechadeabonoaap,

            // Añade otros campos aquí según sea necesario
        ]);



        //return redirect()->route('admin.expediente.edit', $expedientee)->with('flash', 'Tu Expediente fue actualizado');
        return redirect()->route('admin.expediente.edit', $expedientee)->withFlash('Tu Expediente fue actualizado');
    }


    public function destroy($id)
    {
        //
    }
}
