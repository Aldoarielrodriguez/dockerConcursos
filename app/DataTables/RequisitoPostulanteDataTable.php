<?php

namespace App\DataTables;

use App\Models\RequisitoPostulante;
use Form;
use Yajra\Datatables\Services\DataTable;

class RequisitoPostulanteDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'requisito_postulantes.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $requisitoPostulantes = RequisitoPostulante::query()
                                        ->JOIN('personas','requisitospostulantes.postulante_id','=','personas.id')
                                        ->JOIN('concursos','requisitospostulantes.concurso_id','=','concursos.id')
                                        ->JOIN('requisitositems','requisitospostulantes.requisitoitem_id','=','requisitositems.id')
                                        ->SELECT( 'personas.nombres as per_nom',
                                                  'personas.apellidos as per_ape',
                                                  'concursos.referenciaGeneral as con_ref' ,
                                                  'requisitositems.descripcion as req_des',
                                                  'requisitospostulantes.id','requisitospostulantes.entregoRequisito as entregoRequisito' ,
                                                  'requisitospostulantes.id','requisitospostulantes.cumpleRequisito as cumpleRequisito')
                                        ->WHERE('tipo', 'Postulante');




        return $this->applyScopes($requisitoPostulantes);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => true,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             //'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'Apellido' => ['name' => 'postulante_id', 'data' => 'per_ape'],
            'Nombre' => ['name' => 'postulante_id', 'data' => 'per_nom'],
            'Concurso' => ['name' => 'concurso_id', 'data' => 'con_ref'],
            'Requisito' => ['name' => 'requisito_id', 'data' => 'req_des'],
            'Entregó Requisito' => ['name' => 'entregoRequisito', 'data' => 'entregoRequisito'],
            'Cumple Requisito' => ['name' => 'cumpleRequisito', 'data' => 'cumpleRequisito']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'requisitoPostulantes';
    }
}
