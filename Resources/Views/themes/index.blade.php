@extends('app')

{{-- Web site Title --}}
@section('title')
{{ Lang::choice('kotoba::account.profile', 2) }} :: @parent
@stop

@section('styles')
	<link href="{{ asset('assets/vendors/DataTables-1.10.5/plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@stop

@section('scripts')
	<script src="{{ asset('assets/vendors/DataTables-1.10.5/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/vendors/DataTables-1.10.5/plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
@stop

@section('inline-scripts')
$(document).ready(function() {
oTable =
	$('#table').DataTable({
	});
});
@stop



{{-- Content --}}
@section('content')

<div class="row">
<h1>
	<i class="fa fa-gears fa-lg"></i>
		{{ Lang::choice('kotoba::module.module', 2) }}
	<hr>
</h1>
</div>


<div class="row">

<table id="table" class="table table-striped table-hover">
	<thead>
		<tr>
			<th></th>
			<th>{{ trans('kotoba::table.name') }}</th>
			<th>{{ trans('kotoba::table.slug') }}</th>
			<th>{{ trans('kotoba::table.version') }}</th>
			<th>{{ trans('kotoba::table.description') }}</th>
			<th>{{ trans('kotoba::table.enabled') }}</th>
			<th>{{ trans('kotoba::table.order') }}</th>

			<th>{{ Lang::choice('kotoba::table.action', 2) }}</th>
		</tr>
	</thead>
	<tbody></tbody>
</table>

</div>


@if (count($themes))

<div class="row">
<table id="table" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>{{ trans('kotoba::table.name') }}</th>
			<th>{{ trans('kotoba::table.slug') }}</th>
			<th>{{ trans('kotoba::table.author') }}</th>
			<th>{{ trans('kotoba::table.description') }}</th>
			<th>{{ trans('kotoba::table.version') }}</th>
			<th>{{ Lang::choice('lingos::table.actions', 2) }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($themes as $theme)
			<tr>
				<td>{{ $theme->name }}</td>
				<td>{{ $theme->slug }}</td>
				<td>{{ $theme->author }}</td>
				<td>{{ $theme->description }}</td>
				<td>{{ $theme->version }}</td>
				<td>
					<a href="/themes/{{ $theme->slug }}" class="btn btn-primary" title="{{ trans('kotoba::button.edit') }}">
						<i class="fa fa-pencil fa-fw"></i>
						{{ trans('kotoba::button.edit') }}
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
</div>


@else
<div class="alert alert-info">
</div>
	{{ trans('kotoba::general.error.not_found') }}
@endif
</div>
@stop



@stop
