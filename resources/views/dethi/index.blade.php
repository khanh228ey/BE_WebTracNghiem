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
        <th scope="col">Thời gian làm bài</th>
        <th scope="col">Số lượng câu hỏi</th>
        <th scope="col">Môn học</th>
        <th scope="col">Người tạo</th>
        <th scope="col">Manager</th>
        {{-- <th scope="col">Manages</th> --}}
      </tr>
    </thead>
    <tbody>
        @foreach ($getDSDeThi as $key=>$dethi)
      <tr>
        <th scope="row">{{$dethi->id}}</th>
        <td>{{$dethi->tendethi}}</td>
        <td>{{$dethi->thoigianthi}} phút</td>
        <td>{{$dethi->soluongcauhoi}}</td>
        <td>{{$dethi->Monhoc->ten}}</td>
        <td>{{$dethi->User->name}}</td>
        <td>
            {{-- {!! Form::open(['method'=>'DELETE','route'=>['dethi.destroy',$dethi->id],'onsubmit'=>'return confirm("Xóa hay ko")'])!!}
                {!! Form::submit('Xóa',['class'=>'btn btn-danger'])!!}
            {!! Form::close()!!} --}}
            <a href="{{route('ketquatheodethi',$dethi->id)}}" class="btn btn-warning">Xem kết quả</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{-- </div>
    <a href="{{route('dethi.create')}}"><button class="btn btn-success">Thêm Môn học</button></a>
</div> --}}
</div>

@endsection
