@extends('partials.card')

@extends('layout')

@section('title')
Crear Empresa
@endsection()

@section('content')

	@section('card-title')

	{{ Breadcrumbs::render('crear_empresa') }}

	@endsection()

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'empresa.store')) !!}

			{{ csrf_field()}}

		@endsection
		
		@section('card-content')
			

			<div class="card-body floating-label">
				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<input type="text" class="form-control" id="nombre" name="NombreEmpresa" required>
							<label for="nombre">Nombre de la Organización (Razón Social)</label>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="SiglasNombreClave" name="SiglasNombreClave" required>
							<label for="SiglasNombreClave">Siglas Organización</label>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<input type="text" onKeyPress="return soloNumeros(event)" class="form-control" id="nit" name="Nit" required>
							<label for="nit">NIT</label>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="email" name="Email" required>
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
							<input type="text" onKeyPress="return soloNumeros(event)" class="form-control" id="telefax" name="Telefono" required>
							<label for="telefax">Telefono</label>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="Pagina_web" name="PaginaWeb" required>
							<label for="Pagina_web">Pagina Web</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							{{-- {!! Form::select('IdFuncionarioEmpresa',[''=>''],null,['class'=>'form-control']) !!} --}}
							<select id="TipoOrganizacion" name="TipoOrganizacion" class="form-control" required="" aria-required="true">
								<option value="">&nbsp;</option>
								<option value="Estado">Estado</option>
								<option value="Academia">Academia</option>
								<option value="Industria">Industria</option>
							</select>
							<label for="TipoOrganizacion">Tipo de organización</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="text" class="form-control" id="direccion" name="Direccion" required>
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
							<input type="text" class="form-control" id="Pagina_web" name="NombreCertificaInfo">
							<label for="Pagina_web">Representante Legal</label>
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
							<textarea class="form-control" id="Alcance" name="Alcance" rows="3"> </textarea>
							<label for="Alcance">Alcance</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<textarea class="form-control" id="Observaciones" name="Observaciones" rows="3"> </textarea>
							<label for="Observaciones">Observaciones</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-2 control-label">Actividades de la empresa</label>
							<div class="col-sm-10">
								<label class="checkbox-inline checkbox-styled">
									{!! Form::checkbox('DisenoDesarrollo', '1') !!}<span>Diseño</span>
								</label>
								<label class="checkbox-inline checkbox-styled">
									{!! Form::checkbox('Fabricante', '1') !!}<span>Producción</span>
								</label>
								<label class="checkbox-inline checkbox-styled">
									{!! Form::checkbox('PrestacionServicios', '1') !!}<span>Servicios</span>
								</label>

								<label class="checkbox-inline checkbox-styled">
									{!! Form::checkbox('MantenimientoAeronaves', '1') !!}<span>Mantenimiento de Aeronaves</span>
								</label>

							</div><!--end .col -->
						</div><!--end .form-group -->
					</div>
				</div>

				<div class="row">
					<div class="form-group">
						<div class="col-sm-12">
							<label class="checkbox-inline checkbox-styled">
								{!! Form::checkbox('autorizacion', '1'); !!}
								<span><b>Autorización:</b> La empresa autoriza a la seccion de certificacion Aeronautica de la defensa SECAD de la fuerza aerea Colombiana para transmitir la informacion contenida en este formulario FRE a travez del catalogo de industria y Aeroespacial Colombiano (CIACEC)</span>
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

							
		@endsection

		<script src="{{asset('js/soloNumeros.js')}}"></script>

@endsection()

@endsection()

