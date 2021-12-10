@extends('layout', ['current_menu' => 'invoice'])
@section('Title', 'invoice')
@section('content')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>الفواتير</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">لائحة الفواتير </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-3 col-3">
                                                        <label class="col-form-label">السنة</label>
                                                    </div>
                                                    <div class="col-lg-3 col-3">
                                                        <select id="this-year" class="form-control">
                                                            <option value=""></option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                            <option value="2031">2031</option>
                                                            <option value="2032">2032</option>
                                                            <option value="2033">2033</option>
                                                            <option value="2034">2034</option>
                                                            <option value="2035">2035</option>
                                                            <option value="2036">2036</option>
                                                            <option value="2037">2037</option>
                                                            <option value="2038">2038</option>
                                                            <option value="2039">2039</option>
                                                            <option value="2040">2040</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2 col-2">
                                                        <select id="this-month" class="form-control">
                                                            <option value=""></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-3 col-3">
                                                        <label class="col-form-label">اداء الفاتورة</label>
                                                    </div>
                                                    <div class="col-lg-9 col-9">
                                                        <select id="type-invoice" class="form-control">
                                                            <option value=""></option>
                                                            <option value="1">مؤذات</option>
                                                            <option value="0">غير مؤذات</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                              <a href="#" id="print-invoices-btn" class="btn btn-info" >طبع فواتير الشهر الحالي</a>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="#" id="add-invoice-btn" class="btn btn-primary" >اداء فواتير</a>
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
                                                <a href="#" id="invoice-search-btn" class="btn btn-success" >البحث</a>
                                                <a href="#" id="empty-invoice-btn" class="btn btn-danger" >إلغاء الاختيارات</a>
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
                                                      <th>مبلغ الاشتراك</th>
                                                      <th>شهر الاستهلاك</th>
                                                      <th>الاستهلاك الشهري</th>
                                                      <th>ثمن الفاتورة</th>
                                                      <th>اداء الفاتورة</th>
                                                      <th>اختيارات</th>
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
                                                      <td>{{ $d->month .'/'. $d->year }}</td>
                                                      <td>{{ $d->value }}</td>
                                                      <td>{{ $d->price }}</td>
                                                      <td>{{ ($d->status) ? 'مؤذات' : 'غير مؤذات' }}</td>
                                                      <td>
                                                        @if($d->status)
                                                          {{ "" }}
                                                        @else
                                                        <input type="checkbox" class="selectID" {{ (strpos($invoiceList,strval($d->id)) !== false) ? "checked":""  }} value="{{ $d->id }}" />
                                                        @endif
                                                      </td>
                                                  </tr>
                                                @endforeach
                                              </tbody>
                                          </table>
                                          <nav aria-label="Page navigation example">
                                                <ul class="pagination pagination-primary">
                                                    <?php for($i = 1 ; $i <= $data['invoices']['totalPages']; $i++){ ?>
                                                        <?php if ($i >= $data['currPage'] -2 && $i <= $data['currPage'] +2){ ?>
                                                            <li class="page-item {{ ( $i == $data['currPage']) ? 'active':'' }}"><a class="page-link pageInvoiceNumber" value="{{ $i }}" href="#">{{ $i }}</a></li>
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
    var main_url = "{{ URL::route('ajax.getinvoices') }}";
    var selected_url = "{{ URL::route('ajax.selectedinvoice') }}";
    var emptySelected_url = "{{ URL::route('ajax.emptyselectedinvoice') }}";
    var addSelected_url = "{{ URL::route('ajax.addselectedinvoice') }}";
    var addinvoice_url = "{{ URL::route('invoice.add') }}";
</script>

@endsection
