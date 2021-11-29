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
