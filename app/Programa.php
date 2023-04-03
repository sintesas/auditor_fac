<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = 'AU_Reg_Programas';

	public $timestamps = false;

	protected $primaryKey = 'IdPrograma';

	protected $fillable = [

		'IdTipoPrograma',
		'IdAeronave',
		'IdUnidad',
		'IdEmpresa',
		'IdEstadoPrograma',
		'AccionSECAD',
		'Proyecto',
		'Alcance',
		'IdProductoServicio',
		'IdHorasTipoPrograma',
		'IdPersonalJefePrograma',
		'IdPersonalJefeSuplente',
		'FechaInicio',
		'FechaTermino',
		'IdRespuestoModificacion',
		'IdAReferenciaPrograma',
		'IdBaseCertificacion',
		'Finalizado',
		'FechaFin',
		'Active',
	];


	public function especialidades(){
		return $this->hasMany('App\ProgramaEspecialidad', 'IdPrograma', 'IdPrograma');
	}

	public function ensayos(){
		return $this->hasMany('App\ProgramaEnsayo', 'IdPrograma', 'IdPrograma');
	}

	public function bancos(){
		return $this->hasMany('App\ProgramaBanco', 'IdPrograma', 'IdPrograma');
	}

	public static function getProgramasTipo(){
		return Programa::orderBy('Consecutivo')
						->join('dbo.AU_Mst_TiposPrograma', 'dbo.AU_Mst_TiposPrograma.IdTipoPrograma', '=', 'dbo.AU_Reg_Programas.IdTipoPrograma')
						->select('dbo.AU_Reg_Programas.IdPrograma', 
								 'dbo.AU_Reg_Programas.Consecutivo',
								 'dbo.AU_Reg_Programas.Proyecto',
								 'dbo.AU_Mst_TiposPrograma.Tipo')
						->get();
	}

	public static function getByUser($IdPersonal){
		return Programa::where('IdPersonalJefePrograma ', '=', $IdPersonal)
						->get();
	}

	public static function getByJefeAndSuplente($IdPersonal){
		return Programa::where('IdPersonalJefePrograma ', '=', $IdPersonal)
						->orWhere('IdPersonalJefeSuplente', $IdPersonal)
						->orderby('Consecutivo', 'DESC')	
						->get();
	}

	public static function getProgramasTipoByEmpresa($idEmpresa){
		return Programa::orderBy('Consecutivo')
						->join('dbo.AU_Mst_TiposPrograma', 'dbo.AU_Mst_TiposPrograma.IdTipoPrograma', '=', 'dbo.AU_Reg_Programas.IdTipoPrograma')
						->select('dbo.AU_Reg_Programas.IdPrograma', 
								 'dbo.AU_Reg_Programas.Consecutivo',
								 'dbo.AU_Reg_Programas.Proyecto',
								 'dbo.AU_Mst_TiposPrograma.Tipo')
						->where('IdEmpresa','=', $idEmpresa)
						->get();
	}

	public static function infoPersona($idPersona)
	{
		$persona = Personal::where('IdPersonal',$idPersona)->first();
		if($persona->Categoria == "Militar"){
			$grado = Grado::where('IdGrado',$persona->IdGrado)->first();
			$EAC = EspecialidadCertificacion::where('IdEspecialidadCertificacion',$persona->IdEspecialidadCertificacion)->first();
		}else{
			$grado = "N/A";
			$EAC = "N/A";
		}
		$NivelCompetencia = NivelCompetencias::where('IdNivelCompetencia',$persona->IdNivelCompetencia)->first();
		array_add($persona,'grado',$grado);
		array_add($persona,'EAC',$EAC);
		array_add($persona,'NivelCompetencia',$NivelCompetencia);

		return $persona;
	}

	public function programas()
	{
		return $this->belongsToMany(BaseCertificacion::class,'dbo.AU_Reg_BasesCertificacionPrograma','IdPrograma','IdBaseCertificacion');
	}
}
