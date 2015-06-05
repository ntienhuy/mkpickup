@extends('manage.manageApp')

@section('content')
    <div class="container">
        <div id="messageAdd" class="col-lg-8 col-lg-offset-2 message" >
            <div class="alert alert-success lert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Thành công!</strong> Tuyến mới đã được thêm.
            </div>


        </div>
        <div id="messageUpdate" class="col-lg-8 col-lg-offset-2 message">
            <div class="alert alert-success lert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Thành công!</strong> Đã cập nhật lại giá tuyến.
            </div>


        </div>
        <div id="messageDel" class="col-lg-8 col-lg-offset-2 message">
            <div class="alert alert-success lert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Thành công!</strong> Đã xóa thành công.
            </div>


        </div>
        <form id="routeForm">
        <div class="row"  style="border-bottom: 1px solid rgb(238, 238, 238)" >
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="tables">Bảng giá xe </h1>
                </div>

                <div class="bs-component">
                    <table class="table table-striped table-hover " id="routeTable">
                        <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Xuất phát</th>
                            <th>Điểm đến</th>
                            <th>Thời gian (ngày)</th>
                            <th>Quãng đường</th>
                            <th>Loại xe</th>
                            <th>Giá (1000 VND)</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($routes as $route )
                        <tr id="row_{{$route->routeId}}">
                            <td>{{$route->routeId}}</td>
                            <td>{{$route->nameFrm}}</td>
                            <td>{{$route->nameTo}}</td>
                            <td>@if(($route->duration % 24) <> 0) {{$route->duration + ' giờ'}} @else {{$route->duration /24}} @endif</td>
                            <td>{{$route->length}}</td>
                            <td>{{$route->name}}</td>
                            <td><input id="price_{{$route->routeId}}" style="width:100px" type="text" value="{{$route->price/1000}}" routeId="{{$route->routeId}}" data-validation="number" data-validation-error-msg="Vui lòng nhập vào dạng số"></td>
                            <td><input id="btnUpdate_{{$route->routeId}}" type="button" class="btn btn-default updatebtn" value="Cập nhật" routeId="{{$route->routeId}}"> <input type="button"  class="btn btn-default delbtn" value="Xóa" routeId="{{$route->routeId}}"></td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div style="display: none;" id="source-button" class="btn btn-primary btn-xs">&lt; &gt;</div></div><!-- /example -->
            </div>

        </div>
        </form>
        <div style="padding-top: 10px" >
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Thêm tuyến mới</h3>
                        </div>
                        <div class="panel-body">
                            <div class=" bs-component">
                                <form class="form-horizontal" id="addRouteForm">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="inputFrm" class="col-lg-2 control-label">Xuất phát</label>
                                            <div class="col-lg-10">
                                                <select class="js-from-location-single" id="locationFromSelect">
                                                    <option value="45">Hồ Chí Minh</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputTo" class="col-lg-2 control-label">Nơi đến</label>
                                            <div class="col-lg-10">
                                                <select class="js-to-location-single" data-validation="required">
                                                    <option></option>
                                                    @foreach($locations as $location)
                                                        <option value="{{$location->id}}">{{$location->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-lg-2 control-label">Thời gian</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="inputDuration" placeholder="Thời gian (giờ)" type="text" data-validation="number" data-validation-error-msg="Vui lòng nhập vào thời gian dạng số">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-lg-2 control-label">Quãng đường</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="inputLength" placeholder="Quãng đường (km)"  data-validation="number" type="text" data-validation-error-msg="Vui lòng nhập vào quãng đường dạng số">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-lg-2 control-label">Giá</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="inputPrice" placeholder="Nhập giá" type="text" data-validation="number" data-validation-error-msg="Vui lòng nhập vào giá dạng số">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Loại xe</label>
                                            <div class="col-lg-10">
                                                @foreach($carTypes as $carType)
                                                <div class="radio">
                                                    <label>
                                                        <input name="carTypesRadios" mytext="{{$carType->name}}" id="carTypesRadios{{$carType->id}}" value="{{$carType->id}}" checked="" type="radio">
                                                        {{$carType->name}}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-10 col-lg-offset-2">
                                                <button type="button" class="btn btn-primary" id="btnAdd">Thêm</button>
                                                <button type="reset" class="btn btn-default">Xóa trắng</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                                <div style="display: none;" id="source-button" class="btn btn-primary btn-xs">&lt; &gt;</div></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>





    <script>
        var isDurationValid = false;
        var isLengthValid = false;
        var isPriceValid = false;
        $.validate({
            form: '#addRouteForm',
            onElementValidate : function(valid, $el, $form, errorMess){
                console.log('Input1 ' +$el.attr('name')+ ' is ' + ( valid ? 'VALID':'NOT VALID') );
                console.log($el.attr('id'));
                switch($el.attr('id')){
                    case 'inputDuration': isDurationValid = valid; break;
                    case 'inputLength': isLengthValid = valid; break;
                    case 'inputPrice' : isPriceValid = valid; break;
                }
                console.log($(".js-to-location-single").select2('data')[0].id);
                if(isDurationValid && isLengthValid && isPriceValid &&  $(".js-to-location-single").select2('data')[0].id != "")
                    $('#btnAdd').prop('disabled', false);
                else
                    $('#btnAdd').prop('disabled', true);

            }
        });


        $.validate({
            form: '#routeForm',
            onElementValidate : function(valid, $el, $form, errorMess){
                console.log('Input2 ' +$el.attr('name')+ ' is ' + ( valid ? 'VALID':'NOT VALID') );
                if(valid)
                    $('#btnUpdate_'+$el.attr('routeId')).prop('disabled', false);
                else
                    $('#btnUpdate_'+$el.attr('routeId')).prop('disabled', true);
            }
        });


        $(document).ready(function() {
            $('#btnAdd').prop('disabled', true);
            $(".js-from-location-single").select2({
                placeholder: "Chọn địa điểm",
                language: "vi"
            });
            $(".js-to-location-single").select2({
                placeholder: "Chọn địa điểm",
                language: "vi"
            });

            $('.js-to-location-single').on("change", function (e) {
                if(isDurationValid && isLengthValid && isPriceValid &&  $(".js-to-location-single").select2('data')[0].id != "")
                    $('#btnAdd').prop('disabled', false);
                else
                    $('#btnAdd').prop('disabled', true);
            });

            /* Create an array with the values of all the input boxes in a column, parsed as numbers */
            $.fn.dataTable.ext.order['dom-text-numeric'] = function  ( settings, col )
            {
                return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
                    return $('input', td).val() * 1;
                } );
            }

            var dt = $('#routeTable').DataTable({
                "columns": [
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    { "orderDataType": "dom-text-numeric" },
                    null
                ],
                "language":{"sProcessing":   "Đang xử lý...",
                            "sLengthMenu":   "Xem _MENU_ mục",
                            "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                            "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                            "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
                            "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                            "sInfoPostFix":  "",
                            "sSearch":       "Tìm:",
                            "sUrl":          "",
                            "oPaginate": {
                                "sFirst":    "Đầu",
                                "sPrevious": "Trước",
                                "sNext":     "Tiếp",
                                "sLast":     "Cuối"}
                         },
                "search":{"caseInsensitive": true}
            });

            $('#routeTable tbody').on('click', '.delbtn', function () {
                console.log($('#row_'+routeId));
                var routeId = $(this).attr("routeId");
                $.ajax({
                    url: "{{action('Manage\ManageController@del')}}",
                    data:{ routeId :$(this).attr("routeId"),
                          _token:"{{ csrf_token() }}"},

                    type:"POST",
                    success: function(result) {
                        console.log($(this));
                        dt.row($('#row_'+routeId)).remove().draw();
                        $("#messageDel").fadeIn();
                        $("#messageDel").delay(5000).fadeOut();
                    },

                    error: function(result) {
                        alert("Có lỗi xảy ra");
                    }

                });
            } );

            $('#routeTable tbody').on('click', '.updatebtn', function () {
                var routeId = $(this).attr("routeId");
                console.log($('#row_'+routeId));
                var price = $('#price_'+routeId).val()*1000;
                console.log(price);
                $.ajax({
                    url: "{{action('Manage\ManageController@update')}}",
                    data:{ routeId :$(this).attr("routeId"),
                           price: price,
                        _token:"{{ csrf_token() }}"},
                    type:"POST",
                    success: function(result) {
                        console.log($(this));
                        $("#messageUpdate").fadeIn();
                        $("#messageUpdate").delay(5000).fadeOut();
                    },
                    error: function(result) {
                        alert("Có lỗi xảy ra");
                    }

                });
            } );

            $("#btnAdd").click(function() {
                var fromLocation =  $(".js-from-location-single").select2('data')[0];
                var toLocation =  $(".js-to-location-single").select2('data')[0];
                var duration = $("#inputDuration").val();
                var length = $("#inputLength").val();
                var price = $("#inputPrice").val()*1000;
                var carType = $('input:radio[name=carTypesRadios]:checked').val();


                $.ajax({
                    url: "{{action('Manage\ManageController@add')}}",
                    data:{ idLocationFrm :fromLocation.id
                        ,nameFrm:fromLocation.text
                        ,idLocationTo: toLocation.id
                        ,nameTo: toLocation.text
                        ,duration:duration
                        ,length:length
                        ,price:price
                        ,carType:carType
                        ,_token:"{{ csrf_token() }}"},

                    type:"POST",
                    success: function(result) {
                        console.log(result);
                        dt.row.add({
                            "0":result.id,
                            "1":result.nameFrm,
                            "2":result.nameTo,
                            "3":result.duration/24,
                            "4":result.length,
                            "5":$('input:radio[name=carTypesRadios]:checked').attr('mytext'),
                            "6":'<input id="price_' + result.id+ '" style="width:100px" type="text" value="'+result.price/1000+'" routeId="'+result.id+'" data-validation="number" data-validation-error-msg="Vui lòng nhập vào dạng số" >',
                            "7":'<input id="btnUpdate_' + result.id + '" type="button" class="btn btn-default updatebtn" value="Cập nhật" routeId="' + result.id + '"> <input type="button" class="btn btn-default delbtn"  value="Xóa" routeId="' + result.id + '">'
                        }).draw();
                        $("#routeTable tr:last").attr('id','row_'+result.id);
                        $("#messageAdd").fadeIn();
                        $("#messageAdd").delay(5000).fadeOut();
                    },

                    error: function(result) {
                        alert("Có lỗi xảy ra");
                    }

                });

            });


        });
    </script>
@endsection
