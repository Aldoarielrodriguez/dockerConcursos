<?php

namespace App\Repositories;

use App\Models\MesaEntrada;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MesaEntradaRepository
 * @package App\Repositories
 * @version May 31, 2018, 12:28 am UTC
 *
 * @method MesaEntrada findWithoutFail($id, $columns = ['*'])
 * @method MesaEntrada find($id, $columns = ['*'])
 * @method MesaEntrada first($columns = ['*'])
*/
class MesaEntradaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombres',
        'apellidos',
        'documento',
        'telefono',
        'celular',
        'email',
        'direccion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MesaEntrada::class;
    }
}
