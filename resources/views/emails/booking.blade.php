Gửi anh/chị {{$data["name"]}} <br>
<br>
Thông tin đặt xe: <br>
+ Chuyến: {{$data["nameFrm"]}} đến {{$data["nameTo"]}} <br>
+ Ngày: {{$data["date"]}} <br>
+ Loại xe:  @foreach($data["routeArray"] as $route)
                {{$route->carTypeName}} - {{$route->value}} xe.
            @endforeach
            <br>
+ Tổng tiền: <b>{{ $data["total"] }}</b>

<br>
<br>
Bản quyền © 2015 thuộc về MKPickup.com <br>
Địa chỉ: 1 Hồ Tùng Mậu - Lầu 63 tòa nhà Bitexco | Liên hệ: 0933221412
