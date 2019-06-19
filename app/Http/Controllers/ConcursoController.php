<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\DataTables\ConcursoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateConcursoRequest;
use App\Http\Requests\UpdateConcursoRequest;
use App\Http\Requests\SustanciarConcursoRequest;
use App\Repositories\ConcursoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Llamado;
use App\Models\LlamadoConcursos;
use App\Models\Asignatura;
use App\Models\Categoria;
use App\Models\Perfiles;
use App\Models\User;
use App\Models\Concurso;
use App\Models\ConcursoPostulante;
use Auth;
use View;
use DB;
class ConcursoController extends AppBaseController
{
    /** @var  ConcursoRepository */
    private $concursoRepository;

    public function __construct(ConcursoRepository $concursoRepo)
    {
        $this->concursoRepository = $concursoRepo;
    }

    /**
     * Display a listing of the Concurso.
     *
     * @param ConcursoDataTable $concursoDataTable
     * @return Response
     */
    public function index(ConcursoDataTable $concursoDataTable)
    {
        return $concursoDataTable->render('concursos.index');
    }

    /**
     * Show the form for creating a new Concurso.
     *
     * @return Response
     */
    public function create()
    {
        $llamados = Llamado::pluck('codigo', 'id');
        $asignaturas = Asignatura::pluck('nombre', 'id');
        $categorias = Categoria::pluck('nombre', 'id');
        $perfiles = Perfiles::pluck('nombre', 'id');
        $usuarios = User::pluck('name' , 'id');
        $estado = Collect(['Pendiente' => 'Pendiente' , 'Cerrado' => 'Cerrado' , 'Impugnado' => 'Impugnado' , 'Vacante' => 'Vacante', 'Nulo' => 'Nulo', 'DesiertoConvocatoria' => 'DesiertoConvocatoria', 'DesiertoSustanciacion' => 'DesiertoSustanciacion']);
        $dedicaciones = Collect(['Simple' => 'Simple' , 'Exclusiva' => 'Exclusiva' , 'Semiexclusiva' => 'Semiexclusiva']);
        return view('concursos.create',compact( 'llamados','asignaturas' , 'categorias' , 'perfiles' , 'usuarios' , 'estado' , 'dedicaciones'));
    }

    /**
     * Store a newly created Concurso in storage.
     *
     * @param CreateConcursoRequest $request
     *
     * @return Response
     */
    public function store(CreateConcursoRequest $request)
    {
        DB::beginTransaction();
        try{
            $input = $request->all();
            $input["estado"] = "Pendiente";
            
            if($input["fechaSustanciacion"] != null && $input["fechaSustanciacion"]!="")
            {
                $input["estado"] = "Cerrado";
                $input["usuarioCierre"]= Auth::id();
            }
            //guardo el concurso
            $concurso = $this->concursoRepository->create($input);

            //guardo relacion del llamado con el concurso
            $model = new LlamadoConcursos();
            $model->llamado_id = $input['llamado_id'];
            $model->concurso_id = $concurso['id'];

            $model->save();
            
            
            Flash::success('Concurso saved successfully.');
            DB::commit();
            
        }
        catch(\Exception $e)
        {
            Flash::error("Se produjo un error al intentar guardar la informacion. \nError: ".$e->getMessage());
            DB::rollBack();
        }

        return redirect(route('concursos.index'));
    }

