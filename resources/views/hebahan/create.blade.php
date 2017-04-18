@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Cipta Hebahan Aktiviti</h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-10">              
                <form class="form-horizontal" action="{{ action('HebahansController@store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama</label>
                        <div class="col-md-8">
                            <td>{{Auth::user()->name}}</td>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">No. Matrik</label>
                        <div class="col-md-8">
                            <td>{{Auth::user()->nomatrik}}</td>
                        </div>
                    </div>

                    <!-- Tajuk Aktiviti -->
                    <div class="form-group{{ $errors->has('tajukAktiviti') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Tajuk Aktiviti</label>
                       <div class="col-md-6">
                        {!! Form::text('tajukAktiviti', null, array('placeholder' => 'Tajuk Aktiviti','class' => 'form-control')) !!}
                        </div>
                    </div>

                        <!-- maklumat Hebahan -->

                        <div class="form-group{{ $errors->has('maklumatAktiviti') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Maklumat Hebahan</label>
                       <div class="col-md-6">
                        {!! Form::textarea('maklumatAktiviti', null, array('placeholder' => 'Maklumat Hebahan','class' => 'form-control')) !!}
                        </div>
                    </div>

                         <!-- <div class="form-group{{ $errors->has('maklumatAktiviti') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Maklumat Hebahan</label>
                       <div class="col-md-6">
                            <textarea class="form-control" name="maklumatAktiviti" placeholder="Masukkan maklumat aktiviti" rows="6"
                                      value="{{ old('maklumatAktiviti') }}" maxlength="500"></textarea>
                            <p class="text-muted">Maxmimum character is 500</p>
                            @if($errors->has('maklumatAktiviti'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('maklumatAktiviti') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div> -->
                    <!--  -->
                    <div class="form-group">
                        <div class="col-sm-offset-8 col-sm-14">
                            <a href="{{ action('HebahansController@index') }}" class="btn btn-default">Batal</a>
                            <button type="submit" class="btn btn-success">Hantar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection