@extends('layout', ['current_menu' => 'payment'])
@section('Title', 'Payment Info')
@section('content')
@push('styles')
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/print/print.min.css') }}" rel="stylesheet">
@endpush
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>معلومات الاداء الفواتير</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">معلومات الاداء الفواتير</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group row align-items-center">
                                                      <div class="col-lg-3 col-3">
                                                          <label class="col-form-label">اسم المشرك</label>
                                                      </div>
                                                      <div class="col-lg-9 col-9">
                                                          <strong>{{ $data[0]->name }}</strong>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group row align-items-center">
                                                      <div class="col-lg-3 col-3">
                                                          <label class="col-form-label">رقم البطاقة الوطنية</label>
                                                      </div>
                                                      <div class="col-lg-9 col-9">
                                                          <strong>{{ $data[0]->cin }}</strong>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">رقم العداد</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <strong>{{ $data[0]->cnumber }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">مبلغ الاداء</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                          <strong>{{ $data[0]->total_price }} درهم</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">تاريخ الاداء</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <strong>{{ $data[0]->pinality_date }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row align-items-center">
                                                        <div class="col-lg-3 col-3">
                                                            <label class="col-form-label">مبلغ الغرامة</label>
                                                        </div>
                                                        <div class="col-lg-9 col-9">
                                                            <strong>{{ $data[0]->pinality_price }} درهم</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                              <div class="table-responsive" id="dataupdate">
                                                  <table class="table table-striped" id="table1">
                                                      <thead class="thead-dark">
                                                          <tr>
                                                              <th>رقم الفاتورة</th>
                                                              <th>رقم العداد</th>
                                                              <th>البطاقة الوطنية</th>
                                                              <th>اسم المشرك</th>
                                                              <th>مبلغ الاشتراك</th>
                                                              <th>شهر الاستهلاك</th>
                                                              <th>الاستهلاك الشهري</th>
                                                              <th>ثمن الفاتورة</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        @foreach($data as $d)
                                                          <tr>
                                                              <td>{{ $d->inumber }}</td>
                                                              <td>{{ $d->cnumber }}</td>
                                                              <td>{{ $d->cin }}</td>
                                                              <td>{{ $d->name }}</td>
                                                              <td>{{ $d->subscription_fees }}</td>
                                                              <td>{{ $d->month .'/'. $d->year }}</td>
                                                              <td>{{ $d->value }}</td>
                                                              <td>{{ $d->price }}</td>                                                     </tr>
                                                        @endforeach
                                                      </tbody>
                                                  </table>
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
@push('scripts')
  <script type="text/javascript" src="{{ asset('assets/vendors/print/print.min.js') }}"></script>
  <script type="text/javascript">
      var main_url = "{{ URL::route('payment.printreceipt') }}";
      document.getElementById('datePicker').valueAsDate = new Date();


  </script>
@endpush
@endsection