    /**
     * Display the specified Concurso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $concurso = $this->concursoRepository->findWithoutFail($id);


        if (empty($concurso)) {
            Flash::error('Concurso not found');

            return redirect(route('concursos.index'));
        }

        return view('concursos.show')->with('concurso', $concurso);
    }

    /**
     * Show the form for editing the specified Concurso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $llamados = Llamado::pluck('codigo', 'id');
        $asignaturas = Asignatura::pluck('nombre', 'id');
        $categorias = Categoria::pluck('nombre', 'id');
        $perfiles = Perfiles::pluck('nombre', 'id');
        $usuarios = User::pluck('name' , 'id');
        $estado = Collect(['Pendiente' => 'Pendiente' , 'Cerrado' => 'Cerrado' , 'Impugnado' => 'Impugnado' , 'Vacante' => 'Vacante', 'Nulo' => 'Nulo', 'DesiertoConvocatoria' => 'DesiertoConvocatoria', 'DesiertoSustanciacion' => 'DesiertoSustanciacion']);
        $dedicaciones = Collect(['Simple' => 'Simple' , 'Exclusiva' => 'Exclusiva' , 'Semiexclusiva' => 'Semiexclusiva']);
        $concurso = $this->concursoRepository->findWithoutFail($id);

        if (empty($concurso)) {
            Flash::error('Concurso not found');

            return redirect(route('concursos.index'));
        }

        return view('concursos.edit' , compact( 'llamados', 'asignaturas' , 'categorias' , 'perfiles' , 'usuarios' , 'estado' , 'dedicaciones' ))->with('concurso', $concurso);
    }

    /**
     * Update the specified Concurso in storage.
     *
     * @param  int              $id
     * @param UpdateConcursoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConcursoRequest $request)
    {
        $concurso = $this->concursoRepository->findWithoutFail($id);

        if (empty($concurso)) {
            Flash::error('Concurso not found');

            return redirect(route('concursos.index'));
        }

        $input = $request->all();
        $input["estado"] = "Pendiente";

        $concurso = $this->concursoRepository->update($input, $id);

        Flash::success('Concurso updated successfully.');

        return redirect(route('concursos.index'));
    }

    /**
     * Remove the specified Concurso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            //primero elimino la relacion con el llamado
            LlamadoConcursos::where([['concurso_id','=',$id]])->delete();
            //luego elimino el concurso
            $concurso = $this->concursoRepository->findWithoutFail($id);

            if (empty($concurso)) {
                Flash::error('Concurso not found');

                return redirect(route('concursos.index'));
            }

            $this->concursoRepository->delete($id);

            Flash::success('Concurso eliminado successfully.');
            DB::commit();
            
        }
        catch(\Exception $e)
        {
            Flash::error("Se produjo un error al intentar guardar la informacion. \nError: ".$e->getMessage());
            DB::rollBack();
        }
        return redirect(route('concursos.index'));
    }

      /**
     * Muestra un formulario para cargar un dictamen.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSustanciar($id)
    {
        $concurso = $this->concursoRepository->findWithoutFail($id);
        $ordenes = ConcursoPostulante::where([['concurso_id','=',$id]])->get();
        return view('concursos.sustanciar')->with('concurso', $concurso)->with('ordenes',$ordenes);
    }
        /**
     * Muestra un formulario para cerrar un concurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCerrar($id)
    {
        $concurso = $this->concursoRepository->findWithoutFail($id);
        return view('concursos.cerrar')->with('concurso', $concurso);
    }
    /**
     * Actualiza la informacion del concurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function sustanciar($id,Request $request)
    {
        DB::beginTransaction();
        try{
            $input = $request->all();
            $filePath = $input["file"];

            Concurso::where('id', $id)->update(['usuarioSustanciacion'=>Auth::id(),'Estado' => "Sustanciado",'Dictamen' => $filePath]);
            //asocio todos los items requeridos para el puesto
            foreach ($input["ordenesMerito"] as $orden) {
                ConcursoPostulante::where([['postulante_id', '=', (int)$orden["postulanteid"]],['concurso_id', '=', $id]])->update(['ordenMerito' => ($orden["ordennumero"] == null ? null : ((int)$orden["ordennumero"])+1)]);
            }

            DB::commit();
            Flash::success('El concurso se ha sustanciado.');
            
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            Flash::error("Se produjo un error al intentar guardar la informacion. \nError: ".$e->getMessage());
        }
        return redirect(route('concursos.index'));
    }
        /**
     * Actualiza la informacion del concurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function cerrar($id,Request $request)
    {
        DB::beginTransaction();
        try{
            $input = $request->all();
            $fechaSustanciacion = $input["fechaSustanciacion"];

            Concurso::where('id', $id)->update(['usuarioCierre'=>Auth::id(),'Estado' => "Cerrado",'FechaSustanciacion' => $fechaSustanciacion]);

            DB::commit();
            Flash::success('El concurso se ha cerrado.');
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            Flash::error("Se produjo un error al intentar guardar la informacion. \nError: ".$e->getMessage());
        }
        return redirect(route('concursos.index'));
    }
/*----------------Jorge Gamez------------------*/
    //cambia de estado a un concurso

    public function pendiente($id){
	Concurso::where('id', $id)->update(['estado' => 'Pendiente']);

    	return redirect(route('concursos.index'));}

    public function Impugnado($id){
	Concurso::where('id', $id)->update(['estado' => 'Impugnado']);

	return redirect(route('concursos.index'));}

    public function vacante($id){
	Concurso::where('id', $id)->update(['estado' => 'Vacante']);

	return redirect(route('concursos.index'));}

    public function nulo($id){
        Concurso::where('id', $id)->update(['estado' => 'Nulo']);
    
        return redirect(route('concursos.index'));
    }
    public function desiertoconvocatoria($id){
        Concurso::where('id', $id)->update(['estado' => 'DesiertoConvocatoria']);
    
        return redirect(route('concursos.index'));
    }
    public function desiertosustanciacion($id){
        Concurso::where('id', $id)->update(['estado' => 'DesiertoSustanciacion']);
    
        return redirect(route('concursos.index'));}
    
/*----------------Jorge Gamez------------------*/
    //cambia de estado a un concurso
}
