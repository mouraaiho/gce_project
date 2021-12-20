@extends('layout', ['current_menu' => 'dashboard'])
@section('Title', 'dashboard')
@section('content')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>الصفحة الرئيسية</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">عدد المشتركين</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">عدد العدادات</h6>
                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">الاستهلاك الكلي</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">الفواتير الغير مؤذات</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">لائحة الفواتير الغير مؤذات</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
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
                                                @foreach($data['invoices']['result'] as $d)
                                                  <tr>
                                                      <td>{{ $d->inumber }}</td>
                                                      <td>{{ $d->cnumber }}</td>
                                                      <td>{{ $d->cin }}</td>
                                                      <td>{{ $d->name }}</td>
                                                      <td>{{ $d->subscription_fees }}</td>
                                                      <td>{{ $d->month_consumption .'/'. $d->year_consumption }}</td>
                                                      <td>{{ $d->value_consumption }}</td>
                                                      <td>{{ $d->price }}</td>
                                                      <td>{{ ($d->status) ? 'مؤذات' : 'غير مؤذات' }}</td>
                                                  </tr>
                                                @endforeach
                                              </tbody>
                                          </table>
                                          <nav aria-label="Page navigation example">
                                                <ul class="pagination pagination-primary">
                                                    <?php for($i = 1 ; $i <= $data['invoices']['totalPages']; $i++){ ?>
                                                        <?php if ($i >= $data['currPage'] -2 && $i <= $data['currPage'] +2){ ?>
                                                            <li class="page-item {{ ( $i == $data['currPage']) ? 'active':'' }}"><a class="page-link pageNumber" value="{{ $i }}" href="">{{ $i }}</a></li>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </ul>
                                            </nav>
                                      </div>
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
    var main_url = "{{ URL::route('ajax.unpaidinvoices') }}";
</script>

@endsection
