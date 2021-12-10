@extends('layout', ['current_menu' => 'invoice'])
@section('Title', 'Invoice Add')
@section('content')
@push('styles')
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
@endpush
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>اداء الفاتورة</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">اداء الفاتورة</h4>
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
                                        <form action="{{ route('invoice.save')}}" method="post">
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">رقم العداد</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <input type="text" class="form-control" name="number" placeholder="رقم العداد">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-group row align-items-center">
                                                      <div class="col-lg-3 col-3">
                                                          <label class="col-form-label">حالة العداد</label>
                                                      </div>
                                                      <div class="col-lg-9 col-9">
                                                        <div class="form-check form-check-inline">
                                                          <input class="form-check-input" type="radio" checked name="active" id="inlineRadio1" value="1">
                                                          <label class="form-check-label" for="inlineRadio1">يعمل</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                          <input class="form-check-input" type="radio" name="active" id="inlineRadio2" value="0">
                                                          <label class="form-check-label" for="inlineRadio2">لا يعمل</label>
                                                        </div>
                                                      </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">تاريخ البداء</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <input type="date"  class="form-control" name="start_date" placeholder="تاريخ البداء">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">القيمة البدئية</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <input type="number" class="form-control" name="itial_consumption" placeholder="القيمة البدئية">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">تاريخ الإقاف</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <input type="date" class="form-control" name="end_date" placeholder="تاريخ الإقاف">
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
