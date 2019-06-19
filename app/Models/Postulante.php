<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postulante extends Model {

    use SoftDeletes;

    public $table = 'personas';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];
    public $fillable = [
        'nombres',
        'apellidos',
        'documento',
        'telefono',
        'celular',
        'email',
        'direccion',
        'tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombres' => 'string',
        'apellidos' => 'string',
        'documento' => 'string',
        'telefono' => 'string',
        'celular' => 'string',
        'email' => 'string',
        'direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombres' => 'required|max:60|alpha',
        'apellidos' => 'required|max:60|alpha',
        'documento' => 'required|max:99999999|numeric',
        'email' => 'required|max:60',
        'telefono' => 'max:13|numeric',
        'celular' => 'max:13|numeric',
        'direccion' => 'alpha_dash|max:70',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * */
    public function concursos() {
        return $this->belongsToMany(\App\Models\Concurso::class, 'concursospostulantes');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * */
    public function requisitositems() {
        return $this->belongsToMany(\App\Models\Requisitositem::class, 'requisitospostulantes');
    }

}
