@extends('layouts.app')
@section('title', $category->title)
@section('content')
    <main class="flex-md-shrink-0" >
        <div class="col-md-12 block">
            <p class="block-title">Категория: {{ $category->title }}</p>
            @if(isset($books))
                @php $j = 0;@endphp
                @foreach($books as $book)
                    @if($j == 0)
                        <div class="row justify-content-md-center">
                            @endif
                            <div class="col-md-2">
                                <div class="product2">
                                    <div class="col" style="background:#DEE2E6">
                                        <p class="product-title2"> <a href="{{ url('/book/'.$book->id) }}">{{ $book->title }}</a></p>
                                    </div>
                                    <div class="col">
                                        <div class="product-img2"> <a href="{{ url('/book/'.$book->id) }}"><img src="{{ asset('/img/books/'.$book->id.'/'.$book->img['name']) }}" alt="" class="img2"></a></div>
                                    </div>
                                    <div class="col">
                                        <p class="product-author">{{ $book->author['FIO'] }}</p>
                                    </div>
                                    <div class="col">
                                        <p class="product-price2">{{ $book->price }}₽</p>
                                    </div>
                                    <div class="col">
                                        <button id="{{ $book->id }}" type="button" class="btn btn-primary button-buy add_to_cart">В корзину</button>
                                    </div>
                                </div>
                            </div>
                            @php  $j++; @endphp
                            @if($j == 5 || $last_id == $book->id)
                                @php  $j = 0 @endphp
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col-md-2">
                    <p>Категория пуста</p>
                </div>
            @endif
        </div>
        <!-- ПАГИНАЦИЯ -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <nav aria-label="...">
                        <ul class="pagination">
                            {{ $books->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>

@endsection
