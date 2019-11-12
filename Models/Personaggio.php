<?php


namespace Models;


use Illuminate\Database\Eloquent\Model;

class Personaggio extends Model
{
    protected $table = 'personaggio';

    static function countOnline() {
        return Personaggio::query()->whereRaw("ora_entrata > ora_uscita AND DATE_ADD(ultimo_refresh, INTERVAL 4 MINUTE) > NOW()")->count("nome");
    }

    public function iscrizione()
    {
        return $this->hasOne('Models\Iscrizione' );
    }
}