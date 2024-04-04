@extends('app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              <br>
<br>
<br>
<br>
<table class="table" id="tablephim">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tên môn học</th>
        <th scope="col">Manages</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($list as $key=>$monhoc)
      <tr>
        <th scope="row">{{$monhoc->id}}</th>
        <td>{{$monhoc->ten}}</td>
        <td>
            {!! Form::open(['method'=>'DELETE','route'=>['monhoc.destroy',$monhoc->id],'onsubmit'=>'return confirm("Xóa hay ko")'])!!}
                {!! Form::submit('Xóa',['class'=>'btn btn-danger'])!!}
            {!! Form::close()!!}
            <a href="{{route('monhoc.edit',$monhoc->id)}}" class="btn btn-warning">Sửa</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
    <a href="{{route('monhoc.create')}}"><button class="btn btn-success">Thêm Môn học</button></a>
</div>
</div>

@endsection
