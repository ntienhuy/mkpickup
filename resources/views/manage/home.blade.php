@extends('manage.manageApp')

@section('content')
    <div class="container">
        <div class="row"  style="border-bottom: 1px solid rgb(238, 238, 238)" >
            <div class="col-lg-12">
                <div class="page-header">
                    <h1 id="tables">Bảng giá xe </h1>
                </div>

                <div class="bs-component">
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Xuất phát</th>
                            <th>Điểm đến</th>
                            <th>Thời gian</th>
                            <th>Quãng đường</th>
                            <th>Loại xe</th>
                            <th>Giá (1000 VND)</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($routes as $route )
                        <tr>
                            <td>{{$route->id}}</td>
                            <td>{{$route->nameFrm}}</td>
                            <td>{{$route->nameTo}}</td>
                            <td>{{$route->duration}}</td>
                            <td>{{$route->length}}</td>
                            <td>{{$route->name}}</td>
                            <td><input id="{{$route->id}}" style="width:100px" type="text" value="{{$route->price/1000}}"></td>
                            <td><input type="button" value="Update"> <input type="button" value="Del"></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="display: none;" id="source-button" class="btn btn-primary btn-xs">&lt; &gt;</div></div><!-- /example -->
            </div>

        </div>
        <div style="padding-top: 10px" >
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Thêm tuyến mới</h3>
                        </div>
                        <div class="panel-body">
                            <div class=" bs-component">
                                <form class="form-horizontal">
                                    <fieldset>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="inputEmail" placeholder="Email" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" id="inputPassword" placeholder="Password" type="password">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Checkbox
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="textArea" class="col-lg-2 control-label">Textarea</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" rows="3" id="textArea"></textarea>
                                                <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Radios</label>
                                            <div class="col-lg-10">
                                                <div class="radio">
                                                    <label>
                                                        <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                                                        Option one is this
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
                                                        Option two can be something else
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="select" class="col-lg-2 control-label">Selects</label>
                                            <div class="col-lg-10">
                                                <select class="form-control" id="select">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                                <br>
                                                <select multiple="" class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-10 col-lg-offset-2">
                                                <button type="reset" class="btn btn-default">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection
