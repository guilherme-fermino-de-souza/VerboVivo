@extends ('templates.template')
@section('content')
        @include('templates.carousel')

        @include('templates.cardshome')

        @include('templates.cardstatik')

        @if(Auth::check())
                @include('contatos.create')
        @endif
@endsection