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
                    @if (!isset($category))
                        {!! Form::open(['route'=>'category.store','method'=>'POST'])!!}
                    @else
                         {!! Form::open(['route'=>['category.update',$category->id],'method'=>'PUT'])!!}
                    @endif
                 <div class="form-group">
                    {!! Form::label('title','Title',[])!!}
                    {!! Form::text('title',isset($category) ? $category->title:'',['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()','required' => 'required'])!!}
                 </div>
                 <div class="form-group">
                    {!! Form::label('slug','Slug',[])!!}
                    {!! Form::text('slug',isset($category) ? $category->slug:'',['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'convert_slug','required' => 'required'])!!}
                 </div>
                 <div class="form-group">
                    {!! Form::label('description','Description',[])!!}
                    {!! Form::textarea('description',isset($category) ? $category->description:'',['style'=>'resize:none','class'=>'form-control','placeholder'=>'Nhập vào mô tả...','id'=>'description','required' => 'required'])!!}
                 </div>
                 <div class="form-group">
                    {!! Form::label('ative','Active',[])!!}
                    {!! Form::select('status',['1'=>'Hiển thị','0'=>'Không'],isset($category)? $category->status:'',['class'=>'form-control'])!!}
                 </div>
                 @if (!isset($category))
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