<?php

namespace App\DataTables;

use App\Models\RequisitoItem;
use Form;
use Yajra\Datatables\Services\DataTable;

class RequisitoItemDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'requisito_items.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $requisitoItems = RequisitoItem::query()->join('requisitos' , 'requisitositems.requisito_id' , '=' , 'requisitos.id')
                                                ->select('requisitos.descripcion  as req_des' ,
                                                         'requisitos.dedicacion  as req_ded' ,
                                                         'requisitositems.id','requisitositems.descripcion'
                                                         );

        return $this->applyScopes($requisitoItems);
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
          'Requisito' => ['name' => 'requisito_id', 'data' => 'req_des'],
          'Req Dedicacion' => ['name' => 'requisito_id', 'data' => 'req_ded'],
          'descripcion' => ['name' => 'descripcion', 'data' => 'descripcion']
      ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'requisitoItems';
    }
}
