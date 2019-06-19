<?php

namespace App\DataTables;

use App\Models\Requisito;
use Form;
use Yajra\Datatables\Services\DataTable;

class RequisitoDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'requisitos.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $requisitos = Requisito::query()->JOIN('categorias','requisitos.categoria_id','=','categorias.id')
                                        ->JOIN('perfiles','requisitos.perfil_id','=','perfiles.id')
                                        ->SELECT( 'categorias.nombre as cat_nom',
                                                  'perfiles.nombre as per_nom' ,
                                                  'requisitos.id','requisitos.dedicacion as dedicacion' ,
                                                  'requisitos.id','requisitos.descripcion as descripcion');

        return $this->applyScopes($requisitos);
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
            'Categoria' => ['name' => 'categoria_id', 'data' => 'cat_nom'],
            'Perfil' => ['name' => 'perfil_id', 'data' => 'per_nom'],
            'Dedicacion' => ['name' => 'dedicacion', 'data' => 'dedicacion'],
            'Descripcion' => ['name' => 'descripcion', 'data' => 'descripcion']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'requisitos';
    }
}
