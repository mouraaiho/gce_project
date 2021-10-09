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
            <td>{{ $d['lastconsumption'] }}</td>
            <td><input type="text" class="form-control thisMonthConsumptionInput" data-value="{{ $d['number'] }}" value="{{ $d['thisconsumption'] }}"></td>
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