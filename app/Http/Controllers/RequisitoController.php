<?php

namespace App\Http\Controllers;

use App\DataTables\RequisitoDataTable;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateRequisitoRequest;
use App\Http\Requests\UpdateRequisitoRequest;
use App\Repositories\RequisitoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Categoria;
use App\Models\Requisito;
use App\Models\RequisitoItem;
use App\Models\Perfiles;
use Auth;
use View;
use DB;

class RequisitoController extends AppBaseController
{
    /** @var  RequisitoRepository */
    private $requisitoRepository;

    public function __construct(RequisitoRepository $requisitoRepo)
    {
        $this->requisitoRepository = $requisitoRepo;
    }

    /**
     * Display a listing of the Requisito.
     *
     * @param RequisitoDataTable $requisitoDataTable
     * @return Response
     */
    public function index(RequisitoDataTable $requisitoDataTable)
    {
        return $requisitoDataTable->render('requisitos.index');
    }

    /**
     * Show the form for creating a new Requisito.
     *
     * @return Response
     */
    public function create()
    {
        $categorias = Categoria::pluck('nombre' , 'id');
        $perfiles = Perfiles::pluck('nombre' , 'id');
        $dedicaciones = Collect(['Simple' => 'Simple' , 'Exclusiva' => 'Exclusiva' , 'Semiexclusiva' => 'Semiexclusiva']);
        return view('requisitos.create' , compact('categorias', 'perfiles', 'dedicaciones'));
    }

    /**
     * Store a newly created Requisito in storage.
     *
     * @param CreateRequisitoRequest $request
     *
     * @return Response
     */
    public function store(CreateRequisitoRequest $request)
    {
        $input = $request->all();

        $requisito = $this->requisitoRepository->create($input);

        Flash::success('Requisito saved successfully.');

        return redirect(route('requisitos.index'));
    }

    /**
     * Display the specified Requisito.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requisito = $this->requisitoRepository->findWithoutFail($id);

        if (empty($requisito)) {
            Flash::error('Requisito not found');

            return redirect(route('requisitos.index'));
        }
        return view('requisitos.show')->with('requisito', $requisito);
    }

    public function showItems($id)
    {
        $requisito = $this->requisitoRepository->findWithoutFail($id);
        $items = RequisitoItem::where([['requisito_id','=',$id]])->get();
        return view('requisitos.items')->with('requisito', $requisito)->with('items',$items);
    }

    /**
     * Show the form for editing the specified Requisito.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $requisito = $this->requisitoRepository->findWithoutFail($id);
        $categorias = Categoria::pluck('nombre' , 'id');
        $perfiles = Perfiles::pluck('nombre' , 'id');
        $dedicaciones = Collect(['Simple' => 'Simple' , 'Exclusiva' => 'Exclusiva' , 'Semiexclusiva' => 'Semiexclusiva']);

        if (empty($requisito)) {
            Flash::error('Requisito not found');

            return redirect(route('requisitos.index'));
        }

        return view('requisitos.edit', compact('categorias', 'perfiles' , 'dedicaciones'))->with('requisito', $requisito);
    }

    /**
     * Update the specified Requisito in storage.
     *
     * @param  int              $id
     * @param UpdateRequisitoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequisitoRequest $request)
    {
        $requisito = $this->requisitoRepository->findWithoutFail($id);

        if (empty($requisito)) {
            Flash::error('Requisito not found');

            return redirect(route('requisitos.index'));
        }

        $requisito = $this->requisitoRepository->update($request->all(), $id);

        Flash::success('Requisito updated successfully.');

        return redirect(route('requisitos.index'));
    }

    /**
     * Remove the specified Requisito from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            RequisitoItem::where([['requisito_id','=',$id]])->delete();
            $requisito = $this->requisitoRepository->findWithoutFail($id);

            if (empty($requisito)) {
                Flash::error('Requisito not found');
    
                return redirect(route('requisitos.index'));
            }
    
            $this->requisitoRepository->delete($id);
            DB::commit();
            Flash::success('Requisitos eliminados.');
            
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            Flash::error("Se produjo un error al intentar eliminar la informacion. \nError: ".$e->getMessage());
        }

        return redirect(route('requisitos.index'));
    }
    public function cargaritems($id,Request $request)
    {
        DB::beginTransaction();
        try{
            $input = $request->all();
            $itemsNew = $input["RequisitosItems"];
            $itemsOld = RequisitoItem::where([['requisito_id','=',$id]])->get();

            //recorro los items del requisito actual
            foreach ($itemsOld as $itemOld) {
                $existsValue = false;
                foreach ($itemsNew as $i) {
                    if($i['id'] == $itemOld->id)
                    {
                        $existsValue = true;
                        break;
                    }
                }
                if (!$existsValue)
                {
                    $model = RequisitoItem::find($itemOld->id);
                    $model->delete();
                }
            }

            foreach ($itemsNew as $itemNew) {
                if ($itemNew['id']=="")
                {
                    $model = new RequisitoItem();
                    $model->descripcion = $itemNew['descripcion'];
                    $model->requisito_id = $id;

                    $model->save();
                }
            }

            DB::commit();
            Flash::success('Requisitos guardados.');
            
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            Flash::error("Se produjo un error al intentar guardar la informacion. \nError: ".$e->getMessage());
        }
        return redirect(route('requisitos.index'));
    }
}
