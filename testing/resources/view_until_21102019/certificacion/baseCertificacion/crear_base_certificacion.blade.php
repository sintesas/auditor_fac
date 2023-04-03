@extends('partials.card')

@extends('layout')

@section('title')
	Crear Base Certificación
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'baseCertificacion.store', 'data-parsley-validate' => 'parsley')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{ Breadcrumbs::render('crearbasecertificacion') }}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
					
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="Nombre" name="Nombre" required maxlength="200">
							<label for="Nombre">Nombre Norma</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="text" class="form-control" id="Referencia" name="Referencia" required maxlength="200">
							<label for="Referencia">Referencia</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<div class="input-group date" id="demo-date-format">
								<div class="input-group-content">
									<input type="text" class="form-control" id="FechaEnmienda" name="FechaEnmienda" required>
									<label for="FechaEnmienda">Fecha Enmienda</label>
								</div>
								<span class="input-group-addon"></span>
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">

							<input type="text" class="form-control" id="ClaseCertificacion" name="ClaseCertificacion" required maxlength="250">
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
							<input type="text" class="form-control" id="Autoridad" name="Autoridad" required maxlength="200">
							<label for="Autoridad">Autoridad</label>
						</div>	
					</div>
					
				</div>


				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<input type="text" class="form-control" id="Aplicacion" name="Aplicacion" required maxlength="200">
							<label for="Aplicacion">Aplicación</label>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<textarea class="form-control" id="Observaciones" name="Observaciones" rows="1" maxlength="200"></textarea>
							<label for="Observaciones">Observaciones</label>
						</div>
					</div>
				</div>

				<div class="row">
					<h4>Agrege la Estructura de Capítulos o subpartes de la Norma</h4>
					<div class="col-sm-12">
						<div class="form-group">
							{{-- <textarea class="form-control" id="capituloSubparte" name="capituloSubparte" rows="1"></textarea> --}}
							<!-- BEGIN CKEDITOR - STANDARD -->
							<div class="card">
								<div class="card-body">
									<textarea id="ckeditor" name="ckeditor" class="form-control control-12-rows" placeholder="Enter text ...">
										<ul>
											<li>SubParte1</li>
											<li>SubParte2</li>
											<li>SubParte3</li>
											<li>SubParte4</li>
											<li>SubParte5</li>
										</ul>
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
							<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
						</div>
						<div class="col-sm-6">
							<button type="button" onclick="window.location='{{ route("baseCertificacion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		<script type="text/javascript">
			$(window).bind("load", function() {
				$('#cke_10').hide();
			});
		</script>

		<script type="text/javascript">
			$('select').select2();

			// CKEDITOR.editorConfig = function( config ) {
			// 	config.toolbarGroups = [
			// 		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
			// 		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
			// 		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
			// 		{ name: 'forms', groups: [ 'forms' ] },
			// 		'/',
			// 		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			// 		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
			// 		{ name: 'links', groups: [ 'links' ] },
			// 		{ name: 'insert', groups: [ 'insert' ] },
			// 		'/',
			// 		{ name: 'styles', groups: [ 'styles' ] },
			// 		{ name: 'colors', groups: [ 'colors' ] },
			// 		{ name: 'tools', groups: [ 'tools' ] },
			// 		{ name: 'others', groups: [ 'others' ] },
			// 		{ name: 'about', groups: [ 'about' ] }
			// 	];

			// 	config.removeButtons = 'Source,Save,Templates,Cut,Undo,Find,SelectAll,Scayt,Form,Bold,CopyFormatting,Blockquote,JustifyLeft,BidiLtr,Link,Image,Styles,TextColor,Maximize,About,NewPage,Preview,Print,Copy,Paste,PasteText,PasteFromWord,Redo,Replace,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Italic,Strike,Underline,Subscript,Superscript,RemoveFormat,CreateDiv,JustifyCenter,BidiRtl,Language,JustifyRight,JustifyBlock,Unlink,Anchor,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Format,Font,FontSize,BGColor,ShowBlocks';
			// };

			$('#ckeditor').ckeditor();


		</script>
		@endsection()

	@endsection()

@endsection()