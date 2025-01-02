@extends('admin.layout.master')

@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Languages</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total {{ $language->count() }} language(s).</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                    data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools">
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown">
                                                <a href="{{ route('admin.lang.add') }}" data-bs-toggle="tooltip"
                                                    title="Add Language" class="btn btn-icon btn-primary"><em
                                                        class="icon ni ni-plus"></em></a>
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
                            <div class="card-inner p-2">
                                <div class="nk-tb-list nk-tb-ulist">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="cid">
                                                <label class="custom-control-label" for="cid"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col"><span class="sub-text">Language</span></div>
                                        <div class="nk-tb-col tb-col-sm"><span class="sub-text">Language Code</span></div>
                                        <div class="nk-tb-col text-end"><span class="sub-text">Actions</span></div>
                                    </div><!-- .nk-tb-item -->
                                    @foreach ($lang as $l)
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
                                                            <span
                                                                class="tb-lead text-capitalize">{{ $l->language_name }}</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm">
                                                <span class="sub-texttext-bold">{{ $l->language_code }}</span>
                                            </div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="{{ route('admin.lang.edit', $l->id) }}"
                                                            class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Edit">
                                                            <em class="icon ni ni-edit"></em>
                                                        </a>
                                                    </li>
                                                    <li class="nk-tb-action-hidden">
                                                        <a href="{{ route('admin.lang.delete', $l->id) }}"
                                                            class="btn btn-trigger btn-icon" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete">
                                                            <em class="icon ni ni-trash"></em>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#"
                                                                class="dropdown-toggle btn btn-icon btn-trigger"
                                                                data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-eye"></em><span>View
                                                                                Details</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-mail"></em><span>Send
                                                                                Mail</span></a></li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-cart"></em><span>Orders</span></a>
                                                                    </li>
                                                                    <li><a href="#"><em
                                                                                class="icon ni ni-na"></em><span>Suspend</span></a>
                                                                    </li>
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
                                        {{ $lang->links() }}
                                    </div>
                                    <div class="g">
                                        <div
                                            class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                            <div>Page {{ $lang->currentPage() }} of {{ $lang->lastPage() }}</div>
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
