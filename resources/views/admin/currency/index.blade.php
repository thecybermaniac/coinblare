@extends('admin.layout.master')

@section('content')
<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Currencies</h3>
                        <div class="nk-block-des text-soft">
                            <p>You have total {{ $currency->count() }} currencies.</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt">
                                        <div class="drodown">
                                            <a href="{{ route('admin.currency.add')}}" data-bs-toggle="tooltip" title="Add Language" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .toggle-wrap -->
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-bordered card-stretch">
                    <div class="card-inner-group">
                        <div class="card-inner position-relative card-tools-toggle">
                            <div class="card-title-group">
                                <div class="card-tools me-n1">
                                    <ul class="btn-toolbar gx-1">
                                        <li>
                                            <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                        </li><!-- li -->
                                    </ul><!-- .btn-toolbar -->
                                </div><!-- .card-tools -->
                            </div><!-- .card-title-group -->
                            <div class="card-search search-wrap" data-search="search">
                                <div class="card-body">
                                    <div class="search-content">
                                        <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                        <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by name">
                                        <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                    </div>
                                </div>
                            </div><!-- .card-search -->
                        </div><!-- .card-inner -->
                        <div class="card-inner p-0">
                            <div class="nk-tb-list nk-tb-ulist">
                                <div class="nk-tb-item nk-tb-head">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="cid">
                                            <label class="custom-control-label" for="cid"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col"><span class="sub-text">Currency</span></div>
                                    <div class="nk-tb-col tb-col-sm"><span class="sub-text">Code</span></div>
                                    <div class="nk-tb-col tb-col-sm"><span class="sub-text">Exchange Rate</span></div>
                                    <div class="nk-tb-col text-end"><span class="sub-text">Actions</span></div>
                                </div><!-- .nk-tb-item -->
                               @foreach ($currency as $c)
                               <div class="nk-tb-item">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="cid1">
                                        <label class="custom-control-label" for="cid1"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col">
                                    <a href="html/customer-details.html">
                                        <div class="user-card">
                                            <div class="user-name">
                                                <span class="tb-lead text-capitalize">{{ $c->name }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <span class="sub-texttext-bold text-capitalize">{{ $c->code }}</span>
                                </div>
                                <div class="nk-tb-col tb-col-sm">
                                    <span class="sub-texttext-bold text-uppercase">{{ $c->exchange_rate }}</span>
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1">
                                        <li class="nk-tb-action-hidden">
                                            <a href="{{ route('admin.currency.edit', $c->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <em class="icon ni ni-edit"></em>
                                            </a>
                                        </li>
                                        <li class="nk-tb-action-hidden">
                                            <a href="{{ route('admin.currency.delete', $c->id) }}" class="btn btn-trigger btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <em class="icon ni ni-trash"></em>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{ route('admin.currency.edit', $c->id) }}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                        <li><a href="{{ route('admin.currency.delete', $c->id) }}"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .nk-tb-item -->
                               @endforeach
                            </div><!-- .nk-tb-list -->
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <div class="nk-block-between-md g-3">
                                <div class="g">
                                    <ul class="pagination justify-content-center justify-content-md-start">
                                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul><!-- .pagination -->
                                </div>
                                <div class="g">
                                    <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                        <div>Page</div>
                                        <div>
                                            <select class="form-select js-select2" data-search="on" data-dropdown="xs center">
                                                <option value="page-1">1</option>
                                                <option value="page-2">2</option>
                                                <option value="page-4">4</option>
                                                <option value="page-5">5</option>
                                                <option value="page-6">6</option>
                                                <option value="page-7">7</option>
                                                <option value="page-8">8</option>
                                                <option value="page-9">9</option>
                                                <option value="page-10">10</option>
                                                <option value="page-11">11</option>
                                                <option value="page-12">12</option>
                                                <option value="page-13">13</option>
                                                <option value="page-14">14</option>
                                                <option value="page-15">15</option>
                                                <option value="page-16">16</option>
                                                <option value="page-17">17</option>
                                                <option value="page-18">18</option>
                                                <option value="page-19">19</option>
                                                <option value="page-20">20</option>
                                            </select>
                                        </div>
                                        <div>OF 102</div>
                                    </div>
                                </div><!-- .pagination-goto -->
                            </div><!-- .nk-block-between -->
                        </div><!-- .card-inner -->
                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@endsection