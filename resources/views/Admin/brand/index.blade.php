@extends('Admin.layout.master')
@section('title')
    مدیریت | برندها
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    منوها

                    <button type="button" class="btn btn-success" data-toggle="modal" href="#insert">افزودن برند جدید
                    </button>

                    <!-- Modal insert -->

                    <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title">افزودن برند جدید</h4>
                                </div>
                                <div class="modal-body">

                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post"
                                          action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group ">
                                            <label for="name_fa" class="control-label col-lg-2">نام فارسی </label>
                                            <div class="col-lg-10">
                                                <input class=" form-control" id="name_fa" name="name_fa" minlength="2"
                                                       type="text"/>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="name_en" class="control-label col-lg-2">نام لاتین </label>
                                            <div class="col-lg-10">
                                                <input class=" form-control" id="name_en" name="name_en" minlength="2"
                                                       type="text"/>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="content" class="control-label col-lg-2">محتوا</label>
                                            <div class="col-lg-10">
                                                <input class=" form-control" id="content" name="content" minlength="2"
                                                       type="text" required/>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="subCat" class="control-label col-lg-2">زیر دسته</label>
                                            <div class="col-lg-10">
                                                <select name="subCat" class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="pic" class="control-label col-lg-2">تصویر</label>
                                            <div class="col-lg-10">
                                                <input class=" form-control"  id="pic" name="pic" minlength="2" type="file"  />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <input class="btn btn-danger" type="submit" value="درج منو">

                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->

                    <!-- /.modal insert -->
                </header>


                @if(Session::has('success'))
                    <div class="alert alert-success alert-block fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <h4>
                            <i class="icon-ok-sign"></i>
                            موفقیت آمیز!
                        </h4>
                        <p>{{ Session::get('success')  }} </p>
                    </div>
                @elseif(Session::has('unsuccess'))
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>ناموفق!</strong> {{ Session::get('unsuccess')  }}

                    </div>
                @endif


                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام فارسی</th>
                            <th>نام لاتین</th>
                            <th>محتوا</th>
                            <th>زیردسته</th>
                            <th>تصویر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($brand as $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                                <td>{{ $val->name_fa }}</td>
                                <td>{{ $val->name_en }}</td>
                                <td>{{ $val->content }}</td>
                                <td>
                                    <img class="img-responsive" src="{{ asset('upload/brand/'.$val->pic) }}" width="50">
                                </td>
                                <td>{{ $val->subCat }}</td>
                                <td>
                                    <button class="btn btn-primary btn-xs" title="ویرایش" data-toggle="modal"
                                            href="#edit{{ $val->id }}"><i class="icon-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs" title="حذف" data-toggle="modal"
                                            href="#delete{{ $val->id }}"><i class="icon-trash "></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                    <span style="margin-right: 45%">{!! $brand->render() !!}</span>


                    <!-- Modal edit -->
                    @foreach($brand as $val)
                        <div class="modal fade" id="edit{{ $val->id }}" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="modal-title">ویرایش برند {{ $val->id }} با نام : {{$val->name}}</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post"
                                              action="{{ route('brand.update' , $val->id) }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="PATCH">

                                            <div class="form-group ">
                                                <label for="name_fa" class="control-label col-lg-2">نام فارسی </label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="name_fa" name="name_fa" value="{{ $val->name_fa }}" minlength="2"
                                                           type="text"/>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="name_en" class="control-label col-lg-2">نام لاتین </label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="name_en" value="{{ $val->name_en }}" name="name_en" minlength="2"
                                                           type="text"/>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="content" class="control-label col-lg-2">محتوا</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="content" value="{{ $val->content }}" name="content" minlength="2"
                                                           type="text" required/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <input class="btn btn-danger" type="submit" value="ویرایش">

                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                </div>
                <!-- /.modal edit -->
                @endforeach


            <!-- Modal delete -->
                @foreach($brand as $val)
                    <div class="modal fade" id="delete{{ $val->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title">برای حذف برند {{ $val->name_fa }} مطمِئن هستید؟</h4>
                                </div>
                                <div class="modal-body">
                                    <p>

                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('brand.destroy' , $val->id) }}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="submit" name="btndelete" value="حذف کردن" class="btn btn-danger">
                                    </form>
                                    <br>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
                                </div>


                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
        </div>
        <!-- /.modal delete -->
        @endforeach
    </div>

    </section>
    </div>
    </div>

@endsection
