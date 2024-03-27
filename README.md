////////////////////  Api User:  method Post
Login :  http://127.0.0.1:8000/login 
dang kí : http://127.0.0.1:8000/register
dang xuất : http://127.0.0.1:8000/logout

/////Api Dethi 

danh sach đề thi : get http://127.0.0.1:8000/ds-de-thi
thong tin de thi :  get http://127.0.0.1:8000/de-thi/{id} truyền id đề thi
làm bài thi : get http://127.0.0.1:8000/chi-tiet-de-thi/{id} 
thêm đề thi : post http://127.0.0.1:8000/them-de-thi 
  truyền input tendethi string 
                thoigianthi int
                thoigianbatdau datetime 
                soluongcauhoi int
                monhoc_id combobox môn học
                câu hỏi input là 1 mảng
                string noidung[] , dap_an_a[] ,dap_an_b[],dap_an_c[] , dap_an_d[] , dap_an_dung[] ,


 xuat ra id cau hoi va dap an dung : http://127.0.0.1:8000/dap-an-dung/{id} id đề thi               


Api môn học CRUD MÔN HOC



http://127.0.0.1:8000/api/danh-sach-mon-hoc get
http://127.0.0.1:8000/api/them-mon-hoc post
http://127.0.0.1:8000/chi-tiet-mon-hoc/{id} get
http://127.0.0.1:8000/update-mon-hoc/{id} post
http://127.0.0.1:8000/xoa-mon=hoc/{id}; get




