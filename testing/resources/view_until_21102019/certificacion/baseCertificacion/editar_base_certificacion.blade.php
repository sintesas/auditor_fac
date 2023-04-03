@extends('partials.card')

@extends('layout')

@section('title')
	Editar Base Certificación
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($baseCertificacion, ['route' => ['baseCertificacion.update', $baseCertificacion->IdBaseCertificacion], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{ Breadcrumbs::render('editarbasecertificacion') }}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
					
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="Nombre" name="Nombre" required value="{{old('Nombre', $baseCertificacion->Nombre)}}">
							<label for="Nombre">Nombre Norma</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="Referencia" name="Referencia" required value="{{old('Referencia', $baseCertificacion->Referencia)}}">
							<label for="Referencia">Referencia</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<div class="input-group date" id="demo-date-format">
								<div class="input-group-content">
									<input type="text" class="form-control" id="FechaEnmienda" name="FechaEnmienda" required value="{{old('FechaEnmienda', $baseCertificacion->FechaEnmienda)}}">
									<label for="Fecha">Fecha Enmienda</label>
								</div>
								<span class="input-group-addon"></span>
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">

							<input type="text" class="form-control" id="ClaseCertificacion" name="ClaseCertificacion" required value="{{old('ClaseCertificacion', $baseCertificacion->ClaseCertificacion)}}">
							<label for="Referencia">Clase</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							{{ Form::select('IdOrigen', $origen->pluck('Descripcion', 'IdOrigen'), null, ['class' => 'form-control', 'id' => 'IdOrigen']) }}
							<label for="IdOrigen">Origen</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="Autoridad" name="Autoridad" required value="{{old('Autoridad', $baseCertificacion->Autoridad)}}">
							<label for="Autoridad">Autoridad</label>
						</div>	
					</div>
					
				</div>


				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="Aplicacion" name="Aplicacion" required value="{{old('Aplicacion', $baseCertificacion->Aplicacion)}}">
							<label for="Aplicacion">Aplicación</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<textarea class="form-control" id="Observaciones" name="Observaciones" rows="1">{{old('Observaciones', $baseCertificacion->Observaciones)}}</textarea>
							<label for="Observaciones">Observaciones</label>
						</div>
					</div>
				</div>

				<div class="row">
					<h4>Opción para agregar la Estructura de Capítulos o subpartes de la Norma</h4>
					<div class="col-sm-12">
						<div class="form-group">
							{{-- <textarea class="form-control" id="capituloSubparte" name="capituloSubparte" rows="1"></textarea> --}}
							<!-- BEGIN CKEDITOR - STANDARD -->
							<div class="card">
								<div class="card-body">
									<textarea id="ckeditor" name="ckeditor" class="form-control control-12-rows" placeholder="Enter text ...">
										{{old('EstructuraCapitulosSubPartes', $baseCertificacion->EstructuraCapitulosSubPartes)}}
									</textarea>
								</div><!--end .card-body -->
							</div><!--end .card -->
							<!-- END CKEDITOR - STANDARD -->
						</div>
					</div>
				</div>
			</div>

			{{-- submit button --}}
			
			<div class="form-group">
				<div class="row">
						<div class="col-sm-6">
							<button type="submit" style="" class="btn btn-info btn-block">Editar</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("baseCertificacion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		<script type="text/javascript">
			$('select').select2();
			$('#ckeditor').ckeditor();

			// By default, CKEditor add a WYSIWEG editor to all content with the contenteditable set to true
			// To be able to demo Summernote on this page, this function is disabled.
			CKEDITOR.disableAutoInline = true;
			if ($('#inlineContent1').length > 0)
				CKEDITOR.inline('inlineContent1');
			if ($('#inlineContent2').length > 0)
				CKEDITOR.inline('inlineContent2');
		</script>
		@endsection()

	@endsection()

@endsection()