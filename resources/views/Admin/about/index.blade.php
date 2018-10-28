@extends('panel.layout.master')
@section('title')
   مدیریت | درباره ما
    @endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
درباره ما | نمایش محتوای صفحه درباره ما

                    <a class="btn btn-success" href="{{Url('panel/about/create')}}">افزودن متن جدید</a>

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
                            <th>عنوان</th>
                            <th>محتوا</th>

                            <th>عملیات</th>
                        </tr>
                        </thead>

                        <tbody>
               @foreach($about as $val)
                   <tr>
                       <td>{{ $val->id }}</td>
                       <td>{{ str_limit($val->title,70) }}</td>
                       <td><p>{{  str_limit($val->content,100) }}</p></td>
                       <td>
                           <button class="btn btn-success btn-xs" title="نمایش" data-toggle="modal" href="#show{{ $val->id }}"><i class="icon-eye-open"></i></button>
                           <button class="btn btn-primary btn-xs" title="ویرایش" data-toggle="modal" href="#edit{{ $val->id }}"><i class="icon-pencil"></i></button>
                           <button class="btn btn-danger btn-xs" title="حذف" data-toggle="modal" href="#delete{{ $val->id }}"><i class="icon-trash "></i></button>
                       </td>
                   </tr>
                   @endforeach
                        </tbody>

                    </table>



                        <!-- Modal show -->
                    @foreach($about as $val)
                        <div class="modal fade" id="show{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"><span class="alert-danger">نمایش محتوا {{ $val->id }} با عنوان : </span><br>{{$val->title}}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            {{ $val->content }}
                                        </p>
                                    </div>



                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal show -->
                     @endforeach

                <!-- Modal edit -->
                @foreach($about as $val)
                <div class="modal fade" id="edit{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">ویرایش محتوا {{ $val->id }} با عنوان : {{$val->title}}</h4>                            </div>
                            <div class="modal-body">

                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="/panel/about/{{$val->id}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="PATCH">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">عنوان </label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" value="{{ $val->title }}" id="cname" name="title" minlength="2" type="text" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">متن درباره ما </label>
                                        <div class="col-lg-10">
                                            <textarea name="content" class="form- ckeditor">{{ $val->content }}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <input class="btn btn-danger" type="submit" value="ثبت ویرایش">

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
        @foreach($about as $val)
        <div class="modal fade" id="delete{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">حذف محتوا {{ $val->id }} با عنوان : {{$val->title}}</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            {{ str_limit($val->content,150) }}
                        </p>
                    </div>
                    <div class="modal-footer">
                    <form action="<?= Url('/panel/about/'.$val->id); ?>" method="POST">
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