@extends('layouts.app')
@section('title', $book->title)
@section('content')
    <main class="flex-md-shrink-0" >
        <div class="text-center block_title_page">
            <p class="title_page">{{ $book->title }}</p>
        </div>

        <div class="container" id="product-section">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-3">
                        <img id="mainImg" class="img_page" src="{{ asset('/img/books/'.$book->id.'/'.$main_img->name) }}" alt="">
                        <div class="row">
                            @if(isset($book->images))
                                @foreach($book->images as $img)
                                    <div class="col-md-4">
                                        <img id="change_img" class="img_page_min" src="{{ asset('/img/books/'.$book->id.'/'.$img['name']) }}" alt="" style="cursor: pointer" onclick="mainImg.src='{{ asset('/img/books/'.$book->id.'/'.$img['name']) }}'">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="inf_page">
                            <div class="a_page"><a href="{{ url('/category/'.$book->category['id']) }}">{{ $book->category['title'] }}</a></div>
                            <div class="a_page"><a href="{{ url('/author/'.$book->author['id']) }}">{{ $book->author['FIO'] }}</a></div>
                            @if(isset($book->series))
                            <div class="a_page"><a href="{{ url('/series/'.$book->series['id']) }}">{{ $book->series['title'] }}</a></div>
                            @endif
                            <div class="a_page"><a href="{{ url('/publisher/'.$book->publisher['id']) }}">{{ $book->publisher['title'] }}</a></div>
                            <p>Имеется 330 экземпляров</p>
                        </div>
                        <div class="price_page d-flex justify-content-center">
                            <p>{{ $book->price }}₽</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button id="{{ $book->id }}" type="submit" class="btn btn-primary btn-lg add_to_cart">В корзину</button>
                        </div>
                    </div>
                    <div class="col-md-4 description_page">
                        <p>
                            {{ $book->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
