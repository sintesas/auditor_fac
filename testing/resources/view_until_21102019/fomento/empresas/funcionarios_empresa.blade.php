@extends('partials.card')

@extends('layout')

@section('title')
	Detalle Empresa
@endsection()

@section('addcss')
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
	<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection()

@section('content')

@section('card-content')

@section('card-title')

{{ Breadcrumbs::render('funcionarios_empresa') }}
@if(count($funcionarios)>0)
<button type="button" onclick="document.getElementById('id1').style.display='block'" style="margin-left:800px;" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>
@endif()

@endsection()

<div class="col-lg-12">

	@if(count($funcionarios)==0)
	<div style="text-align: center;" id="lunch">
		<center> <h2> No existen Funcionarios, Haga click en el boton <button style="right: 0px !important; position: relative !important; top: 0px !important;" type="button" onclick="document.getElementById('id1').style.display='block'" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button> </h2> </center>
	</div>
	@else


	<div class="table-responsive">
		<table id="datatable1" class="table table-striped table-hover">
			<thead>
				<tr>
					<th><b>Nombres y apellidos</b></th>
					<th><b>Cargo</b></th>
					<th><b>Celular</b></th>
					<th><b>Email</b></th>
					<th><b>Acción</b></th>
				</tr>
			</thead>

			<tbody>

				@foreach ($funcionarios as $funcionario)
				<tr class="funcionario{{$funcionario->IdFuncionarioEmpresa}}">
					<td>{{$funcionario->Nombres}}</td>
					<td>{{$funcionario->CargoFuncion}}</td>
					<td>{{$funcionario->Celular}}</td>
					<td>{{$funcionario->Email}}</td>

					<td>
						
						<div class="col-sm-6">
							<button class="btn btn-danger btn-delete delete-record" value="{{$funcionario->IdFuncionarioEmpresa}}"><span class="glyphicon glyphicon-trash"></span></button>

						</div>
						<div class="col-sm-6">
							<button class="btn btn-primary btn-default edit-modal" data-id="{{$funcionario->IdFuncionarioEmpresa}}" data-identificacion="{{$funcionario->NumIdentificacion}}" data-nombres="{{$funcionario->Nombres}}" data-celular="{{$funcionario->Celular}}" data-telefono="{{$funcionario->Telefono}}" data-email="{{$funcionario->Email}}" data-cargo="{{$funcionario->CargoFuncion}}">
                    			<span class="glyphicon glyphicon-edit"></span>
                			</button>
						</div>
						
					</td>


				</tr>
				@endforeach
				
			</tbody>
		</table>
	</div>
@endif
</div>


{{-- BEGIN CREATE MODAL --}}
<div id="id1" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Crear Nuevo Funcionario</header>
			<span style="margin-right: 20px;" onclick="document.getElementById('id1').style.display='none'"
			class="close">x</span> 
		</div>

		<div class="card">
			<div class="card-body floating-label">

				{!! Form::open(array('route' => 'funcionariosEmpresa.store')) !!}

				{{ csrf_field()}}

				<div class="card">
					<div class="card-body">

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input onKeyPress="return soloNumeros(event)" type="text" class="form-control" id="cNumIdentificacion" name="NumIdentificacion" required>
									<label for="NumIdentificacion">Identificación</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cNombres" name="Nombres" required>
									<label for="Nombres">Nombres y apellidos</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input onKeyPress="return soloNumeros(event)" type="text" class="form-control" id="cCelular" name="Celular" required>
									<label for="Celular">Celular</label>
								</div>
							</div>
	

							<div class="col-sm-6">
								<div class="form-group">
									<input onKeyPress="return soloNumeros(event)" type="text" class="form-control" id="cTelefono" name="Telefono" required>
									<label for="Telefono">Telefono</label>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cEmail" name="Email" required>
									<label for="Email">Email</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="cCargoFuncion" name="CargoFuncion" required>
									<label for="CargoFuncion">Cargo</label>
								</div>
							</div>

							<input type="hidden" value="{{$empresa->IdEmpresa}}" name="IdEmpresa">
	
	
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

{{-- END CREATE MODAL --}}

