<?php

namespace App\Http\Controllers;

use DB;
use App\DataTables\MesaEntradaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMesaEntradaRequest;
use App\Http\Requests\UpdateMesaEntradaRequest;
use App\Repositories\MesaEntradaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Concurso;
use App\Models\ConcursoPostulante;
use App\Models\RequisitoPostulante;
use App\Models\Postulante;
use App\Models\Requisito;
use App\Models\RequisitoItem;
use Response;

class MesaEntradaController extends AppBaseController
{
    /** @var  MesaEntradaRepository */
    private $mesaEntradasRepository;

    public function __construct(MesaEntradaRepository $mesaEntradasRepo)
    {
        $this->mesaEntradasRepository = $mesaEntradasRepo;
    }

    /**
     * Display a listing of the Postulante.
     *
     * @param mesaentradaDataTable $mesaentradaDataTable
     * @return Response
     */
    public function index(MesaEntradaDataTable $mesaentradaDataTable)
    {
        return $mesaentradaDataTable->render('mesaentradas.index');
    }

    /**
     * Show the form for creating a new Postulante.
     *
     * @return Response
     */
    public function create()
    {
        $concursos = Concurso::all();
        $concurso = $concursos->first();

        $concursos = $concursos->pluck('referenciaGeneral' , 'id');

        $requisitos = Requisito::where('categoria_id',"=",$concurso->categoria_id)
        ->where('perfil_id',"=",$concurso->perfil_id)
        ->where('dedicacion',"=",$concurso->dedicacion);

        $requisitositems = RequisitoItem::where('requisito_id',"=",$requisitos->first()->id)->pluck('descripcion' , 'id');

        $requisitos = $requisitos->pluck('descripcion' , 'id');
        
        return view('mesaentradas.create' , compact('concursos', 'requisitos', 'requisitositems'))->with('isEdit', false);
    }

    /**
     * Store a newly created Postulante in storage.
     *
     * @param CreatePostulanteRequest $request
     *
     * @return Response
     */
    public function store(CreateMesaEntradaRequest $request)
    {
        DB::beginTransaction();
        try{
            //capturo el request
            $input = $request->all();
            $input['tipo'] = '1';

            //convierto request en objeto modelo y lo guardo
            $postulante = new Postulante();
            $postulante->fill($input);
            $postulante->save();

            //asocio las entidades relacionadas postulante/concursos, postulante/requisitos
            $concursopostulante = new ConcursoPostulante();
            $concursopostulante->postulante_id = $postulante->id;
            $concursopostulante->concurso_id = $input['concurso_id'];
            $concursopostulante->fechaPresentacion = date('Y-m-d H:i:s');
            $concursopostulante->tipo = 1;//tipo postulante
            $concursopostulante->save();

            $requisitositems = RequisitoItem::where('requisito_id','=',$input['requisito_id'])->pluck('descripcion' , 'id');
            //asocio todos los items requeridos para el puesto
            foreach ($requisitositems as $requisitoitemid => $requisitoitem) {
                $requisitopostulante = new RequisitoPostulante();
                $requisitopostulante->requisitoitem_id= $requisitoitemid;
                $requisitopostulante->concurso_id= $input['concurso_id'];
                $requisitopostulante->postulante_id = $postulante->id;
                //verifico si el usuario cargo el requisito como entregado o no.
                $itemSelected = in_array((string)$requisitoitemid,$input['requisitositems']);
                $requisitopostulante->entregoRequisito = ($itemSelected ?'Si':'No');
                $requisitopostulante->cumpleRequisito = 'Sin validar';
                $requisitopostulante->save();
            }

            DB::commit();
            Flash::success('Postulante creado.');
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            Flash::error("Se produjo un error al intentar guardar la información del postulante. \nError: ".$e->getMessage());
        }
        return redirect(route('mesaEntradas.index'));
    }

    /**
     * Display the specified Postulante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mesaentrada = $this->mesaEntradasRepository->findWithoutFail($id);

        if (empty($mesaentrada)) {
            Flash::error('Postulante not found');

            return redirect(route('mesaEntradas.index'));
        }

        return view('mesaentradas.show')->with('mesaentrada', $mesaentrada);
    }

    /**
     * Show the form for editing the specified Postulante.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mesaentrada = $this->mesaEntradasRepository->findWithoutFail($id);

        $concursos = Concurso::all();
        $concurso = $concursos->first();
        $concursos = $concursos->pluck('referenciaGeneral' , 'id');
        $requisitos = Requisito::where('categoria_id',"=",$concurso->categoria_id)
        ->where('perfil_id',"=",$concurso->perfil_id)
        ->where('dedicacion',"=",$concurso->dedicacion);

        $requisitositems = RequisitoItem::where('requisito_id',"=",$requisitos->first()->id)
        ->pluck('descripcion' , 'id');

        $requisitos = $requisitos->pluck('descripcion' , 'id');
        if (empty($mesaentrada)) {
            Flash::error('Postulante not found');

            return redirect(route('mesaEntradas.index'));
        }

        return view('mesaentradas.edit', compact('concursos', 'requisitos', 'requisitositems'))->with('mesaentrada', $mesaentrada)->with('isEdit', true);
    }

    /**
     * Update the specified Postulante in storage.
     *
     * @param  int              $id
     * @param UpdatePostulanteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMesaEntradaRequest $request)
    {
        $mesaentrada = $this->mesaEntradasRepository->findWithoutFail($id);

        if (empty($mesaentrada)) {
            Flash::error('Postulante not found');

            return redirect(route('mesaEntradas.index'));
        }

        $mesaentrada = $this->mesaEntradasRepository->update($request->all(), $id);

        Flash::success('Postulante updated successfully.');

        return redirect(route('mesaEntradas.index'));
    }

    /**
     * Remove the specified Postulante from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mesaentrada = $this->mesaEntradasRepository->findWithoutFail($id);

        if (empty($mesaentrada)) {
            Flash::error('Postulante not found');

            return redirect(route('mesaEntradas.index'));
        }

        $this->mesaEntradasRepository->delete($id);

        Flash::success('Postulante deleted successfully.');

        return redirect(route('mesaEntradas.index'));
    }
}
