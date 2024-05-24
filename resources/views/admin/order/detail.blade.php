@extends('master.admin')
@section('title', 'Chi tiết đơn hàng')
@section('main')

 <div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Chi tiết đơn hàng : {{$OrdID}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <table>
            <thead>
                <tr>
                    <td>Mã Đơn Hàng:</td>      
                    <td>{{$OrdID}}</td>            
                </tr>
                <tr>
                    <td>Mã Khách Hàng:</td>      
                    <td>{{$CusID}}</td>            
                </tr>
                <tr>
                    <td>Mã Nhân Viên:</td>      
                    <td>{{$EmpID}}</td>            
                </tr>
                <tr>
                    <td>Tên Khách Hàng:</td>      
                    <td>{{$Name}}</td>            
                </tr>
                <tr>
                    <td>Ngày Đặt Hàng:</td>      
                    <td>{{$OrderDate}}</td>            
                </tr>
                <tr>
                    <td>Trạng Thái:</td>      
                    <td>{{$Status}}</td>            
                </tr>
                <tr>
                    <td>Địa Chỉ:</td>      
                    <td>{{$Address}}</td>            
                </tr>
                <tr>
                    <td>Số Điện Thoại:</td>      
                    <td>{{$Phone}}</td>            
                </tr>
                <tr>
                    <td>Tổng Tiền:</td>      
                    <td>{{ number_format($MoneyTotal) }} VND</td>            
                </tr>
                <tr>
                    <td>Ghi Chú:</td>      
                    <td>{{$Note}}</td>            
                </tr>
                <tr>
                    <td>Email:</td>      
                    <td>{{$Email}}</td>            
                </tr>
                <tr>
                    <td>Phương Thức Thanh Toán:</td>      
                    <td>{{$Payment}}</td>            
                </tr>
                <tr>
                    <td>Ngày Tạo:</td>      
                    <td>{{$created_at}}</td>            
                </tr>
                <tr>
                    <td>Ngày Cập Nhật:</td>      
                    <td>{{$updated_at}}</td>            
                </tr>         
            </thead> 
        </table>            
    </div>
</div>
@endsection
