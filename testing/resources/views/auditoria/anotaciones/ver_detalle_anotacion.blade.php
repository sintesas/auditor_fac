@extends('partials.card')

@extends('layout')

@section('title')
Detalle Anotación
@endsection()

@section('addcss')
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
	<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection()

@section('content')


@section('card-content')

@section('card-title')
{{Breadcrumbs::render('ver_detalle_anotacion')}}


<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>



@endsection()

<div class="col-lg-12">
	<div>
		<strong>Auditoría código:</strong>{{$anotacion->auditorias->Codigo}}
	</div>
	<div>
		<strong>Nombre Auditoria:</strong>{{$anotacion->auditorias->NombreAuditoria}}
	</div>
	<div>
		<strong>Número de nota:</strong> {{$anotacion->NoAnota}}
	</div>
<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Causa Raiz</b></th>
					<th><b>Acción Tarea</b></th>
					<th><b>Inicio</b></th>
					<th><b>Final</b></th>
					<th><b>Responsable</b></th>
					<th><b>Entregable</b></th>
					<th><b>X</b></th>
					<th><b>Editar</b></th>
				</tr>
			</thead>

			<tbody>

				@foreach($causasRaiz as $causa)
				
				<tr>
					<td>{{$causa->CausaRaiz}}</td>
					<td>{{$causa->AccionTarea}}</td>
					<td>{{$causa->FechaInicio}}</td>
					<td>{{$causa->FechaTermino}}</td>
					<td>{{$causa->Responsable}}</td>
					<td>{{$causa->Entregable}}</td>

					
					<td>
						<div class="col-sm-2">
							{!! Form::open(['route' => ['causaRaiz.destroy', $causa->IdCausaRaiz,], 'method' => 'DELETE']) !!}
							{!!Form::submit('x', ['class' => 'btn btn-danger deleteButton']) !!}
							{!! Form::close() !!}
						</div>
					</td>
					<td>
						<button class="edit-modal btn btn-info" data-id="{{$anotacion->IdAnotacion}}" data-id5m="{{$causa->Id5M}}" data-idaspecto5m="{{$causa->IdAspecto5M}}" data-priorizacion="{{$causa->Priorizacion}}" data-causaraiz="{{$causa->CausaRaiz}}" data-acciontarea="{{$causa->AccionTarea}}" data-fechainicio="{{$causa->FechaInicio}}" data-fechatermino="{{$causa->FechaTermino}}" data-responsable="{{$causa->Responsable}}" data-entregable="{{$causa->Entregable}}" data-idcausa="{{$causa->IdCausaRaiz}}">
							<span class="glyphicon glyphicon-edit"></span> Editar
						</button>	
					</td>
				</tr>
				
				@endforeach()

			</tbody>
		</table>
	</div>
	


	
</div>



