<tr>
    <td class="w-25">
        <img src="{{asset('/img/books/'.$book->id.'/'.$book->img['name'])}}" class="img-fluid img-thumbnail" alt="Sheep">
    </td>
    <td>{{ $book->author['FIO'] }}. {{ $book->title }}</td>
    <td>{{ $book->price }}₽</td>
    <td class="qty"><input type="number" class="form-control" id="input1" value="{{ $count }}" required min="1" max="100"></td>
    <td>{{ $total_price_book }}₽</td>
    <td>
        <a class="btn btn-danger btn-sm delete" id="{{ $book->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </a>
    </td>
</tr>