<div id="myModal" class="modal" style="padding-top:80px;">

	<div class="modal-content" style="width:60%;">

		<div class="card-head style-primary">
			<header>Editar Participante</header>
		</div>

		<div class="card">
			<div class="card-body floating-label">


				<form class="form-horizontal" role="form">

					<div class="card">
						<div class="card-body">

							<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input onKeyPress="return soloNumeros(event)" type="text" class="form-control" id="NumIdentificacion" name="NumIdentificacion" required>
									<label for="NumIdentificacion">Identificación</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Nombres" name="Nombres" required>
									<label for="Nombres">Nombres y apellidos</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input onKeyPress="return soloNumeros(event)" type="text" class="form-control" id="Celular" name="Celular" required>
									<label for="Celular">Celular</label>
								</div>
							</div>
	

							<div class="col-sm-6">
								<div class="form-group">
									<input onKeyPress="return soloNumeros(event)" type="text" class="form-control" id="Telefono" name="Telefono" required>
									<label for="Telefono">Telefono</label>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="Email" name="Email" required>
									<label for="Email">Email</label>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" id="CargoFuncion" name="CargoFuncion" required>
									<label for="CargoFuncion">Cargo</label>
								</div>
							</div>

							<input type="hidden" id="IdFuncionarioEmpresa" name="IdFuncionarioEmpresa">
						</div>

						</div>  
					</div>

				</form>

				<div class="modalfooter">
					<div class="col-sm-6">
						<button type="button" class="btn actionBtn" data-dismiss="modal">
							<span id="footer_action_button" class="glyphicon"></span>
						</button>
					</div>
					<div class="col-sm-6">
						<button type="button" class="btn cancelBtn" data-dismiss="modal">
							<span class="glyphicon glyphicon-remove"></span>
						</button>
					</div>
				</div>


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


        $('#IdFuncionarioEmpresa').val($(this).data('id'));
        $('#NumIdentificacion').val($(this).data('identificacion'));
        $('#Nombres').val($(this).data('nombres'));
        $('#Celular').val($(this).data('celular'));
        $('#Email').val($(this).data('email'));
        $('#CargoFuncion').val($(this).data('cargo'));
        $('#Telefono').val($(this).data('telefono'));
        $('#myModal').modal('show');

    });


    $('.modalfooter').on('click', '.edit', function(){

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

    	$.ajax({

    		type: 'post',
    		url: '/editfuncionario',
    		data: {
    			
			'id': $("#IdFuncionarioEmpresa").val(),
			'nombres': $("#Nombres").val(),
			'numidentificacion': $("#NumIdentificacion").val(),
			'celular': $("#Celular").val(),
			'email': $("#Email").val(),
			'cargofuncion': $("#CargoFuncion").val(),
			'telefono': $("#Telefono").val(),
			

    		},

    		success: function(data){
                // alert("value " + data.CodigoAC2324 + " updated");
    			$('.funcionario' + data.IdFuncionarioEmpresa).replaceWith("<tr class='funcionario" + data.IdFuncionarioEmpresa + "'><td>"+data.Nombres+"</td> <td>" + data.CargoFuncion + "</td> <td>" + data.Celular +"</td> <td> "+ data.Email +" </td> <td><div class='col-sm-6'><button class='delete-modal btn btn-danger' data-idfuncionario='" + data.IdFuncionarioEmpresa + "' ><span class='glyphicon glyphicon-trash'></span> </button></div><div class='col-sm-6'> <button class='edit-modal btn btn-info' data-id='"+ data.IdFuncionarioEmpresa +"' data-identificacion='"+data.NumIdentificacion+"' data-nombres='"+data.Nombres+"' data-celular='"+data.Celular+"' data-telefono='"+data.Telefono+"' data-email='"+data.Email+"' data-cargo='"+data.Cargo+"'><span class='glyphicon glyphicon-edit'></span> Editar</button> </div> </td> </tr>");
    		}
        
    	});

    });




    // END EDIT 



    // DELETE


    $(document).on('click','.delete-record',function(){
        
        var idfuncionario = $(this).val();
         
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });


        $.ajax({
            type: "DELETE",
            url: '/deletefuncionario' + '/' + idfuncionario,
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

<script src="{{asset('js/soloNumeros.js ')}}"></script>

<script src="{{URL::asset('js/libs/DataTables/jquery.dataTables.js')}}"></script>

<script>
	$(document).ready(function(){
		$('#datatable1').DataTable();
	});
</script>



@endsection()


@endsection()