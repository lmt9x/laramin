@extends('admin::index', ['header' => strip_tags($header)])

@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Ajax Record Selection
                    <span class="d-block text-muted pt-2 font-size-sm">ajax row selection and group actions</span></h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                 height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none"
                                   fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                          fill="#000000" opacity="0.3"/>
                                    <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                          fill="#000000"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Export
                    </button>
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                Choose an option:
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-print"></i></span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-copy"></i></span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-text-o"></i></span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
                <!--end::Dropdown-->
                <!--begin::Button-->
                <a href="#" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <circle fill="#000000" cx="9" cy="15" r="6"/>
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                      fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>New Record
                </a>
                <!--end::Button-->
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body">
            @if($_view_)
                @include($_view_['view'], $_view_['data'])
            @else
                {!! $_content_ !!}
            @endif
        </div>
        <!--end::Body-->
    </div>
    <!--end::Card-->
    <!--begin::Modal-->
    <div class="modal fade" id="kt_datatable_fetch_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Selected Records</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="scroll" data-scroll="true" data-height="200">
                        <ul id="kt_datatable_fetch_display_2"></ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->






    <!-- todo thieulm OLD -->
    @if(false)
        <section class="content-header">
            <h1>
                {!! $header ?: trans('admin.title') !!}
                <small>{!! $description ?: trans('admin.description') !!}</small>
            </h1>

            <!-- breadcrumb start -->
            @if ($breadcrumb)
                <ol class="breadcrumb" style="margin-right: 30px;">
                    <li><a href="{{ admin_url('/') }}"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
                    @foreach($breadcrumb as $item)
                        @if($loop->last)
                            <li class="active">
                                @if (\Illuminate\Support\Arr::has($item, 'icon'))
                                    <i class="fa fa-{{ $item['icon'] }}"></i>
                                @endif
                                {{ $item['text'] }}
                            </li>
                        @else
                            <li>
                                @if (\Illuminate\Support\Arr::has($item, 'url'))
                                    <a href="{{ admin_url(\Illuminate\Support\Arr::get($item, 'url')) }}">
                                        @if (\Illuminate\Support\Arr::has($item, 'icon'))
                                            <i class="fa fa-{{ $item['icon'] }}"></i>
                                        @endif
                                        {{ $item['text'] }}
                                    </a>
                                @else
                                    @if (\Illuminate\Support\Arr::has($item, 'icon'))
                                        <i class="fa fa-{{ $item['icon'] }}"></i>
                                    @endif
                                    {{ $item['text'] }}
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ol>
            @elseif(config('admin.enable_default_breadcrumb'))
                <ol class="breadcrumb" style="margin-right: 30px;">
                    <li><a href="{{ admin_url('/') }}"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
                    @for($i = 2; $i <= count(Request::segments()); $i++)
                        <li>
                            {{ucfirst(Request::segment($i))}}
                        </li>
                    @endfor
                </ol>
        @endif

        <!-- breadcrumb end -->

        </section>

        <section class="content hidden">

            @include('admin::partials.alerts')
            @include('admin::partials.exception')
            @include('admin::partials.toastr')

            @if($_view_)
                @include($_view_['view'], $_view_['data'])
            @else
                {!! $_content_ !!}
            @endif

        </section>
    @endif
@endsection

@section('scripts')
    <!--begin::Page Scripts(used by this page)-->
    <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
    <script src="{{ admin_asset('js/pages/crud/ktdatatable/advanced/record-selection.js') }}"></script>
    <!--end::Page Scripts-->
@endsection
