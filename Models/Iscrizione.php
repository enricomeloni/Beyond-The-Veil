<?php


namespace Models;


use Illuminate\Database\Eloquent\Model;

class Iscrizione extends Model
{
    protected $table = "iscrizione";
    protected $primaryKey = "personaggio_id";
    public $timestamps = false;

}