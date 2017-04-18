@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline my-4 my-lg-5 pull-right" method="get" action="{{ url('papar') }}">
            <input class="form-control mr-sm-2" type="text" placeholder="Cari" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        </form>
        <h2>Hebahan UKM</h2>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">

                <div class="table-responsive" >
                    <table class="table table-striped">

                    <tbody pull-{right}>
                    <?php $i = 0 ?>
                    @forelse($hebahans as $hebahan)
                    <tr>
                        <td>
                            <h5><a href="{{ url('papar', $hebahan->id) }}"><strong>{{ $hebahan->tajukAktiviti }} </strong></a></h5>
                            <p> Published at {{ $hebahan->created_at }}</p>
                            <!-- <p> {{ $hebahan->lokasi }}</p> -->

                        </td>
                    </tr>
                    <?php $i++ ?>
                    @empty
                    @endforelse
                    </tbody>
                    </table>
                    <div class="text-center">
                        {{ $hebahans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection