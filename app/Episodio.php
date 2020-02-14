<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido',"serie_id"];
    protected $appends = ['links'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
    // Acessors para mudar no Get
    public function getAssistidoAttribute($assistido):bool
    {
        return $assistido;
    }
    //muttators para mudar no Set


    public function getLinksAttribute():array
    {
        return [
            'self'=>'/api/episodios/'.$this->id,
            'serie' => '/api/series/'.$this->serie_id
        ];
    }
}
