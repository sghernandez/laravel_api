<?php

namespace App\Http\Controllers\API;

# use App\Http\Resources\EmpleadoResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Http\Controllers\Controller;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return EmpleadoResource::collection(Empleado::all());

        return response()->json([
            'status' => true, 
            'empleados' => Empleado::all(),
            'message' => 'Listado de Empleados'
        ], Response::HTTP_OK);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {         
        $this->formValidate();
        Empleado::create($request->all());

        return response()->json([
            'status' => true, 
            'message' => 'Empleado guardado correctamente.'
        ], Response::HTTP_CREATED);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->formValidate($id);
        Empleado::where('id', $id)->update($request->all());

        return response()->json([
            'status' => true, 
            'message' => 'Empleado editado correctamente.'
        ], Response::HTTP_OK);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);

        return response()->json([
            'status' => $empleado ? true : false, 
            'Empleado' => $empleado
        ], Response::HTTP_OK);
    }    

    
    /* validación del formulario */
    private function formValidate($id=0)
    {  
        $messages = []; 

        return request()->validate([
            'nombres' => 'required|min:3|max:100',
            'apellidos' => 'required|min:3|max:120',
            'genero' => 'required|in:F,M',
            'dni' => 'required|size:10|unique:empleados,dni,'. $id,
        ], $messages);  
    }   

}
