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
                                    <h4 class="card-title">لائحة المشتركين</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @if($data['status'] =='success')
                                        <div class="alert alert-success">
                                            <h4 class="alert-heading">تمت العملية بنجاح</h4>
                                            <p>{{ $data['message'] }}</p>
                                        </div>
                                        @elseif($data['status'] =='error')
                                        <div class="alert alert-danger">
                                            <h4 class="alert-heading">هناك عطب ما</h4>
                                            <p>{{ $data['message'] }}</p>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-2 col-3">
                                                        <label class="col-form-label">اسم المشرك</label>
                                                    </div>
                                                    <div class="col-lg-10 col-9">
                                                        <input type="text" id="search-field" class="form-control" name="fname" placeholder="اسم المشرك  للبحث">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="{{ route('client.add')}}" class="btn btn-info">إضافة مشترك جديد</a>
                                            </div>
                                        </div>
                                      <div class="table-responsive" id="dataupdate">
                                          <table class="table table-striped" id="table1">
                                              <thead class="thead-dark">
                                                  <tr>
                                                      <th>البطاقة الوطنية</th>
                                                      <th>اسم المشرك</th>
                                                      <th>العنوان</th>
                                                      <th>رقم الهاتف</th>
                                                      <th>مبلغ الاشتراك</th>
                                                      <th>تاريخ الاشتراك</th>
                                                      <th>اختيارات</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($data['clients']['result'] as $d)
                                                  <tr>
                                                      <td>{{ $d->cin }}</td>
                                                      <td>{{ $d->name }}</td>
                                                      <td>{{ $d->address }}</td>
                                                      <td>{{ $d->phone }}</td>
                                                      <td>{{ $d->subscription_fees }}</td>
                                                      <td>{{ $d->subscription_date }}</td>
                                                      <td>
                                                          <a href="{{ URL::route('client.edit',['id' => $d->id])  }}" class="btn btn-success">تحين</a>
                                                          <a href="{{ URL::route('client.delete',['id' => $d->id]) }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">حذف</a>
                                                      </td>
                                                  </tr>
                                                @endforeach
                                              </tbody>
                                          </table>
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination pagination-primary">
                                                    <?php for($i = 1 ; $i <= $data['clients']['totalPages']; $i++){ ?>
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
    var main_url = "{{ URL::route('ajax.getclients') }}";
</script>

@endsection
