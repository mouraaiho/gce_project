@extends('layout', ['current_menu' => 'consumption'])
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
    width: 794px;
    height: 1123px;
    text-align: center;
    display:block;
    padding: 0;
    margin: 0;
  }
  .table{
    border-color: #ddd;
    width: 790px;
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
    <h1>لائحة الاستهلاك لشهر {{ $month .' - '.$year}}</h1>
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
