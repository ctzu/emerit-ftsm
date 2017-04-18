@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Maklumat Aktiviti<a href="{{ url('/aktiviti/create') }}" class="btn btn-info pull-right"
role="button">Tambah Maklumat Aktiviti</a></h2>

	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th width="30%">Maklumat</th>
								<th width="10%"></th>
								<th width="20%">Daripada</th>
								<th width="15%">Status</th>
								<th width="25%">Tindakan</th>
							</tr>
						</thead>
						<tbody pull-{right}>
							<?php $i = 0 ?>
							@forelse($aktivitis as $aktiviti)
								<tr>
									<td>{{ $aktivitis->firstItem() + $i }}</td>
									<td>{{ $aktiviti->namaAktiviti }}</td>
									<td>
										{{ $aktiviti->created_at->diffForHumans() }}
									</td>
									<td>{{ $aktiviti->user->name }}</td>
									<td>{{ $aktiviti -> completed ==false? 'pending':'completed' }}</td>
									<td>
									@if( $aktiviti->user_id == Auth::user()->id)
										<a href="{{ action('AktivitisController@edit', $aktiviti->id) }}"
class="btn btn-primary btn-sm">Edit</a>
										<a href="{{ action('AktivitisController@destroy', $aktiviti->id) }}"
class="btn btn-danger btn-sm" id="confirm-modal">Padam</a>

										<a href="{{ action('AktivitisController@completed', $aktiviti->id) }}"
										class="btn btn-xs btn-white">{{$aktiviti->completed == true ? 'Mark pending':'Mark complete'}}</a>
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
						{{ $aktivitis->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection