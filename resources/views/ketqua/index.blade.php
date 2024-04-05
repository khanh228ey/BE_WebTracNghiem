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
        <th scope="col">Tên đề thi</th>
        <th scope="col">Tên sinh viên</th>
        <th scope="col">Số điểm</th>
        <th scope="col">Số đáp án đúng</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($ketQua as $key=>$ketqua)
      <tr>
        <th scope="row">{{$ketqua->id}}</th>
        <td>{{$ketqua->deThi->tendethi}}</td>
        <td>{{$ketqua->user->name}}</td>
        <td>{{$ketqua->sodiem}}</td>
        <td>{{$ketqua->socaudung}}/{{$ketqua->dethi->soluongcauhoi}}</td>
        {{-- <td>
            {!! Form::open(['method'=>'DELETE','route'=>['ketqua.destroy',$ketqua->id],'onsubmit'=>'return confirm("Xóa hay ko")'])!!}
                {!! Form::submit('Xóa',['class'=>'btn btn-danger'])!!}
            {!! Form::close()!!}
            <a href="{{route('ketqua.edit',$ketqua->id)}}" class="btn btn-warning">Sửa</a>
        </td> --}}
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{-- </div>
    <a href="{{route('ketqua.create')}}"><button class="btn btn-success">Thêm Môn học</button></a>
</div> --}}
</div>

@endsection
