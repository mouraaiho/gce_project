@extends('layout', ['current_menu' => 'config'])
@section('Title', 'config')
@section('content')
<style>
.active-invoice{
    margin: 30px 0px;
}
</style>
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>الاعدادات</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">اعدادات الاستهلاك</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">لاستهلاك اقل من </label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_value_step" value="{{ $data['config'][0]->value  }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label"> الشطر 1 من m²</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_one_min" value="{{ $data['config'][1]->value  }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">الى اقل من m²</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_one_max" value="{{ $data['config'][2]->value  }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">بسعر DH</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_one_price" value="{{ $data['config'][3]->value  }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label"> الشطر 2 من m²</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_two_min" value="{{ $data['config'][4]->value }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">الى اقل من m²</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_two_max" value="{{ $data['config'][5]->value  }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">بسعر DH</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_two_price" value="{{ $data['config'][6]->value }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row active-invoice">
                                            <div class="col-md-12">
                                                <div class="checkbox">
                                                    <strong>
                                                        <label>
                                                        <input type="checkbox" {{ $data['config'][7]->value !='' ? 'checked':''  }} > تفعيل الفاتورة الانتقالية
                                                        </label>
                                                    </strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">لاستهلاك اقل من </label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_value_step" value="{{ $data['config'][0]->value }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label"> الشطر 3 من m²</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_three_min" value="{{ $data['config'][7]->value  }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">الى اقل من m²</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_three_max" value="{{ $data['config'][8]->value  }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">بسعر DH</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_three_price" value="{{ $data['config'][9]->value  }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label"> الشطر 4 من m²</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_four_min" value="{{ $data['config'][10]->value }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">الى اقل من m²</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_four_max" value="{{ $data['config'][11]->value  }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">بسعر DH</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_four_price" value="{{ $data['config'][12]->value }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label"> الشطر 5 من m²</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_five_min" value="{{ $data['config'][13]->value  }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">الى اقل من m²</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_five_max" value="{{ $data['config'][14]->value  }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-4 col-4">
                                                        <label class="col-form-label">بسعر DH</label>
                                                    </div>
                                                    <div class="col-lg-6 col-6">
                                                        <input type="text" class="form-control config-value" name="consumption_chapter_five_price" value="{{ $data['config'][15]->value }}">
                                                    </div>
                                                </div>
                                            </div>
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
<script type="text/javascript">
    var main_url = "{{ URL::route('ajax.updateconfig') }}";
</script>

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


@endsection
