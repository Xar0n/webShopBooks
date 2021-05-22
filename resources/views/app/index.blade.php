@extends('layouts.app')
@section('title', "Главная")
@section('content')
    <main class="flex-md-shrink-0" >
        <div class="col-md-12 block">
            <p class="block-title">Популярное</p>
            @if(isset($books_popular))
                <div class="row justify-content-md-center">
                @foreach($books_popular as $popular)
                            <div class="col-md-2">
                                <div class="product2">
                                    <div class="col" style="background:#DEE2E6">
                                        <p class="product-title2"> <a href="{{ url('/book/'.$popular->book['id']) }}">{{ $popular->book['title'] }}</a></p>
                                    </div>
                                    <div class="col">
                                        <div class="product-img2"> <a href="{{ url('/book/'.$popular->book['id']) }}"><img src="{{asset('/img/books/'.$popular->book['id'].'/'.$popular->book['img']['name'])}}" alt="" class="img2"></a></div>
                                    </div>
                                    <div class="col">
                                        <p class="product-author">{{ $popular->book['author']['FIO'] }}</p>
                                    </div>
                                    <div class="col">
                                        <p class="product-price2">{{ $popular->book['price'] }}₽</p>
                                    </div>
                                    <input type="hidden" name="hidden_title" id="title{{ $popular->book['id'] }}" value="{{ $popular->book['title'] }}"/>
                                    <input type="hidden" name="hidden_price" id="price{{ $popular->book['id'] }}" value="{{ $popular->book['price'] }}"/>
                                    <div class="col">
                                        <button {{ $popular->book['id'] }}  type="button" class="btn btn-primary button-buy add_to_cart">В корзину</button>
                                    </div>
                                </div>
                            </div>
                @endforeach
                </div>
            @endif
        </div>
        <div class="col-md-12 block">
            <p class="block-title">Новинки</p>
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
                                            <div class="product-img2"> <a href="{{ url('/book/'.$book->id) }}"><img src="{{asset('/img/books/'.$book->id.'/'.$book->img['name'])}}" alt="" class="img2"></a></div>
                                        </div>
                                        <div class="col">
                                            <p class="product-author">{{ $book->author['FIO'] }}</p>
                                        </div>
                                        <div class="col">
                                            <p class="product-price2">{{ $book->price }}₽</p>
                                        </div>
                                        <input type="hidden" name="hidden_title" id="title{{ $book->id }}" value="{{ $book->title }}"/>
                                        <input type="hidden" name="hidden_price" id="price{{ $book->id }}" value="{{ $book->price }}"/>
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
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item" aria-current="page">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>
@endsection
