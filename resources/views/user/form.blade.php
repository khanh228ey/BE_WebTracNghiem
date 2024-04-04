@extends('app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <br>
                <br>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($user))
                        {!! Form::open(['route'=>'storeUser','method'=>'POST'])!!}
                    @else
                         {!! Form::open(['route'=>['updateUser',$user->id],'method'=>'POST'])!!}
                    @endif
                 <div class="form-group">
                    {!! Form::label('name','Họ tên',[])!!}
                    {!! Form::text('name',isset($user) ? $user->name:'',['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...',])!!}
                 </div>
                 <div class="form-group">
                    {!! Form::label('email','Email',[])!!}
                    {!! Form::text('email',isset($user) ? $user->email:'',['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'])!!}
                 </div>
                 @if (!isset($user))
                <div class="form-group">
                    {!! Form::label('password', 'Mật khẩu', []) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('confirm_password', 'Nhập lại mật khẩu', []) !!}
                    {!! Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...']) !!}
                </div>
                @endif
                 <div class="form-group">
                    {!! Form::label('vaitro','Vai trò',[])!!}
                    {!! Form::select('vaitro',['1'=>'Giáo Viên','2'=>'Sinh Viên'],isset($user)? $user->vaitro:'',['class'=>'form-control'])!!}
                 </div>
                 @if (!isset($user))
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
