@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Tambah Maklumat Aktiviti</h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-10">             
                <form class="form-horizontal" action="{{ action('AktivitisController@store') }}" method="POST" enctype="multipart/form-data">
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

                    <!-- nama kelab -->
                    <div class="form-group{{ $errors->has('namaKelab') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Nama Kelab</label>
                        <div class="col-md-6">
                    {{ Form::select('namaKelab',
                           ['robotic' => 'Robotics Club', 'multimedia' => 'Interactive Multimedia', 'mobile' => 'Mobile Apps Development', 'video' => 'Video Innovation', 'numoss' => 'Open Source(NUMOSS)', 'lensa' => 'Lensa Informatics', 'business' => 'iBusiness Innovative', 'cyber' => 'Cyber Ethics', 'intelligentmachine' => 'Intelligent Machines', 'pcc' => 'Programming Challege Club', 'imaginecup' => 'Imagine Cup'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                        
                    <!-- nama aktiviti -->
                    <div class="form-group{{ $errors->has('namaAktiviti') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Nama Aktiviti</label>
                        <div class="col-md-6">
                        {!! Form::text('namaAktiviti', null, array('placeholder' => 'Nama Aktiviti','class' => 'form-control')) !!}
                        </div>
                    </div>

                    <!-- tempat -->
                    <div class="form-group{{ $errors->has('tempat') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Tempat</label>
                       <div class="col-md-6">
                        {!! Form::text('tempat', null, array('placeholder' => 'Tempat','class' => 'form-control')) !!}
                        </div>
                    </div>

                    <!-- tarikh program -->
                    <div class="form-group{{ $errors->has('tarikhAktiviti') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Tarikh Program</label>
                        <div class="col-md-6">
                            <input class="form-control" name="tarikhAktiviti" type="date" placeholder="Masukkan tempat" rows="6"
                                      value="{{ old('tarikhAktiviti') }}" maxlength="100"></input>
                            <p class="text-muted"></p>
                            @if($errors->has('tarikhAktiviti'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tarikhAktiviti') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- peringkat -->

                    <div class="form-group{{ $errors->has('peringkat') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Peringkat</label>
                        <div class="col-md-6">
                            {{ Form::select('peringkat',
                           ['antarabangsa' => 'Antarabangsa', 'kebangsaan' => 'Kebangsaan', 'universiti' => 'Universiti', 'jabatan' => 'jabatan', 'Kolej' => 'Kolej', 'negeri' => 'Negeri', 'mahasiswa' => 'Mahasiswa', 'lain' => 'Lain-lain' ], null, ['class' => 'form-control']) }}       
                        </div>
                    </div>

                    <!-- pencapaian -->

                    <div class="form-group{{ $errors->has('pencapaian') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Pencapaian</label>
                        <div class="col-md-6">
                            {{ Form::select('pencapaian',
                           ['emas' => 'Emas', 'perak' => 'Perak', 'gangsa' => 'Gangsa', 'saguhati' => 'Saguhati', 'tiada' => 'Tiada'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <!-- jawatankuasa -->

                    <div class="form-group{{ $errors->has('pencapaian') ? ' has-error' : '' }}">
                        <label class="col-md-4 control-label">Jawatankuasa</label>
                        <div class="col-md-6">
                    {{ Form::select('jawatankuasa',
                           ['pengarah' => 'Pengarah', 'ketuaprogram' => 'Ketua Program', 'penolongketua' => 'Penolong Ketua Program', 'bendahari' => 'Bendahari', 'penolongbendahari' => 'Penolong Bendahari', 'setiausaha' => 'Setiausaha', 'ajkprogram' => 'AJK Program', 'ajkpublisiti' => 'AJK Publisiti', 'ajkmakanan' => 'AJK Makanan', 'ajklogistik' => 'AJK Logistik', 'ajkprotokol' => 'AJK Protokol', 'ajkpengangkutan' => 'AJK Pengangkutan', 'ajkkeselamatan' => 'AJK Keselamatan', 'peserta' => 'Peserta',  ], null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <!-- muat naik fail -->

                    <!-- <form action = "upload" id="upload" enctype="multipart/form-data">
                    <input type = "file" name = "file[]" multiple>
                    <br/>
                    </form>
                    <div id="message"></div>

                    <script type="text/javascript">
                        var form = document.getElementById('upload');
                        var request = new XMLHttpRequest();
                        form.addEventListener('submit,function(e)')
                        {
                            e.preventDefault();
                            var formdata = new FormData(form);
                            request.open('post','/upload');
                            request.addEventListener("load", transferComplete);
                            request.send(formdata);
                        };

                        function transferComplete(data)
                        {
                            response = JSON.parse(data.currentTarget.response);
                            if(response.success)
                            {
                                document.getElementById('message').innerHTML = "Successfully Uploaded Files!";

                            }
                        }
                    </script>

                     -->

                    <!-- muat naik fail -->
                    <!-- <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-6">
                            <input type = "file" name = "file[]" multiple>
                            <div id="message"></div>
                        </div>
                    </div>
      
                    <div class="form-group">
                        <div class="col-sm-offset-8 col-sm-14">
                            <button type="submit" class="btn btn-success" id="save-form">Hantar</button>
                        </div>
                    </div> -->

                    <!-- muat naik fail -->
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-sm-offset-2 col-sm-10">
                        {!! Form::file('images[]', array('multiple'=>true)) !!}
                            <p class="errors">{!!$errors->first('images')!!}</p>
                        @if(Session::has('error'))
                            <p class="errors">{!! Session::get('error') !!}</p>
                        @endif
                    </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <div class="col-sm-offset-6 col-sm-14">
                            <a href="{{ action('AktivitisController@index') }}" class="btn btn-default">Batal</a>
                            <button type="submit" class="btn btn-success">Hantar</button>
                        </div>
                    </div>
                    <!--End of Form-->
                    </form>
            </div>
        </div>
    </div>
</div>


<!-- <script type="text/javascript">
  
  document.addEventListener("DOMContentLoaded", function(event) { 
    var form = document.getElementById('save-form');
    var request = new XMLHttpRequest();
    form.addEventListener('submit,function(e)') {
        e.preventDefault();
        var formdata = new FormData(form);
        request.open('post','/upload');
        request.addEventListener("load", transferComplete);
        request.send(formdata);
    };

    function transferComplete(data) {
        response = JSON.parse(data.currentTarget.response);
        if(response.success) {
            document.getElementById('message').innerHTML = "Successfully Uploaded Files!";
        }
    }
 });
    
</script> -->
@endsection
@section('scripts')
<script src="{{ asset('js/jquery.matchHeight.js') }}"></script>
    <script>$('.box').matchHeight();</script>

@endsection