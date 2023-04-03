@extends('partials.card')

@extends('layout')

@section('title')
	Crear Base Certificación
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'cmdcontrolconfiguracion.store', 'data-parsley-validate' => 'parsley')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- {{ Breadcrumbs::render('crearbasecertificacion') }} --}}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
					
				<div class="row">
					<h4>Agrege los diferentes niveles</h4>
					<div class="col-sm-12">
						<div class="form-group">
							{{-- <textarea class="form-control" id="capituloSubparte" name="capituloSubparte" rows="1"></textarea> --}}
							<!-- BEGIN CKEDITOR - STANDARD -->
							<div class="card">
								<div class="card-body">
									<textarea id="ckeditor" name="ckeditor" class="form-control control-12-rows" placeholder="Enter text ...">
										@if( $counter > 0)
											{{old('Arbol', $cmdRequisitos->Arbol)}}
										@else
										<ul>
											<li>Nivel1</li>
											<li>Nivel2</li>
											<li>Nivel3</li>
											<li>Nivel4</li>
											<li>Nivel5</li>
										</ul>
										@endif
									</textarea>
								</div><!--end .card-body -->
							</div><!--end .card -->
							<!-- END CKEDITOR - STANDARD -->
						</div>
						<input type="hidden" id="IdSubParteMatriz" name="IdSubParteMatriz" value="{{$IdSubParteMatriz}}">
						<input type="hidden" id="IdPrograma" name="IdPrograma" value="{{$IdPrograma}}">
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
							<button type="button" onclick="window.location='{{ route("cmdcontrolconfiguracion.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
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

			$('#ckeditor').ckeditor();


		</script>
		@endsection()

	@endsection()

@endsection()