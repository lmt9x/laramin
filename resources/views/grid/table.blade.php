<!--begin: Search Form-->
<!--begin::Search Form-->
<div class="mb-7">
    <div class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
            <div class="row align-items-center">
                <div class="col-md-4 my-2 my-md-0">
                    <div class="input-icon">
                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query_2" />
                        <span><i class="flaticon2-search-1 text-muted"></i></span>
                    </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                        <select class="form-control" id="kt_datatable_search_status_2">
                            <option value="">All</option>
                            <option value="1">Pending</option>
                            <option value="2">Delivered</option>
                            <option value="3">Canceled</option>
                            <option value="4">Success</option>
                            <option value="5">Info</option>
                            <option value="6">Danger</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                        <select class="form-control" id="kt_datatable_search_type_2">
                            <option value="">All</option>
                            <option value="1">Online</option>
                            <option value="2">Retail</option>
                            <option value="3">Direct</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
            <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
        </div>
    </div>
</div>
<!--end::Search Form-->
<!--end: Search Form-->
<!--begin: Selected Rows Group Action Form-->
<div class="mt-10 mb-5 collapse" id="kt_datatable_group_action_form_2">
    <div class="d-flex align-items-center">
        <div class="font-weight-bold text-danger mr-3">Selected
            <span id="kt_datatable_selected_records_2">0</span>records:</div>
        <div class="dropdown mr-2">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Update status</button>
            <div class="dropdown-menu dropdown-menu-sm">
                <ul class="nav nav-hover flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-text">Pending</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-text">Delivered</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="nav-text">Canceled</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <button class="btn btn-sm btn-danger mr-2" type="button" id="kt_datatable_delete_all_2">Delete All</button>
        <button class="btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#kt_datatable_fetch_modal_2">Fetch Selected Records</button>
    </div>
</div>
<!--end: Selected Rows Group Action Form-->
<!--begin: Datatable-->
<div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
<!--end: Datatable-->



<!-- todo thieulm OLD -->
@if(false)
<div class="box grid-box">
    @if(isset($title))
    <div class="box-header with-border">
        <h3 class="box-title"> {{ $title }}</h3>
    </div>
    @endif

    @if ( $grid->showTools() || $grid->showExportBtn() || $grid->showCreateBtn() )
    <div class="box-header with-border">
        <div class="pull-right">
            {!! $grid->renderColumnSelector() !!}
            {!! $grid->renderExportButton() !!}
            {!! $grid->renderCreateButton() !!}
        </div>
        @if ( $grid->showTools() )
        <div class="pull-left">
            {!! $grid->renderHeaderTools() !!}
        </div>
        @endif
    </div>
    @endif

    {!! $grid->renderFilter() !!}

    {!! $grid->renderHeader() !!}

    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover grid-table" id="{{ $grid->tableID }}">
            <thead>
                <tr>
                    @foreach($grid->visibleColumns() as $column)
                    <th {!! $column->formatHtmlAttributes() !!}>{!! $column->getLabel() !!}{!! $column->renderHeader() !!}</th>
                    @endforeach
                </tr>
            </thead>

            @if ($grid->hasQuickCreate())
                {!! $grid->renderQuickCreate() !!}
            @endif

            <tbody>

                @if($grid->rows()->isEmpty() && $grid->showDefineEmptyPage())
                    @include('admin::grid.empty-grid')
                @endif

                @foreach($grid->rows() as $row)
                <tr {!! $row->getRowAttributes() !!}>
                    @foreach($grid->visibleColumnNames() as $name)
                    <td {!! $row->getColumnAttributes($name) !!}>
                        {!! $row->column($name) !!}
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>

            {!! $grid->renderTotalRow() !!}

        </table>

    </div>

    {!! $grid->renderFooter() !!}

    <div class="box-footer clearfix">
        {!! $grid->paginator() !!}
    </div>
    <!-- /.box-body -->
</div>
@endif