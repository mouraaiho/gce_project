<table class="table table-striped" id="table1">
    <thead class="thead-dark">
        <tr>
            <th>رقم العداد</th>
            <th>البطاقة الوطنية</th>
            <th>اسم المشرك</th>
            <th>القيمة البدئية</th>
            <th>تاريخ البداء</th>
            <th>حالة العداد</th>
            <th>تاريخ الإيقاف</th>
            <th>اختيارات</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data['counters']['result'] as $d)
        <tr>
            <td>{{ $d->number }}</td>
            <td>{{ $d->cin }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->itial_consumption }}</td>
            <td>{{ $d->start_date }}</td>
            <td>{{ ($d->active == 1)? 'يعمل':'لا يعمل'}}</td>
            <td>{{ ($d->end_date == '0000-00-00 00:00:00') ? '': $d->end_date }}</td>
            <td>
                <a href="{{ URL::route('counter.edit') }}" class="btn btn-success">تحين</a>
                <a href="{{ URL::route('counter.delete') }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">حذف</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination pagination-primary">
        <?php for($i = 1 ; $i <= $data['counters']['totalPages']; $i++){ ?>
            <?php if ($i >= $data['currPage'] -2 && $i <= $data['currPage'] +2){ ?>
                <li class="page-item {{ ( $i == $data['currPage']) ? 'active':'' }}"><a class="page-link pageNumber" value="{{ $i }}" href="">{{ $i }}</a></li>
            <?php } ?>
        <?php } ?>
    </ul>
</nav>