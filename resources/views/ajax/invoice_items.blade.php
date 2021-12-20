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
            <td>{{ $d->month_consumption .'/'. $d->year_consumption }}</td>
            <td>{{ $d->value_consumption }}</td>
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
              <li class="page-item {{ ( $i == $data['currPage']) ? 'active':'' }}"><a class="page-link pageInvoiceNumber {{ ( $i == $data['currPage']) ? 'InvoiceActivePage':'' }}" value="{{ $i }}" href="#">{{ $i }}</a></li>
          <?php } ?>
      <?php } ?>
  </ul>
</nav>
