@extends('panel.layout.master')
@section('title')
    مدیریت | دسته ها
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    دسته بندی ها

                    <button type="button" class="btn btn-success" data-toggle="modal" href="#insert">افزودن دسته جدید</button>

                    <!-- Modal insert -->

                    <div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">افزودن دسته جدید</h4>
                                </div>
                                <div class="modal-body">

                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="/panel/category/" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">نام </label>
                                            <div class="col-lg-10">
                                                <input class=" form-control"  id="cname" name="name" minlength="2" type="text" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">زیر دسته </label>
                                            <div class="col-lg-10">
                                                <select name="subcat" class="control-label col-lg-4">
                                                    <option value="0">دسته مادر</option>
                                                    @foreach($cat as $val)
                                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">مرتب سازی </label>
                                            <div class="col-lg-10">
                                                <input class=" form-control"  id="cname" name="sorting"  type="number"  />
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">تصویر</label>
                                            <div class="col-lg-10">
                                                <input class=" form-control"  id="cname" name="img" minlength="2" type="file"  />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <input class="btn btn-danger" type="submit" value="درج دسته">

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
        @include('errors.errors')


        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام</th>
                    <th>زیردسته</th>
                    <th>تصویر</th>

                    <th>عملیات</th>
                </tr>
                </thead>

                <tbody>
                @foreach($cat as $val)
                    <tr>
                        <td>{{ $val->id }}</td>
                        <td>{{ $val->name }}</td>
                        <td>{{  cat($val->subcat) }}</td>
                        <td>@if($val->img!="")<img src="{{  Url('upload/cat/')."/".$val->img }}"height="80" width="150"> @else بدون تصویر @endif</td>
                        <td>
                            <button class="btn btn-primary btn-xs" title="ویرایش" data-toggle="modal" href="#edit{{ $val->id }}"><i class="icon-pencil"></i></button>
                            <button class="btn btn-danger btn-xs" title="حذف" data-toggle="modal" href="#delete{{ $val->id }}"><i class="icon-trash "></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            <span style="margin-right: 45%">{!! $cat->render() !!}</span>



            <!-- Modal edit -->
            @foreach($cat as $val)
                <div class="modal fade" id="edit{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">ویرایش دسته {{ $val->id }} با نام : {{$val->name}}</h4>                            </div>
                            <div class="modal-body">

                                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="/panel/category/{{$val->id}}" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="PATCH">

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">نام </label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" value="{{$val->name}}"  id="cname" name="name" minlength="2" type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">مرتب سازی </label>
                                        <div class="col-lg-10">
                                            <input class=" form-control"  id="cname" name="sorting"  type="number" value="{{ $val->sorting }}"  />
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">تصویر</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control"  id="cname" name="img" minlength="2" type="file"  />
                                        </div>
                                    </div>
                                    @if($val->img!="")<img src="{{  Url('upload/cat/')."/".$val->img }}"height="150" width="200">   @endif

                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">زیر دسته </label>
                                        <div class="col-lg-10">
                                            <select name="subcat" class="control-label col-lg-4">
                                                <option value="0">دسته مادر</option>
                                                @foreach($cat as $val)
                                                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                @endforeach

                                            </select>
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
        @foreach($cat as $val)
            <div class="modal fade" id="delete{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">برای حذف دسته {{ $val->name }} مطمِئن هستید؟</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                {{ str_limit($val->content,150) }}
                            </p>
                        </div>
                        <div class="modal-footer">
                            <form action="<?= Url('/panel/category/'.$val->id); ?>" method="POST">
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
<?php
use App\Category;
function cat($id)
{
    if ( $id == '0' )
    {
        return 'دسته مادر';
    }
    else
    {
        $category=Category::where('id',$id)->first()['name'];
        return $category;
    }
}
?>