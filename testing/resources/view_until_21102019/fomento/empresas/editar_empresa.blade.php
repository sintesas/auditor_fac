@extends('partials.card')

@extends('layout')

@section('title')
	Editar Empresa
@endsection()

@section('content')

	@section('card-content')
		
		@section('card-title')
			{{ Breadcrumbs::render('editar_empresa') }}
		@endsection()

		@section('form-tag')

			
		{!! Form::model($empresa, ['route' => ['empresa.update', $empresa->IdEmpresa], 'method' => 'PUT' ]) !!}

		{{ csrf_field()}}

		@endsection

		
		@section('card-content')
			
			<div class="card-body floating-label">
				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<input type="text" class="form-control" id="nombre" name="NombreEmpresa" value="{{old('nombre', $empresa->NombreEmpresa)}}" required>
							<label for="nombre">Nombre de la Organizacion (Razón Social)</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="SiglasNombreClave" name="Nit" value="{{old('SiglasNombreClave',$empresa->SiglasNombreClave)}}"  required>
							<label for="SiglasNombreClave">Siglas</label>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<input type="text" class="form-control" id="nit" name="Nit" value="{{old('nit',$empresa->Nit)}}"  required>
							<label for="nit">NIT</label>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="email" name="Email" value="{{old('email', $empresa->Email)}}" required>
							<label for="email">Email</label>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							{{ Form::select('Id_Municipio', $municipio->pluck('NombreMunicipio' , 'Id_Municipio'), null, ['class' => 'form-control', 'id' => 'Id_Municipio']) }}
							<label for="ciudad">Ciudad</label>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="telefax" name="Telefono" value="{{old('telefax', $empresa->Telefono)}}" required>
							<label for="telefax">Telefono</label>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="Pagina_web" name="PaginaWeb" value="{{old('pagina_web', $empresa->PaginaWeb)}}" required>
							<label for="Pagina_web">Pagina Web</label>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							{{ Form::select('TipoOrganizacion', [
								'Estado' => 'Estado',
								'Academia' => 'Academia',
								'Industrias' => 'Industrias',
								], old('value'), [ 'class' =>  'form-control']) }}
							<label for="TipoOrganizacion">Tipo de organización</label>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" id="direccion" name="Direccion" value="{{old('direccion', $empresa->Direccion)}}" required>
							<label for="direccion">Dirección</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							{{ Form::select('IdEstadoEmpresa', $estadoEmpresa->pluck('Descripcion' , 'IdEstadoEmpresa'), null, ['class' => 'form-control', 'id' => 'IdEstadoEmpresa']) }}
							<label for="IdEstadoEmpresa">Estado</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							{{ Form::select('IdDominioIndustrial', $dominioIndustrial->pluck('Descripcion' , 'IdDominioIndustrial'), null, ['class' => 'form-control', 'id' => 'IdDominioIndustrial']) }}
							<label for="IdDominioIndustrial">Dominio Industrial</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<input type="text" class="form-control" id="nombreCertificaInfo" name="NombreCertificaInfo" value="{{old('nombreCertificaInfo', $empresa->NombreCertificaInfo)}}" required>
							<label for="Pagina_web">Nombre del funcionario que certifica la veracidad de la información</label>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="FechaActualizacion" name="FechaActualizacion" value="{{$ldate}}" readonly>
							<label for="FechaActualizacion">Fecha Actualización</label>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<textarea class="form-control" id="Alcance" name="Alcance" rows="3">{{old('Alcance', $empresa->Alcance)}}</textarea>
							<label for="Alcance">Alcance</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<textarea class="form-control" id="Observaciones" name="Observaciones" rows="3">{{old('Observaciones', $empresa->Observaciones)}}</textarea>
							<label for="Observaciones">Observaciones</label>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-3 control-label">Actividades de la empresa</label>
							<div class="col-sm-9">
								
								<label class="checkbox-inline checkbox-styled">
									{{ Form::checkbox('option1', '1', old('option1', $empresa->DisenoDesarrollo)) }}<span>Diseño y desarrollo</span>
								</label>
								

								<label class="checkbox-inline checkbox-styled">
									{{ Form::checkbox('option2', '1', old('option2', $empresa->Fabricante)) }} <span>Fabricante</span>
								</label>
								<label class="checkbox-inline checkbox-styled">
									{{ Form::checkbox('option3', '1', old('option3', $empresa->PrestacionServicios)) }} <span>Prestación de servicios</span>
								</label>

								<label class="checkbox-inline checkbox-styled">
									{{ Form::checkbox('option4', '1', old('option4', $empresa->MantenimientoAeronaves)) }} <span>Mantenimiento de aeronaves</span>
								</label>
							</div><!--end .col -->
						</div><!--end .form-group -->
					</div>
				</div>
						

				<div class="row">
					<div class="form-group">
						<div class="col-sm-12">
							<label class="checkbox-inline checkbox-styled">
								{{ Form::checkbox('autorizacion', '1', old('autorizacion', $empresa->AutorizacionCT)) }}  <span><b>Autorización:</b> La empresa autoriza a la seccion de certificacion Aeronautica de la defensa SECAD de la fuerza aerea Colombiana para transmitir la informacion contenida en este formulario FRE a travez del catalogo de industria y Aeroespacial Colombiano (CIACEC)</span>
							</label>
						</div>
					</div>
				</div>

				<br>
				<div class="row">
					<div class="col-sm-6">	
						{{Form::submit('Guardar', ['class' => 'btn btn-info btn-block'])}}	
					</div>	
					<div class="col-sm-6">	
						{{Form::button('Cancelar', ['class' => 'btn btn-danger btn-block'])}}	
					</div>										
				</div>
			</div>	

			


		{!! Form::close() !!}

		@endsection()




	@endsection()

@endsection()