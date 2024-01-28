@extends('fe.layout.master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">
        <div class="container" style="margin-top: 20px; margin-bottom: 20px">
        <div class="header bg-header pb-3" style="border:6px solid #FFEAA7;border-radius: 10px" >
        {{-- Header --}}
        @include('fe.layout.header')

        <div class="container">
            <div class="bg-body-content">
                <div class="flash-message pt-3 pb-3 pl-3 pr-3">
                    <div class="row">
                        <div class="col-md-12">
                            @include('fe.layout.flash-message')
                        </div>
                    </div>
                </div>
                
                @yield('content')
            </div>
        </div>
        
        {{-- Footer --}}
        @include('fe.layout.footer')
    </div>
</div>
</div>
    <div id="snow"><canvas class="particles-js-canvas-el" width="860" height="912" style="width: 100%; height: 100%;"></canvas></div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
