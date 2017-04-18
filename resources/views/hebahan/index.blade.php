@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Maklumat Aktiviti<a href="{{ url('/hebahan/create') }}" class="btn btn-info pull-right"
role="button">Hebahan Aktiviti</a></h2>

	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th width="40%">Maklumat</th>
								<th width="15%"></th>
								<th width="20%">Daripada</th>
								<th width="25%">Tindakan</th>
							</tr>
						</thead>
						<tbody pull-{right}>
							<?php $i = 0 ?>
							@forelse($hebahans as $hebahan)
								<tr>
									<td >{{ $hebahans->firstItem() + $i }}</td>
									<td>{{ $hebahan->tajukAktiviti }}</td>
									<td>
										{{ $hebahan->created_at->diffForHumans() }}
									</td>
									<td>{{ $hebahan->user->name }}</td>
									<td>
									@if( $hebahan->user_id == Auth::user()->id)
									
										<a href="{{ action('HebahansController@edit', $hebahan->id) }}"
class="btn btn-primary btn-sm">Edit</a>
										<a href="{{ action('HebahansController@destroy', $hebahan->id) }}"
class="btn btn-danger btn-sm" id="confirm-modal">Padam</a>
									@endif
									</td>
								</tr>
								<?php $i++ ?>
							@empty
							<tr>
								<td colspan="6">Rekod tiada</td>
							</tr>
							
							@endforelse
						</tbody>
					</table>
						{{ $hebahans->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection