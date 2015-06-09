@extends('app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h3><i class="fa fa-bus"></i> Tra cứu tuyến</h3>
            <form class="form-inline" action="" method="get">
                <div class="form-group inline-form-group">
                    <label for="inputFrm" class="control-label">Xuất phát</label>
                    <select class="js-from-location-single" id="locationFromSelect" name="locationFrom">
                        <option value="45">Hồ Chí Minh</option>
                    </select>
                </div>
                <div class="form-group inline-form-group">
                    <label for="inputTo" class="control-label">Nơi đến</label>
                    <select class="js-to-location-single" name="locationTo">
                        <option></option>
                        @foreach($locations as $location)
                            <option value="{{$location->id}}">{{$location->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group inline-form-group">
                    <label for="inputDate" class="control-label">Ngày đi</label>
                    <input type="text" id="datepicker" name="date">
                </div>
                <button type="submit" class="btn btn-warning">Tra cứu</button>
            </form>
        </div>
        <form id="routeForm">
            <div class="row"  style="border-bottom: 1px solid rgb(238, 238, 238)" >
                <div class="col-lg-12">
                    <div class="page-header">

                        @if(isset($fromLocation) && isset($toLocation))
                            <h1 id="tables">
                                <span class="my-route"> {{$fromLocation}} <i class="fa fa-arrows-h my-arrow"></i> {{$toLocation }}</span>
                                 <span class="my-date">- Ngày {{$date}}</span>
                            </h1>
                        @else
                            <h1 id="tables">Thông tin tuyến</h1>
                        @endforelse

                    </div>
                    <div class="bs-component">
                        <table class="table table-striped table-hover " id="routeTable">
                            <thead>
                            <tr>
                                <th>Xuất phát</th>
                                <th>Điểm đến</th>
                                <th>Thời gian (ngày)</th>
                                <th>Quãng đường</th>
                                <th>Loại xe</th>
                                <th>Giá</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($routes))
                                @foreach($routes as $route )
                                    <tr id="row_{{$route->routeId}}">
                                        <td style="text-align: right; padding-right:0px">{{$route->nameFrm}}<i class="fa fa-long-arrow-right my-arrow"></i></td>
                                        <td style="padding-left:0px"><i class="fa fa-long-arrow-right my-arrow"></i>{{$route->nameTo}}</td>
                                        <td>@if(($route->duration % 24) <> 0) {{$route->duration + ' giờ'}} @else {{$route->duration /24}} @endif</td>
                                        <td>{{$route->length}}</td>
                                        <td>{{$route->name}}</td>
                                        <td class="my-price">{{number_format($route->price)}} đ</td>
                                        <td><input id="btnBook_{{$route->routeId}}" type="button" class="btn btn-warning btn-xs bookbtn" value="Đặt xe" routeId="{{$route->routeId}}"></td>
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



            /* Create an array with the values of all the input boxes in a column, parsed as numbers */
            $.fn.dataTable.ext.order['dom-text-numeric'] = function  ( settings, col )
            {
                return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
                    return $('input', td).val() * 1;
                } );
            }

            var dt = $('#routeTable').DataTable({
                "order": [],
                "columns": [
                    {"width": "10%", targets: 'no-sort', orderable: false },
                    { targets: 'no-sort', orderable: false },
                    {"width": "15%" ,targets: 'no-sort', orderable: false },
                    {"width": "15%",targets: 'no-sort', orderable: false  },
                    { targets: 'no-sort', orderable: false },
                    null,
                    { targets: 'no-sort', orderable: false }
                ],

                "language":{"sProcessing":   "Đang xử lý...",
                    "sLengthMenu":   "Xem _MENU_ mục",
                    "sZeroRecords":  "Không tìm thấy tuyến nào phù hợp",
                    "sInfo":         "",
                    "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
                    "sInfoFiltered": "",
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

            $('#routeTable tbody').on('click', '.bookbtn', function () {

                alert("Dang cap nhat")

            });
        });
    </script>
@endsection
