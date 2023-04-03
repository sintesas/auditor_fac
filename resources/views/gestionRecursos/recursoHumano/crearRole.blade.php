@extends('partials.card')

@extends('layout')

@section('title')
	Roles
@endsection()

@section('content')

    @section('card-content')

        @section('card-title')
            {{Breadcrumbs::render('roles')}}

            <button type="button" class="btn btn-info ink-reaction btn-primary addbutton" id="myBtn"><span class="fa fa-plus"></span></button>

        @endsection()

        @section('card-content')

        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="datatable1" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @endsection()

    @endsection()

    @section('addjs')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>

    @endsection()

@endsection()