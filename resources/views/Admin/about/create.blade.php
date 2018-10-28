@extends('panel.layout.master')
@section('title')
    مدیریت | درباره ما
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   درباره ما | ایجاد کردن متن جدید

                </header>



                <div class="alert alert-success alert-block fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <h4>
                        <i class="icon-ok-sign"></i>
                       موفقیت آمیز!
                    </h4>
                    <p><a href="{{  Url('panel/about/') }}">نمایش</a> کامل کلیک کنید</p>
                </div>

                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>ناموفق!</strong>

                    </div>



                <div class="panel-body">
                    <div class=" form">
                        <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="/panel/about">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group ">
                                <label for="cname" class="control-label col-lg-2">عنوان </label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="cname" name="title" minlength="2" type="text" required />
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="cemail" class="control-label col-lg-2">متن درباره ما </label>
                                <div class="col-lg-10">
                                    <textarea name="content" class="form-control ckeditor"></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <input class="btn btn-danger" type="submit" value=" ذخیره">

                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </section>
        </div>
    </div>

@endsection