@extends('app')

@section('content')
    <div class="container">

        <form class="form-horizontal" id="addRouteForm" method="POST">
            <div class="row"  style="border-bottom: 1px solid rgb(238, 238, 238)" >
                <div class="col-lg-4">
                    <div class="page-header">
                        <h1 id="tables">
                            Thông tin đặt chuyến:
                        </h1>
                        <ul class="list-group">
                            <li class="list-group-item"><b>Chuyến:</b>  {{$bookRoute->nameFrm}} <i class="fa fa-arrows-h my-arrow"></i> {{$bookRoute->nameTo}}</li>
                            <li class="list-group-item"><b>Ngày:</b> {{$date}}</li>
                            <li class="list-group-item"><b>Số ngày:</b> {{$bookRoute->duration/24}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lg-offset-1" style="padding-top: 70px">
                    <blockquote>
                        <ul class="my-note">
                            <li>Phụ thu cho xe 4-7 chỗ lầ 300,000đ/ngày </li>
                            <li>Phụ thu cho xe 4-7 chỗ lầ 300,000đ/ngày</li>
                        </ul>
                    </blockquote>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Thông tin đặt xe</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover " id="routeTable">
                                <thead>
                                <tr>
                                    <th>Loại xe</th>
                                    <th>Giá</th>
                                    <th width="40%">Số lượng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($routes))
                                    @foreach($routes as $route )
                                        <tr id="row_{{$route->routeId}}">
                                            <td>{{$route->name}}</td>
                                            <td class="my-price" id="price_{{$route->routeId}}" value="{{$route->price}}" >{{number_format($route->price)}} đ</td>

                                            <td>
                                                @if($route->routeId == $bookRoute->id)
                                                    <input type="number" name="carNumber_{{$route->routeId}}" min="0" max="10" step="1" value="1" style="width:70px">
                                                @else
                                                    <input type="number" name="carNumber_{{$route->routeId}}" min="0" max="10" step="1" value="0" style="width:70px">
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                                <tr>
                                    <td></td>
                                    <td>Thành tiền</td>
                                    <td id="totalPrice" value="{{$bookRoute->price}}" >{{number_format($bookRoute->price)}} đ</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-lg-2" style="padding-left: 30px; padding-right: 0px">
                                    <span style="font-weight: bold">Ghi chú</span>
                                </div>
                                <div class="col-lg-10">
                                    <textarea name="note" row="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Thông tin khách hàng</h3>
                        </div>
                        <div class="panel-body">
                            <div class=" bs-component">
                                <fieldset>
                                    <div class="form-group">
                                        <label for="inputName" class="col-lg-3 control-label">Họ tên</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="name" id="inputName" placeholder="" type="text"  data-validation-error-msg="Vui lòng nhập vào họ tên">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-lg-3 control-label">Điện thoại</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="phone" id="inputPhone" placeholder="" type="text" data-validation="number" data-validation-error-msg="Vui lòng nhập vào số điện thoại">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 control-label">Email</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="email" id="inputEmail" placeholder=""  data-validation="number" type="text" data-validation-error-msg="Vui lòng nhập vào email">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress" class="col-lg-3 control-label">Địa chỉ</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" name="address" id="inputAddress" placeholder="" type="text"  data-validation-error-msg="Vui lòng nhập vào địa chỉ">

                                        </div>
                                    </div>

                                </fieldset>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" value="{{ $date }}" name="date">
            <button type="submit" class="btn btn-warning">Tra cứu</button>
    </form>
    </div>

    <script>


        $(document).ready(function() {
            $("input[name^='carNumber_']").change(function() {
                var id =  $(this).attr("name").replace("carNumber_","");
                var price = $("#price_"+id).attr("value");
                var amount = $(this).val();
                var totalPrice = 0;



                $("input[name^='carNumber_']").each(function( index ) {
                    var id =  $(this).attr("name").replace("carNumber_","");
                    var price = $("#price_"+id).attr("value");
                    var amount = $(this).val();
                    totalPrice += amount * price;
                });

                $("#totalPrice").attr("value",totalPrice);
                $("#totalPrice").text( $.number(totalPrice) + " đ");

            });
        });
    </script>
@endsection
