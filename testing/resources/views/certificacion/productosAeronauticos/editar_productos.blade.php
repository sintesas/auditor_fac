@extends('partials.card')

@extends('layout')

@section('title')
	Editar Producto
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

			{!! Form::model($producto, ['route' => ['productos.update', $producto->IdDemandaPotencial], 'method' => 'PUT', 'files' => true ]) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{Breadcrumbs::render('editar_productos')}}
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
					
				<div class="card">
                    <div class="card-head card-head-sm style-primary">
                        <header>
                            Información Producto Aeronautico
                        </header>
                    </div><!--end .card-head -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Nombre" name="Nombre" required value="{{old('Nombre', $producto->Nombre)}}">
                                            <label for="Nombre">Nombre Producto</label>
                                        </div>
                                    </div> 
                                </div> 
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="ParteNumero" name="ParteNumero" required value="{{old('ParteNumero', $producto->ParteNumero)}}">
                                            <label for="ParteNumero">P/N</label>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            {{ Form::select('IdAeronave', $aeronaves->pluck('Equipo', 'IdAeronave'), null, ['class' => 'form-control', 'id' => 'IdAeronave']) }}
                                            <label for="IdAeronave">Equipo </label>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            {{ Form::select('IdUnidad', $unidades->pluck('NombreUnidad', 'IdUnidad'), null, ['class' => 'form-control', 'id' => 'IdUnidad']) }}
                                            <label for="IdUnidad">Unidad</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="PublicacionTecnica" name="PublicacionTecnica" required value="{{old('PublicacionTecnica', $producto->PublicacionTecnica)}}">
                                            <label for="PublicacionTecnica"> Publicación Técnica</label>
                                        </div>
                                    </div> 
                                </div> 
                                <div class="row">
                                    <div class="col-sm-12">
                                         <div class="form-group">
                                        {{ Form::select('IdATA', $atas->pluck('ATA', 'IdATA'), null, ['class' => 'form-control', 'id' => 'IdATA']) }}
                                        <label for="IdATA"> ATA </label>
                                    </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="foto-producto">
                                            {{-- <img id="image_upload_preview" src="" style=""> --}}
                                           {{--  <img id="image_upload_preview" src="{{URL::asset('/img/engranaje.png')}}" alt="profile Pic"> --}}
                                           <img id="image_upload_preview" src="{{URL::asset('secad/Productos/' . $producto->Nombre.'-'.$producto->ParteNumero.'/'.$producto->Imgen)}}" alt="profile Pic">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                            <label for="foto">Imagen</label>
                                           {!! Form::file('foto', array('class' => 'form-control', 'id' => 'inputFile', '')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="NSN" name="NSN" required value="{{old('NSN', $producto->NSN)}}">
                                            <label for="NSN">NSN </label>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                     <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="CodigoSAP" name="CodigoSAP" required value="{{old('CodigoSAP', $producto->CodigoSAP)}}">
                                            <label for="CodigoSAP">SAP</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-7">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                             {{ Form::select('Identificacion', [
                                                '' => '',
                                                'Parte Individual' => 'Parte Individual',
                                                'Conjunto / Ensamble' => 'Conjunto / Ensamble'
                                            ], null, ['class' => 'form-control', 'id' => 'Identificacion'])}}
                                            <label for="Identificacion"> Identificación </label>
                                        </div>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="Funcionamiento" name="Funcionamiento" rows="1">{{old('Funcionamiento', $producto->Funcionamiento)}}</textarea>
                                            <label for="Funcionamiento"> Funcionamiento </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Fabricante" name="Fabricante" required value="{{old('Fabricante', $producto->Fabricante)}}">
                                            <label for="Fabricante"> Fabricante </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="PrecioCompra" name="PrecioCompra" value="{{old('PrecioCompra', $producto->PrecioCompra)}}">
                                            <label for="PrecioCompra"> Precio de Compra</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @if($producto->DocTecnica != null)
                                        <div class="foto-producto">
                                            <a href="{{URL::asset('secad/Productos/' . $producto->Nombre.'-'.$producto->ParteNumero.'/'.$producto->DocTecnica)}}" target="_blank"><img id="image_upload_preview" src="{{URL::asset('/img/doc.png')}}" alt="profile Pic" ></a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                            <label for="foto">Documentación Tecnica</label>
                                           {!! Form::file('doc', array('class' => 'form-control', 'id' => 'inputFile', '')) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="LugarNacim" name="Observaciones">{{old('Observaciones', $producto->Observaciones)}}</textarea>
                                    <label for="Observaciones"> Observaciones </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                     {{ Form::select('Anio', [
                                                '' => '',
                                                '2012' => '2012',
                                                '2013' => '2013',
                                                '2014' => '2014',
                                                '2015' => '2015',
                                                '2016' => '2016',
                                                '2017' => '2017',
                                                '2018' => '2018',
                                                '2019' => '2019',
                                                '2020' => '2020',
                                                '2021' => '2021'
                                            ], null, ['class' => 'form-control', 'id' => 'Anio'])}}
                                    <label for="Anio"> Año </label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="TiempoEntrega" name="TiempoEntrega" onKeyPress="return soloNumeros(event)" value="{{old('TiempoEntrega', $producto->TiempoEntrega)}}">
                                    <label for="TiempoEntrega"> Tiempo de Entrega </label>
                                </div>
                            </div>
                             <div class="col-sm-2">
                                <div class="form-group">
                                    {{ Form::select('PeriodoTiempoEntrega', [
                                                '' => '',
                                                'Hora(s)' => 'Hora(s)',
                                                'Dia(s)' => 'Dia(s)',
                                                'Semana(s)' => 'Semana(s)',
                                                'Mese(s)' => 'Mese(s)'
                                            ], null, ['class' => 'form-control', 'id' => 'PeriodoTiempoEntrega'])}}
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                     {{ Form::select('Clase', [
                                                '' => '',
                                                'Clase I' => 'Clase I',
                                                'Clase II' => 'Clase II',
                                                'Clase III' => 'Clase III'
                                            ], null, ['class' => 'form-control', 'id' => 'Clase'])}}
                                    <label for="Clase">Clase</label>
                                </div>
                            </div>  
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
							<button type="button" onclick="window.location='{{ route("productos.index") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

		{{-- SCRIPTS --}}

        {{-- Solo Numeros --}}
        <script src="{{URL::asset('js/soloNumeros.js')}}"></script>

        <script type="text/javascript">
            // Previw Img
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image_upload_preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#inputFile").change(function () {
                readURL(this);
            });

            $('select').select2();
        </script>
		@endsection()

	@endsection()

@endsection()