<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
<head>
    <meta charset="utf-8"/>
    {{-- Title Section --}}
    <title>{{ Admin::title() }} @if($header) | {{ $header }}@endif</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    @if(!is_null($favicon = Admin::favicon()))
    <link rel="shortcut icon" href="{{$favicon ?? admin_asset('vendor/laramin/media/logos/favicon.ico')}}">
    @endif

    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- todo Global Theme Styles (used by all pages) --}}
    @foreach(config('layout.resources.css') as $style)
        <link href="{{ config('layout.self.rtl') ? admin_asset(Metronic::rtlCssPath($style)) : admin_asset($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- todo Layout Themes (used by all pages) --}}
    @foreach (Metronic::initThemes() as $theme)
        <link href="{{ config('layout.self.rtl') ? admin_asset(Metronic::rtlCssPath($theme)) : admin_asset($theme) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {!! Admin::css() !!}

    {{-- Includable CSS --}}
    @yield('styles')

    <script src="{{ Admin::jQuery() }}"></script>
    {!! Admin::headerJs() !!}
</head>

<body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

@if($alert = config('admin.top_alert'))
    <div style="text-align: center;padding: 5px;font-size: 12px;background-color: #ffffd5;color: #ff0000;">
        {!! $alert !!}
    </div>
@endif

@if (config('layout.page-loader.type') != '')
    @include('admin::partials.page-loader')
@endif

@if(config('layout.self.layout') == 'blank')
    <div class="d-flex flex-column flex-root" id="pjax-container">
        {!! Admin::style() !!}
        @yield('content')
        {!! Admin::script() !!}
        {!! Admin::html() !!}
    </div>
@else
    @include('admin::partials.header-mobile')
    <div class="d-flex flex-column flex-root" id="pjax-container">
        {!! Admin::style() !!}
        <div class="d-flex flex-row flex-column-fluid page">
            @if(config('layout.aside.self.display'))
                @include('admin::partials.sidebar')
            @endif
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @include('admin::partials.header')
                <div class="content {{ Metronic::printClasses('content', false) }} d-flex flex-column flex-column-fluid" id="kt_content">
                    @if(config('layout.subheader.display'))
                        @if(array_key_exists(config('layout.subheader.layout'), config('layout.subheader.layouts')))
                            @include('admin::partials.subheader.'.config('layout.subheader.layout'))
                        @else
                            @include('admin::partials.subheader.'.array_key_first(config('layout.subheader.layouts')))
                        @endif
                    @endif

                    {{-- Content --}}
                    @if (config('layout.content.extended'))
                        @yield('content')
                    @else
                        <div class="d-flex flex-column-fluid">
                            <div class="{{ Metronic::printClasses('content-container', false) }}">
                                @yield('content')
                            </div>
                        </div>
                    @endif
                </div>
                @include('admin::partials.footer')
            </div>
        </div>
        {!! Admin::script() !!}
        {!! Admin::html() !!}
    </div>

@endif

@if (config('layout.self.layout') != 'blank')

    @if (config('layout.extras.search.layout') == 'offcanvas')
        @include('admin::partials.extras.offcanvas.quick-search')
    @endif

    @if (config('layout.extras.notifications.layout') == 'offcanvas')
        @include('admin::partials.extras.offcanvas.quick-notifications')
    @endif

    @if (config('layout.extras.quick-actions.layout') == 'offcanvas')
        @include('admin::partials.extras.offcanvas.quick-actions')
    @endif

    @if (config('layout.extras.user.layout') == 'offcanvas')
        @include('admin::partials.extras.offcanvas.quick-user')
    @endif

    @if (config('layout.extras.quick-panel.display'))
        @include('admin::partials.extras.offcanvas.quick-panel')
    @endif

    @if (config('layout.extras.toolbar.display'))
        @include('admin::partials.extras.toolbar')
    @endif

    @if (config('layout.extras.chat.display'))
        @include('admin::partials.extras.chat')
    @endif

    @include('admin::partials.extras.scrolltop')

@endif

<script>var HOST_URL = "{{ route('quick-search') }}";</script>

{{-- Global Config (global config for global JS scripts) --}}
<script>
  var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
</script>

{{-- Global Theme JS Bundle (used by all pages)  --}}
@foreach(config('layout.resources.js') as $script)
    <script src="{{ admin_asset($script) }}" type="text/javascript"></script>
@endforeach

<script>
    function LA() {}
    LA.token = "{{ csrf_token() }}";
    LA.user = @json($_user_);
</script>

<!-- REQUIRED JS SCRIPTS -->
{!! Admin::js() !!}

{{-- Includable JS --}}
@yield('scripts')

</body>
</html>
