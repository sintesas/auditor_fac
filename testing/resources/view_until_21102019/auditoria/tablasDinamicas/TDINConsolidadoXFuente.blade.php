@extends('partials.card_big')

@extends('layout')

@section('title')
	Consolidado x Fuente
@endsection()

@section('content')

	@section('card-content')

		@section('form-tag')

		@endsection

		@section('card-title')
			Consolidado x Fuente
		@endsection()

		@section('card-content')

			<div class="card-body floating-label">
				<div style="overflow-x: auto;" id="output"></div>
			</div>

			 <script type="text/javascript">
			 	var derivers = $.pivotUtilities.derivers;
		        var renderers = $.extend($.pivotUtilities.renderers, $.pivotUtilities.plotly_renderers);

			    // This example is the most basic usage of pivotUI()
				$.get('consolidadoxfuente/vistaAuditorias/', function(response, state){
				// console.log(response);
					//console.log('entra', state, response);
					$("#output").pivotUI(
			            response,
			            {
			            	renderers: renderers,
			                rows: ["Codigo", "Empresa", "Proceso"],
			                cols: ["Fuente", "NoAnota"],
			                aggregatorName: "Count",
			            }
			        );
				});

			    $(function(){
			        
			     });
        	</script>
		@endsection()

	@endsection()

@endsection()