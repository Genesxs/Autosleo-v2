<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{-- {{ __('Dashboard') }} --}}
        </h2>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 ">
                    <div class="">
                        <img src="{{ asset('/img/portada.jpg') }}" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>

        {{-- <x-jet-welcome /> --}}
        @if (session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
    </x-slot>

</x-app-layout>
