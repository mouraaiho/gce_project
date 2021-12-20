@extends('layout', ['current_menu' => 'invoice'])
@section('Title', 'Invoice Add')
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
                                                          <label class="col-form-label">اسم المشرك</label>
                                                      </div>
                                                      <div class="col-lg-9 col-9">
                                                          <input type="text"  class="form-control" name="client_name" value="{{ $data[0]->name }}" placeholder="اسم المشرك">
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
                                                          <input type="text"  class="form-control" name="client_cin" value="{{ $data[0]->cin }}" placeholder="رقم البطاقة الوطنية">
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
                                                            <input type="text" class="form-control" name="number" value="{{ $data[0]->cnumber }}" placeholder="رقم العداد">
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
                                                          <?php
                                                            $total_price = 0;
                                                            foreach ($data as $d) {
                                                              $total_price = $total_price + $d->price;
                                                            }
                                                           ?>
                                                            <input type="text" class="form-control" name="total_price" value="{{ $total_price }}" placeholder="مبلغ الاشتراك" required>
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
                                                            <input type="date" id="datePicker" class="form-control" name="pinality_date" placeholder="اخر اجل للدفع" required>
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
                                                            <input type="number" class="form-control" min="0" value="0" name="pinality_price"  placeholder="مبلغ الغرامة" required>
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
                                                            <button type="submit" class="btn btn-primary">اداء الفاتورة</button>
                                                            <button type="reset" class="btn btn-info">الغاء الاداء</button>
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
                                                              <th>اداء الفاتورة</th>
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
                                                              <td>{{ $d->month_consumption .'/'. $d->year_consumption }}</td>
                                                              <td>{{ $d->value_consumption }}</td>
                                                              <td>{{ $d->price }}</td>
                                                              <td>{{ ($d->status) ? 'مؤذات' : 'غير مؤذات' }}</td>                                                          </tr>
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

      @if($status =='success')
      var W = window.open(main_url + "/?payment_id={{ $payment_id}}");
      W.window.print();
      @endif
  </script>
@endpush
@endsection
