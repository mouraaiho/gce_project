@extends('layout', ['current_menu' => 'invoice'])
@section('Title', 'Invoice Add')
@section('content')
@push('styles')
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/print/print.min.css') }}" rel="stylesheet">
@endpush
<style>
#A5-canvas{
    background-color: white;
    padding: 20px;
    margin: 10px;
    border-radius: 10px;
}
@media print {
  #sidebar,#close-me, footer{ display:none; }
  #A5-canvas,#app,#main{
    width: 559px;
    height: 794px;
    text-align: center;
    display:block;
    padding: 0;
    margin: 0;
  }
  .table{
    border-color: #ddd;
    width: 550px;
    margin: 5px;
  }
  table tr th{
    text-align: center;
    vertical-align: middle;
  }
  table tr td{
    text-align: right;
    vertical-align: middle;
  }
  .logo-img {
    text-align: right;
    margin: 10px;
  }
  h6{
    text-align: right;
    margin: 10px;
  }
}
</style>
  <div id="A5-canvas">
    <p class="logo-img">جمعية المستقبل و التنمية لتاكريامت</p>
    <img src="{{ asset('assets/images/logo/assoiciation_logo.png') }}" width="50" height="50">
    <h1>وصل الاداء</h1>
    @if(!empty($data[0]->cin)) <h6>رقم البطاقة الوطنية : {{ $data[0]->cin }}</h6> @endif
    @if(!empty($data[0]->name)) <h6>اسم المشرك : {{$data[0]->name}}</h6> @endif
    @if(!empty($data[0]->address)) <h6>العنوان : {{$data[0]->address}}</h6> @endif
    @if(!empty($data[0]->phone)) <h6>رقم الهاتف : {{$data[0]->phone}}</h6> @endif
    @if(!empty($data[0]->pinality_date)) <h6>اخر اجل للدفع : {{$data[0]->pinality_date}}</h6> @endif
    @if(!empty($data[0]->pinality_price)) <h6>مبلغ الغرامة : {{$data[0]->pinality_price}} درهم</h6> @endif
    @if(!empty($data[0]->total_price)) <h6>مبلغ الاداء : {{$data[0]->total_price}} درهم</h6> @endif
    <table border="0">
      <tr>
        <td>
          <table class="table table-bordered" id="table1">
              <thead class="thead-dark">
                  <tr>
                      <th>ثمن الفاتورة</th>
                      <th>شهر الاستهلاك</th>
                      <th>الاستهلاك الشهري</th>
                      <th>رقم العداد</th>
                      <th>رقم الفاتورة</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($data as $d)
                  <tr>
                      <td>{{ $d->price }} درهم</td>
                      <td>{{ $d->value }}</td>
                      <td>{{ $d->month .'/'. $d->year }}</td>
                      <td>{{ $d->cnumber }}</td>
                      <td>{{ $d->inumber }}</td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        </td>
      </tr>
    </table>
    <input id="close-me" type="button" class="btn btn-success" onclick="javascript:window.close('','_parent','');" value="اغلاق النافدة" />
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
<script type="text/javascript">

</script>
@endpush
@endsection
