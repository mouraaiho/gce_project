<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice as Invoice;
class AjaxController extends Controller
{
    //
    public function UnpaidInvoices(Request $request){
        $currPage = $request->input('pageN');
        #create or update your data here
        $data = Invoice::getAllUnpaidInvoices($currPage);

        $output = '<table class="table table-striped" id="table1">
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
            </tr>
        </thead>
        <tbody>';
        foreach($data['result'] as $d){
            $output .= '<tr>
            <td>'. $d->inumber .'</td>
            <td>'. $d->cnumber .'</td>
            <td>'. $d->cin .'</td>
            <td>'. $d->name .'</td>
            <td>'. $d->subscription_fees .'</td>
            <td>'. $d->month .'/'. $d->year .'</td>
            <td>'. $d->value .'</td>
            <td>'. $d->price .'</td>
            <td>'. (($d->status) ? 'مؤذات' : 'غير مؤذات') .'</td>
            <td><a href="#"><i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="mail"></i></a></td>
        </tr>';
        }

        $output .='</tbody>
        </table>
        <nav aria-label="Page navigation example">
              <ul class="pagination pagination-primary">';

         for($i = 1 ; $i <= $data['totalPages']; $i++){
            if ($i >= $currPage -2 && $i <= $currPage +2){ 
                $output .= '<li class="page-item '. ( ( $i == $currPage) ? 'active':'' ) .'"><a class="page-link pageNumber" value="'. $i .'" href="">'. $i .'</a></li>';
            } 
         } 

         $output .='</ul></nav>';


        return response()->json(array('success' => true, 'output' => $output));
    }
}
