@extends('Admin.layout.master')
@section('title')
    مدیریت | تماس با ما
@endsection
@section('content')
    <div class="row">

        <div class="col-lg-12">
            <section class="panel">

                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>وضعیت</th>
                            <th>تاریخ</th>

                            <th>عملیات</th>
                        </tr>
                        </thead>
                    <tbody>
                    @foreach($contact as $val)

                    <tr class="unread">
                        <td class="inbox-small-cells">
                            {{ $val->id }}
                        </td>
                        <td class="view-message dont-show">{{ $val->name }}</td>
                        <td class="view-message ">{{ $val->email }}</td>
                        <td class="view-message ">
                            @if($val->state=='1')  <span class="label label-success">تایید شده</span>
                            @else
                                <span class="label label-danger">در انتظار تایید </span>
                            @endif
                        </td>
                        <td class="view-message  text-right"><?php $v = verta($val->created_at);

                            echo $v->format('%d %B %Y');
                            ?></td>

                        <td>
                            <button class="btn btn-success btn-xs" title="نمایش" data-toggle="modal" href="#show{{ $val->id }}"><i class="icon-eye-open"></i></button>
                            <button class="btn btn-primary btn-xs" title="تایید" data-toggle="modal" href="#edit{{ $val->id }}"><i class="icon-hand-up"></i></button>
                            <button class="btn btn-danger btn-xs" title="حذف" data-toggle="modal" href="#delete{{ $val->id }}"><i class="icon-trash "></i></button>
                        </td>

                    </tr>


                    @endforeach
                    </tbody>
                </table>
                <span style="margin-right: 45%">{!! $contact->render() !!}</span>

                <!-- Modal show -->
                @foreach($contact as $val)
                    <div class="modal fade" id="show{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><span class="">نمایش پیام {{ $val->name }} </span></h4>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        {{ $val->msg }}
                                    </p>

                                    <hr>
                                    <span class="label label-default"><?php $v = verta($val->created_at);

                                        echo $v->format('%d %B %Y');
                                        ?></span>
                                    <span class="label label-primary">ایمیل : {{ $val->email }}</span>
                                    <span class="label label-success">آی پی : {{ $val->ip }}</span>
                                </div>



                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
            @endforeach
                    <!-- /.modal-dialog -->
        </div>
        <!-- /.modal show -->

        <!-- Modal edit -->
        @foreach($contact as $val)
            <div class="modal fade" id="edit{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">آیا میخواهید پیام {{$val->name}}  را تایید کنید ؟</h4>                            </div>
                        <div class="modal-body">

                            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{ route('contact.update' , $val->id) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="PATCH">
                                <div class="modal-body">
                                    <p>
                                        {{ str_limit($val->content,150) }}
                                    </p>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <input class="btn btn-danger" type="submit" value="تایید">

                                    </div>
                                </div>
                            </form>
                        </div>



                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
    @endforeach
            <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit -->

    <!-- Modal delete -->
    @foreach($contact as $val)
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
                        <form action="{{ route('contact.destroy' , $val->id) }}" method="POST">
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
