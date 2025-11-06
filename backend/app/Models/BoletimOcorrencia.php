<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoletimOcorrencia extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada ao model.
     */
    protected $table = 'boletins_ocorrencia';

    /**
     * Os atributos que podem ser atribuídos em massa (mass assignable).
     */
    protected $fillable = [
        'comunicante_nome',
        'comunicante_data_nasc',
        'comunicante_cpf',
        'comunicante_endereco',
        'comunicante_telefone',
        'fato_data',
        'fato_hora',
        'fato_local',
        'fato_descricao',
        'houve_testemunhas',
        'testemunhas_info',
        'agressor_nome',
        'agressor_vinculo',
        'agressor_descricao',
        'medidas_protetivas',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     * 'medidas_protetivas' será automaticamente convertido de/para JSON.
     */
    protected $casts = [
        'medidas_protetivas' => 'array',
        'comunicante_data_nasc' => 'date',
        'fato_data' => 'date',
        'fato_hora' => 'datetime:H:i', // Salva apenas como H:i
    ];
}
