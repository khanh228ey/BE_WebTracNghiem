@extends('app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($monhoc))
                        {!! Form::open(['route'=>'monhoc.store','method'=>'POST'])!!}
                    @else
                         {!! Form::open(['route'=>['monhoc.update',$monhoc->id],'method'=>'PUT'])!!}
                    @endif
                 <div class="form-group">
                    {!! Form::label('ten','Tên môn học',[])!!}
                    {!! Form::text('ten',isset($monhoc) ? $monhoc->ten:'',['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()','required' => 'required'])!!}
                 </div>
                 @if (!isset($monhoc))
                     {!! Form::submit('Thêm dữ liệu',['class'=>'btn btn-success'])!!}
                 @else
                     {!! Form::submit('Cập nhật',['class'=>'btn btn-success'])!!}
                 @endif
                 {!! Form::close('')!!}
                </div>
            </div>
       </div>
    </div>
</div>
@endsection
<form action="">
    
</form>