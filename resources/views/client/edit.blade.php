@extends('layout', ['current_menu' => 'client'])
@section('Title', 'Client List')
@section('content')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>المشتركين</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">تعديل معلومات المشترك </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @if($status =='success')
                                        <div class="alert alert-success">
                                            <h4 class="alert-heading">تمت العملية بنجاح</h4>
                                            <p>{{ $message }}</p>
                                        </div>
                                        @elseif($status =='error')
                                        <div class="alert alert-danger">
                                            <h4 class="alert-heading">هناك عطب ما</h4>
                                            <p>{{ $message }}</p>
                                        </div>
                                        @endif
                                        <form action="{{ route('client.update')}}" method="post">
                                        @csrf
                                          <input type="hidden" name="id" value="{{ $client->id }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">رقم البطاقة البطاقة</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <input type="text" class="form-control" name="cin" value="{{ $client->cin }}" placeholder="رقم البطاقة البطاقة">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">اسم المشرك</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <input type="text" class="form-control" name="name" value="{{ $client->name }}" placeholder="اسم المشرك ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">رقم الهاتف</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <input type="text"  class="form-control" name="phone" value="{{ $client->phone }}" placeholder="رقم الهاتف">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">العنوان</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <input type="text" class="form-control" name="address" value="{{ $client->address }}" placeholder="العنوان">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">ثمن الاشتراك</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <input type="text"  class="form-control" name="subscription_fees" value="{{ $client->subscription_fees }}" placeholder="ثمن الاشتراك">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">تاريخ الاشتراك</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <input type="date"  class="form-control" name="subscription_date" value="{{ $client->subscription_date }}" placeholder="تاريخ الاشتراك">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">

                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <input type="submit" class="btn btn-primary" name="submit" />
                                                            <input type="reset" class="btn btn-info" name="reset" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        </div>
    </section>
</div>

<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2021 &copy; GCE Project</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                    href="#">MegaNova Technologies LTD</a></p>
        </div>
    </div>
</footer>

<script type="text/javascript">
    var main_url = "{{ URL::route('ajax.getclients') }}";
</script>

@endsection
