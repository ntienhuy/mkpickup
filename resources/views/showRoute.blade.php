@extends('app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h3>Tim tuyen</h3>
            <form>
                <label for="inputFrm" class="control-label">Xuất phát</label>
                <select class="js-from-location-single" id="locationFromSelect">
                    <option value="45">Hồ Chí Minh</option>
                </select>
                <label for="inputTo" class="control-label">Nơi đến</label>
                <select class="js-to-location-single">
                    <option></option>
                    @foreach($locations as $location)
                        <option value="{{$location->id}}">{{$location->name}}</option>
                    @endforeach
                </select>
                 <input type="text" id="datepicker">
            </form>
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
                            @if(isset($routes))
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
                            @endif

                            </tbody>
                        </table>
                        <div style="display: none;" id="source-button" class="btn btn-primary btn-xs">&lt; &gt;</div></div><!-- /example -->
                </div>

            </div>
        </form>
    </div>





    <script>


        $(document).ready(function() {
            $(function() {
                $( "#datepicker" ).datepicker();
            });

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
                    "sZeroRecords":  "Không tìm thấy tuyến nào phù hợp",
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
                "search":{"caseInsensitive": true},
                "lengthChange": false,
                "bFilter" : false
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
        });
    </script>
@endsection
