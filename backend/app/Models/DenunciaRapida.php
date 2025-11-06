<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DenunciaRapida extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada ao model.
     * O Laravel tentaria 'denuncia_rapidas' (plural), mas 'denuncias_rapidas' é melhor.
     */
    protected $table = 'denuncias_rapidas';

    /**
     * Os atributos que podem ser atribuídos em massa (mass assignable).
     * Isso é uma camada de segurança.
     */
    protected $fillable = [
        'data_hora',
        'tipo_violencia',
        'e_a_vitima',
        'agressor_armado',
        'localizacao',
        'vinculo_agressor',
        'genero_agressor',
        'descricao_agressor',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     * Isso faz o Laravel tratar o campo 'data_hora' como um objeto de data (Carbon).
     */
    protected $casts = [
        'data_hora' => 'datetime',
    ];
}
