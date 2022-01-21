@extends('layout', ['current_menu' => 'payment'])
@section('Title', 'payment')
@section('content')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>الاداءات</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">لائحة الاداءات </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">تاريخ البداية</label>
                                                    </div>
                                                    <div class="col-lg-5 col-5">
                                                        <input type="date" id="date-start" name="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">تاريخ النهاية</label>
                                                    </div>
                                                    <div class="col-lg-5 col-5">
                                                        <input type="date" id="date-end" name="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">اسم المشرك</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" id="client-name" class="form-control" name="fname" placeholder="اسم المشرك  للبحث">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">رقم العداد</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" id="counter-number" class="form-control" name="fname" placeholder="رقم العداد للبحث">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label"> رقم الفاتورة</label>
                                                    </div>
                                                    <div class="col-lg-8 col-8">
                                                        <input type="text" id="invoice-number" class="form-control" name="fname" placeholder="رقم الفاتورة للبحث">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="#" id="payment-search-btn" class="btn btn-success" >البحث</a>
                                            </div>
                                        </div>
                                      <div class="table-responsive" id="dataupdate">
                                          <table class="table table-striped" id="table1">
                                              <thead class="thead-dark">
                                                  <tr>
                                                      <th>رقم الفاتورة</th>
                                                      <th>رقم العداد</th>
                                                      <th>البطاقة الوطنية</th>
                                                      <th>اسم المشرك</th>
                                                      <th>مجموع ملبغ الاداض</th>
                                                      <th>تاريخ الاداء</th>
                                                      <th>ملبغ الغرامة</th>
                                                      <th>اختيارات</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($data['payments']['data'] as $key => $d)
                                                  <tr>
                                                      <td>{{ $data['payments']['details'][$key][0]->inumber }}</td>
                                                      <td>{{ $data['payments']['details'][$key][0]->cnumber }}</td>
                                                      <td>{{ $data['payments']['details'][$key][0]->cin }}</td>
                                                      <td>{{ $data['payments']['details'][$key][0]->name }}</td>
                                                      <td>{{ $data['payments']['details'][$key][0]->total_price }}</td>
                                                      <td>{{ $data['payments']['details'][$key][0]->pinality_date }}</td>
                                                      <td>{{ $data['payments']['details'][$key][0]->pinality_price }}</td>
                                                      <td>
                                                        <a href="{{ url('payment/detailspayment/?payment_id=' . $data['payments']['details'][$key][0]->id)}}" class="btn btn-primary">قائمة الفواتير</a>
                                                      </td>
                                                  </tr>
                                                @endforeach
                                              </tbody>
                                          </table>
                                          <nav aria-label="Page navigation example">
                                                <ul class="pagination pagination-primary">
                                                    <?php for($i = 1 ; $i <= $data['payments']['totalPages']; $i++){ ?>
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
    var main_url = "{{ URL::route('ajax.getpayments') }}";
</script>

@endsection
