@extends('partials.card')

@extends('layout')

@section('title')
	Editar Proceso
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($procesos, ['route' => ['procesosAuditoria.update', $procesos->IdProceso], 'method' => 'PUT' ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
		{{Breadcrumbs::render('edit_proceso')}}
		@endsection()

		@section('card-content')

		<div class="card-body floating-label">
			
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control" id="Proceso" name="Proceso" rows="4" >{{old('Proceso', $procesos->Proceso)}}</textarea>
                        <label for="Proceso">Proceso</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea class="form-control" id="SubProceso" name="SubProceso" rows="4" >{{old('SubProceso', $procesos->SubProceso)}}</textarea>
                        <label for="SubProceso">SubProceso</label>
                    </div>
                </div>
            </div>

		</div>
	
		{{-- submit button --}}
			
		<div class="form-group">
			<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Actualizar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ route("procesosAuditoria.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
		</div>

		{!! Form::close() !!}
		
		@endsection()


	@endsection()


@endsection()