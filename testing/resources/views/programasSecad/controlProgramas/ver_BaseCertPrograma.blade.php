@extends('partials.card')

@extends('layout')

@section('title')
	Asignar Bases de Certificación
@endsection()

@section('addcss')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">


@endsection()

@section('javascript')
<script language="javascript">

				function check(a) {
  					document.getElementById(a).checked = true;
					  alert('Si entro mi pets');
				}

				function uncheck(a) {
					document.getElementById(a).checked = false;
				alert('llego al alerta un check');
				}
</script>			
@endsection()

@section('content')




	@section('card-content')

		@section('form-tag')

			{!! Form::open(array('route' => 'basesCertiPrograma.store', 'files' =>true,'id'=>'formenvio')) !!}

			{{ csrf_field()}}

		@endsection

		@section('card-title')
			{{-- {{Breadcrumbs::render('crear_personal')}} --}}
			Asignar Bases de Certificación - Programa
		@endsection()

		@section('card-content')







		 <div class="card-body floating-label">

            <div class="card">
                
	           <div class="card-body">
					<div class="row">
						<div class="col-sm-12">
	                      	{{-- <ul class="list divider-full-bleed"> --}}
							  <table class="Reponsive" style="Border : 0" id="example">
							    <thead>
									<tr><th></th><th>DESCRIPCIÓN</th></tr>					  
								</thead>
	                            @foreach ($basesCertificacion as $baseCertificacion)

									<tr>
										<td>
												@if(count($programa->programas->where('IdBaseCertificacion',$baseCertificacion->IdBaseCertificacion))>0)
													<?php $b = "checked"; ?>
												@else
													{{$b=''}}
												@endif
												<input id="bsp_{{$baseCertificacion->IdBaseCertificacion}}" name="bsp_{{$baseCertificacion->IdBaseCertificacion}}" type="checkbox" {{$b}} >
										</td>
										<td>				
                                               {{$baseCertificacion->Nombre}} | {{$baseCertificacion->Referencia}}
										</td>
									</tr>
	                            @endforeach
								<tfoot>
									<tr><td> </td><th border="0">DESCRIPCIÓN</th></tr>					  		
								</tfoot>
								</table>
						</div>
					</div>
				</div>

			

					<input type="hidden" id="IdPrograma" name="IdPrograma" value="{{$IdPrograma}}">
					
            </div>
		</div>
			<div class="form-group">
				<div class="row">
					<div class="col-sm-6">
						<button type="submit" id="load" class="btn btn-info btn-block" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando">Guardar</button>
					</div>
					<div class="col-sm-6">
						<button type="button" onclick="window.location='{{ url("programa") }}'" style="" class="btn btn-danger btn-block">Cancelar</button>
					</div>
				</div>
			</div>
        </div>
		{!! Form::close() !!}

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
		<script type="text/javascript">




$(document).ready(function() {

	$('#load').on('click', function() 
	{
	    var $this = $(this);
	   	$('#formenvio').submit();
	    var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> Cargando...';
	    if ($(this).html() !== loadingText) {
	      $this.data('original-text', $(this).html());
	      $this.html(loadingText);
	      $this.attr('disabled', 'disabled');
	    }
	    setTimeout(function() {
	      $this.html($this.data('original-text'));
	      $this.removeAttr('disabled');
	    }, (180*1000)); //3 minutos
	  });
	$('#example tfoot th').each( function () {
        var title = $(this).text();
       $(this).html( '<input type="text" placeholder="B '+title+'" />' );
     } );


    var table=$('#example').DataTable( {
		
		dom: 'Bfxrtip',
		sPaginationType: "full_numbers",
    	bProcessing: true,
    	bAutoWidth: false,
    	language: {
      	decimal: "",
      	emptyTable: "No se han encontrado Datos",
      	info:
        "Mostrando desde el _START_ al _END_ del total de _TOTAL_ registros",
      	infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
      	infoFiltered: "(Filtrados del total de _MAX_ registros)",
      	infoPostFix: "",
      	thousands: ",",
      	lengthMenu: "Mostrar _MENU_ registros por página",
      	loadingRecords: "Cargando...",
      	processing: "Procesando...",
      	search: "Buscar:",
      	zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",
      	paginate: {
        first: "Primera",
        last: "Última",
        next: "Siguiente",
        previous: "Anterior"
      	},
      	aria: {
        	sortAscending: ": activate to sort column ascending",
        	sortDescending: ": activate to sort column descending"
      		}
    	},
		buttons: [
             'copy'
		],
		 columnDefs: [
			{ width: "5%", targets: 0 },
			{ width: "95%", targets: 1 }			
		],
		
    } );
/*
    $(document).ready(function(){
					$('#example').DataTable({
						dom: 'Bfxrtip',
						sPaginationType: "full_numbers",
			    		bProcessing: true,
						bAutoWidth: false,
						buttons: [
			             'excel',
			             ]
						});
				});*/

	{{-- table.columns([3]).every( function () {
    var that = this;
 
    $( 'input' ).on( 'keyup change', function () {
        if ( that.search() !== this.value ) {
            that
                .search( this.value )
                .draw();
        	}
    	} );
	} );
	
 --}} 
    // DataTable
    //var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                   .draw();
            }
        } );
    } );

$.fn.table.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[14] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             	( isNaN( min ) && age <= max ) ||
             	( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        	{
            	return true;
        	}
        	return false;
    	}
	);

	$(document).ready(function() {
    //var table = $('#example').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    	} );
	} );
	
} );


 





var orientation = '';
        var count = 0;
        $("table.dataTable").find('thead tr:first-child th').each(function () {
            count++;
        });
        if (count > 6) {
            orientation = 'landscape';
        } else {
            orientation = 'portrait';
        }
</script>



		@endsection()

	@endsection()

@endsection()