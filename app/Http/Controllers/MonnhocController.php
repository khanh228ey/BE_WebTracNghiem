<?php

namespace App\Http\Controllers;

use App\Models\Dethi;
use App\Models\Monhoc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class MonnhocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Monhoc::orderBy('id','ASC')->GET();
        return view('monhoc.index',compact('list'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('monhoc.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $monhoc = new Monhoc();
        $monhoc->ten = $data['ten'];
        $monhoc->save();
        $list = monhoc::orderBy('created_at','ASC')->get();
        Toastr::success('Thêm môn học thành công', 'Success');
        return view('monhoc.index',compact('list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $monhoc =Monhoc::find($id);
        return view('monhoc.form',compact('monhoc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $monhoc = monhoc::find($id);
        $monhoc->ten =$data['ten'];
        $monhoc->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $monhoc->save();
        $list= monhoc::orderBy('updated_at','DESC')->get();
        Toastr::success('Cập nhật thông tin thành công', 'Success');
        return view('monhoc.index',compact('list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $list = Monhoc::all();
        $isUsedInMonHoc = Dethi::where('monhoc_id', $id)->exists();

        if ($isUsedInMonHoc) {
        toastr()->error('Không thể xóa', 'Môn hoc đang được sử dụng trong bảng Đề thi');
        return view('monhoc.index',compact('list'));
    }
        Monhoc::find($id)->delete();
        toastr()->success('Xóa','Xoá môn học thành công');
        return view('monhoc.index',compact('list'));
    }
}
