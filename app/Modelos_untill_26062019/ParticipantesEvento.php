<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantesEvento extends Model
{
    protected $table = 'AU_Reg_ParticipantesEvento';

    protected $primaryKey = 'IdParticipante';

    public $timestamps = false;

    public function participantesEvento(){
    	return $this->belongsTo('App\Evento');
    }


}