{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Crear Nueva Causa Raiz</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'causaRaiz.store')) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">

						<div class="row">

							<input type="hidden" id="cIdAnotacion" name="IdAnotacion" value="{{$anotacion->IdAnotacion}}">

							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::select('Id5M', $record5m->prepend('none')->pluck('Metodo', 'Id5M'), null, ['class' => 'form-control', 'id' => 'cId5M']) }}
									<label for="Id5M">Causa 5M</label>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::select('IdAspecto5M', $aspectos5m->prepend('none')->pluck('Aspecto', 'IdAspecto5M'), null, ['class' => 'form-control', 'id' => 'cIdAspecto5M']) }}
									<label for="IdAspecto5M">Aspecto 5M</label>
								</div>	
							</div>

						</div>

						<div class="row">

							<div class="col-sm-2">
								<div class="form-group">
									<input type="number" class="form-control" id="cPriorizacion" name="Priorizacion" required>
									<label for="Priorizacion">Priorizacion</label>
								</div>
							</div>

							<div class="col-sm-5">
								<div class="form-group">
									<input type="text" class="form-control" id="cCausaRaiz" name="CausaRaiz" required>
									<label for="CausaRaiz">Causa raiz</label>
								</div>
							</div>

							<div class="col-sm-5">
								<div class="form-group">
									<input type="text" class="form-control" id="cAccionTarea" name="AccionTarea" required>	
									<label for="AccionTarea">Accion Tarea</label>
								</div>
							</div>
							
						</div>

						<div class="row">
							<div class="col-sm-3">
								<div class="input-group date" id="demo-date-format">
									<div class="input-group-content">
										<input type="text" class="form-control" id="cFechaInicio" name="FechaInicio" required>
										<label for="FechaInicio">Fecha de Inicio</label>
									</div>
									<span class="input-group-addon"></span>
								</div>	
							</div>

							<div class="col-sm-3">
								
								<div class="input-group date" id="demo-date-format">
									<div class="input-group-content">
										<input type="text" class="form-control" id="cFechaTermino" name="FechaTermino" required>
										<label for="FechaTermino">Fecha Final</label>
									</div>
									<span class="input-group-addon"></span>
								</div>
									
								
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<input type="text" class="form-control" id="cResponsable" name="Responsable" required>
									<label for="Responsable">Responsable</label>
								</div>
							</div>

							<div class="col-sm-3">
								<div class="form-group">
									<input type="number" class="form-control" id="cEntregable" name="Entregable" required>
									<label for="Entregable">Entregable</label>
								</div>
							</div>
						</div>

					</div> 
				</div>

				<div class="row">
					<div class="col-sm-6">
						<button type="submit" style="" class="btn btn-info btn-block">Crear</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="document.getElementById('id1').style.display='none'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
	

				{!! Form::close() !!}
				
			</div>
		</div>

	</div>
</div>

{{-- END CREATE MODAL --}}

<div id="myModal" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Editar Causa raiz</header>
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(['route' => ['causaRaiz.update', $anotacion->IdAnotacion,], 'method' => 'PUT','id'=>'actualizar']) !!}
					<div class="card">

						<div class="card-body">
							
							<input type="hidden" id="IdAnotacion" name="IdAnotacion" value="{{$anotacion->IdAnotacion}}">
							<input type="hidden" id="IdCausaRaiz" name="IdCausaRaiz">

							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::select('Id5M', $record5m->prepend('none')->pluck('Metodo', 'Id5M'), null, ['class' => 'form-control', 'id' => 'Id5M']) }}
									<label for="Id5M">Causa 5M</label>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::select('IdAspecto5M', $aspectos5m->prepend('none')->pluck('Aspecto', 'IdAspecto5M'), null, ['class' => 'form-control', 'id' => 'IdAspecto5M']) }}
									<label for="IdAspecto5M">Aspecto 5M</label>
								</div>	
							</div>

							<div class="row">

								<div class="col-sm-2">
									<div class="form-group">
										<input type="number" class="form-control" id="Priorizacion" name="Priorizacion" required>
										<label for="Priorizacion">Priorizacion</label>
									</div>
								</div>

								<div class="col-sm-5">
									<div class="form-group">
										<input type="text" class="form-control" id="CausaRaiz" name="CausaRaiz" required>
										<label for="CausaRaiz">Causa raiz</label>
									</div>
								</div>

								<div class="col-sm-5">
									<div class="form-group">
										<input type="text" class="form-control" id="AccionTarea" name="AccionTarea" required>	
										<label for="AccionTarea">Accion Tarea</label>
									</div>
								</div>
								
							</div>

							<div class="row">
								<div class="col-sm-3">
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="FechaInicio" name="FechaInicio" required>
											<label for="FechaInicio">Fecha de Inicio</label>
										</div>
										<span class="input-group-addon"></span>
									</div>	
								</div>

								<div class="col-sm-3">
									
									<div class="input-group date" id="demo-date-format">
										<div class="input-group-content">
											<input type="text" class="form-control" id="FechaTermino" name="FechaTermino" required>
											<label for="FechaTermino">Fecha Final</label>
										</div>
										<span class="input-group-addon"></span>
									</div>
										
									
								</div>

								<div class="col-sm-3">
									<div class="form-group">
										<input type="text" class="form-control" id="Responsable" name="Responsable" required>
										<label for="Responsable">Responsable</label>
									</div>
								</div>

								<div class="col-sm-3">
									<div class="form-group">
										<input type="text" class="form-control" id="Entregable" name="Entregable" required>
										<label for="Entregable">Entregable</label>
									</div>
								</div>
							</div>


							
						</div>

					</div>  
					


				<div class="modalfooter">
					<div class="col-sm-6">
						<button type="submit" class="btn actionBtn">
							<span id="footer_action_button" class="glyphicon"></span>
						</button>
					</div>
					<div class="col-sm-6">
						<button type="button" class="btn cancelBtn" data-dismiss="modal">
							<span class="glyphicon glyphicon-remove"></span>
						</button>
					</div>
				</div>
				</form>


			</div>
		</div>

	</div>
