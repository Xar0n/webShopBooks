@extends('layouts.app')
@section('title', "Серии")
@section('content')
    <main class="flex-md-shrink-0">
        <div class="text-center block_title_page">
            <p class="title_page">Серии</p>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12">
            @if(isset($series))
                @php $j = 0;@endphp
                @foreach($series as $serie)
                    @if($j == 0)

                        <div class="row justify-content-md-center block_series">
                            <div class="col-md-1 col-lg-1">
                                <a href="{{ url('/series/'.$serie->id) }}"><img class="img_series" src="{{ asset('/img/series/'.$serie->img) }}" alt=""></a>
                            </div>
                            <div class="col-md-2 col-lg-2 blockTitle_series">
                                <a href="{{ url('/series/'.$serie->id) }}" class="text-decoration-none">
                                    <p class="title_series">{{ $serie->author['FIO'] }} <br> {{$serie->title}}</p>
                                </a>
                            </div>
                            <div class="col-md-2 col-lg-2">
                            </div>

                        @endif

                            @if($j == 1)
                                <div class="col-md-1 col-lg-1">
                                    <a href="{{ url('/series/'.$serie->id) }}"><img class="img_series" src="{{ asset('/img/series/'.$serie->img) }}" alt=""></a>
                                </div>
                                <div class="col-md-2 col-lg-2 blockTitle_series">
                                    <a href="{{ url('/series/'.$serie->id) }}" class="text-decoration-none">
                                        <p class="title_series">{{ $serie->author['FIO'] }} <br> {{$serie->title}}</p>
                                    </a>
                                </div>
                        </div>
                        @php $j = 0;@endphp
                    @else
                        @php  $j++; @endphp
                            @endif


                            @if($last_id == $serie->id)
                                @php  $j = 0 @endphp
                            </div>
                            @endif
                            @endforeach
            @endif
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
        </div>
    </main>
@endsection


