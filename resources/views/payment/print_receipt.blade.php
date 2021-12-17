<html>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/app.rtl.css') }}">
<style>
@media print {

#A5-canvas{
  width: 559px;
  height: 794px;
  text-align: center;
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
<body>
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
  </div>
</body>
</html>
