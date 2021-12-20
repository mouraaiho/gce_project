@extends('layout', ['current_menu' => 'consumption'])
@section('Title', 'Consumption List')
@section('content')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>استهلاك الماء</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">استهلاك الماء</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                          <div class="row">
                                              <div class="col-lg-1">
                                                  <label class="col-form-label">السنة</label>
                                              </div>
                                              <div class="col-lg-1">
                                                  <select id="this-year" class="form-control">
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
                                              <div class="col-lg-1">
                                                  <select id="this-month" class="form-control">
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
                                              <div class="col-lg-5">
                                                  <div class="form-group row align-items-center">
                                                      <div class="col-lg-5">
                                                          <label class="col-form-label">اسم المشرك او رقم العداد</label>
                                                      </div>
                                                      <div class="col-lg-7">
                                                          <input type="text" id="search-field" class="form-control" name="fname" placeholder="اسم المشرك او رقم العداد">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-lg-1">
                                                  <a href="#" id="search-btn" class="btn btn-success" >البحث</a>
                                              </div>
                                              <div class="col-md-3">
                                                  <a href="#" id="search-btn" class="btn btn-warning" >طبع دليل الشهر الحالي</a>
                                              </div>
                                      </div>
                                      <div class="table-responsive" id="dataupdate">
                                          <table class="table table-striped" id="table1">
                                              <thead class="thead-dark">
                                                  <tr>
                                                      <th>رقم العداد</th>
                                                      <th>البطاقة الوطنية</th>
                                                      <th>اسم المشرك</th>
                                                      <th>استهلاك الشهر السابق</th>
                                                      <th>استهلاك الشهر الحالي</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($data['consumptions']['result'] as $d)
                                                  <tr>
                                                      <td>{{ $d["number"] }}</td>
                                                      <td>{{ $d['cin'] }}</td>
                                                      <td>{{ $d['name'] }}</td>
                                                      <td><span id="last-consumption-{{ $d['counter_id'] }}">{{ $d['lastconsumption'] }}</span></td>
                                                      <td><input type="text" class="form-control thisMonthConsumptionInput" data-value="{{ $d['counter_id'] }}" value="{{ $d['thisconsumption'] }}"></td>
                                                  </tr>
                                                @endforeach
                                              </tbody>
                                          </table>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination pagination-primary">
                                                    <?php for($i = 1 ; $i <= $data['consumptions']['totalPages']; $i++){ ?>
                                                        <?php if ($i >= $data['currPage'] -2 && $i <= $data['currPage'] +2){ ?>
                                                            <li class="page-item {{ ( $i == $data['currPage']) ? 'active':'' }}"><a class="page-link pageNumber2" value="{{ $i }}" href="">{{ $i }}</a></li>
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
    var main_url = "{{ URL::route('ajax.getconsumptions') }}";
    var update_url = "{{ URL::route('ajax.updateconsumption') }}";
</script>

@endsection
