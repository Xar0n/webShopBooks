@extends('layouts.app')
@section('title', "Главная")
@section('content')
<main class="flex-md-shrink-0" >
    <div class="text-center block_title_page">
        <p class="title_page">Серии</p>
    </div>
    <div class="col-md-12 col-lg-12 col-xl-12">
        @if(isset($series))
        @foreach($series as $series)
        <div class="row justify-content-md-center block_series">
            <div class="col-md-1 col-lg-1">
                <a href="{{ url('/series/'.$series->series['id']) }}"><img class="img_series" src="{{ asset('/img/series/.$series->series['img']}')}}" alt=""></a>
            </div>
            <div class="col-md-2 col-lg-2 blockTitle_series">
                <a href="#" class="text-decoration-none">
                    <p class="title_series">{{$series->authors['FIO']}} <br> {{$series->series['title']}}</p>
                </a>
            </div>
        </div>
        @endforeach
        @endif


        <!-- ПАГИНАЦИЯ -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <nav aria-label="...">
                        <ul class="pagination">
                            {{ $series->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
</main>
@endsection
