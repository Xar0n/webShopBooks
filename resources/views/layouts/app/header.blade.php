<nav class="header navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <div class="col-md-12">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Выпадающее меню и кнопки навигации -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item"><a class="navbar-brand" href="/">Книги №1</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-bs-toggle="dropdown" aria-expanded="false">Категории</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown06">
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <li><a class="dropdown-item" href="{{ url("/category/$category->id") }}">{{ $category->title }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url("/series") }}">Серии</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#modalOrder">Статус заказа</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url("/info") }}">О нас</a>
                    </li>
                </ul>
                <!-- Иконка корзины -->
                <ul class="nav col-11 col-md-auto my-2 justify-content-center my-md-0 text-medium">
                    <li>
                        <a href="#" class="nav-link text-secondary" data-bs-toggle="modal" data-bs-target="#cartModal">
                            <svg class="bi d-block mx-auto mb-1" width="43" height="43" xmlns="http://www.w3.org/2000/svg" fill="#0D6EFD" class="bi bi-basket3-fill" viewBox="0 0 16 16">
                                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z"/>
                            </svg>
                        </a>
                        <div id="enscart_my_counter_wrapper"><span  id="total_count"> 0 </span></div>
                    </li>
                </ul>
                <!--  -->
                <form method="get" class="col-4 d-flex" action="{{ url('/search') }}">
                    <div class="btn-group col d-flex">
                        <div class="form-check form-check-inline me-2 check ">
                            <input  class="form-check-input" type="checkbox" name="filters" id="inlineCheckbox1" value="1" onclick="toggle_visibility('filter')">
                            <label class="form-check-label" for="inlineCheckbox1" style="color:white">Фильтры</label>
                        </div>
                        <input name="query" class="form-control me-2" type="search" placeholder="Введите название книги" aria-label="Search">
                        <button type="submit" class="btn btn-primary">Найти</button>
                    </div>

            </div>
            <div style="display:none" id="filter">

                    <div class="d-flex">
                    <div class="btn-group">
                        <label class="col-form-label me-2" style="color:white">Цена</label>
                        <input type="number" name="priceFrom" class="form-control me-2" placeholder="От" aria-label="Search" min="0">
                        <input type="number" name="priceBy" class="form-control me-2" placeholder="До" aria-label="Search" min="0">
                        <label class="col-form-label me-2" style="color:white">Издательство</label>
                        <input name="publisher" class="form-control me-2" type="search" placeholder="Название" aria-label="Search">
                        <div class="form-check form-check-inline me-2 check">
                            <input name="discount" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1">
                            <label class="form-check-label" for="inlineCheckbox2" style="color:white">Скидка</label>
                        </div>
                        <div class="form-check form-check-inline check">
                            <input name="availability" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1">
                            <label class="form-check-label" for="inlineCheckbox" style="color:white">Наличие</label>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>