</div>








@endsection()

@section('addjs')

<script>

	$(document).ready(function(){

		$(document).on('click', '.edit-modal', function(){
        $('#footer_action_button').text("Actualizar");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-info');
        $('.actionBtn').addClass('btn-block');    
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.cancelBtn').addClass('btn-danger');
        $('.cancelBtn').addClass('btn-block');    
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();

        $('#IdAnotacion').val($(this).data('id5m'));
        $('#Id5M').val($(this).data('id5m'));
        //$('#actualizar').attr('action', '/causaRaiz/'+$(this).data('idcausa'));
        $('#IdAspecto5M').val($(this).data('idaspecto5m'));
        $('#Priorizacion').val($(this).data('priorizacion'));
        $('#CausaRaiz').val($(this).data('causaraiz'));
        $('#IdCausaRaiz').val($(this).data('idcausa'));
        $('#AccionTarea').val($(this).data('acciontarea'));
        $('#FechaInicio').val($(this).data('fechainicio'));
        $('#FechaTermino').val($(this).data('fechatermino'));
        $('#Responsable').val($(this).data('responsable'));
        $('#Entregable').val($(this).data('entregable'));
        $('#myModal').modal('show');

    });


    $('.modalfooter').on('click', '.edit', function(){

    	
        /*$.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

    	$.ajax({

    		type: 'post',
    		url: '/editfuncionario',
    		data: {
    	
			'id5m': $("#Id5M").val(),
			'idaspecto5m': $("#IdAspecto5M").val(),
			'priorizacion': $("#Priorizacion").val(),
			'causaraiz': $("#CausaRaiz").val(),
			'acciontarea': $("#AccionTarea").val(),
			'fechainicio': $("#FechaInicio").val(),
			'fechatermino': $("#FechaTermino").val(),
			'responsable': $("#Responsable").val(),
			'entregable': $("#Entregable").val(),
			

    		},

    		success: function(data){
                // alert("value " + data.CodigoAC2324 + " updated");
    			$('.funcionario' + data.IdFuncionarioEmpresa).replaceWith("<tr class='funcionario" + data.IdFuncionarioEmpresa + "'><td>"+data.Nombres+"</td> <td>" + data.CargoFuncion + "</td> <td>" + data.Celular +"</td> <td> "+ data.Email +" </td> <td><div class='col-sm-6'><button class='delete-modal btn btn-danger' data-idfuncionario='" + data.IdFuncionarioEmpresa + "' ><span class='glyphicon glyphicon-trash'></span> </button></div><div class='col-sm-6'> <button class='edit-modal btn btn-info' data-id='"+ data.IdFuncionarioEmpresa +"' data-identificacion='"+data.NumIdentificacion+"' data-nombres='"+data.Nombres+"' data-celular='"+data.Celular+"' data-telefono='"+data.Telefono+"' data-email='"+data.Email+"' data-cargo='"+data.Cargo+"'><span class='glyphicon glyphicon-edit'></span> Editar</button> </div> </td> </tr>");
    		}
        
    	});*/

    });




    // END EDIT 



    // DELETE


    $(document).on('click','.delete-record',function(){
        
        var idfuncionario = $(this).val();
         
        alert(idfuncionario);
        return false;
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        $.ajax({
            type: "DELETE",
            url: '/causaRaiz' + '/' + idfuncionario,
            success: function (data) {
                console.log(data);
                $(".funcionario" + idfuncionario).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    // END DELETE


	});

</script>




<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>



@endsection()


@endsection()