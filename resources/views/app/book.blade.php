@extends('layouts.app')
@section('title', "Книга")
@section('content')
    <main class="flex-md-shrink-0" >
        <div class="text-center block_title_page">
            <p class="title_page">Планета людей</p>
        </div>

        <div class="container" id="product-section">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-3">
                        <img id="mainImg" class="img_page" src="img/book/1.jpg" alt="">
                        <div class="row">
                            <div class="col-md-4">
                                <img id="change_img" class="img_page_min" src="img/book/1.jpg" alt="" style="cursor: pointer" onclick="mainImg.src='img/book/1.jpg'">
                            </div>
                            <div class="col-md-4">
                                <img id="change_img" class="img_page_min" src="img/book/2.jpg" alt="" style="cursor: pointer" onclick="mainImg.src='img/book/2.jpg'">
                            </div>
                            <div class="col-md-4">
                                <img id="change_img" class="img_page_min" src="img/book/3.jpg" alt="" style="cursor: pointer" onclick="mainImg.src='img/book/3.jpg'">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="inf_page">
                            <div class="a_page"><a href="">Классика</a></div>
                            <div class="a_page"><a href="">Антуан де Сент-Экзюперти</a></div>
                            <div class="a_page"><a href="">Серия, если книга к ней принадлежит</a></div>
                            <div class="a_page"><a href="">Издательство ИРНИТУ</a></div>
                            <p>Имеется 330 экземпляров</p>
                        </div>
                        <div class="price_page d-flex justify-content-center">
                            <p>800 ₽</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">В корзину</button>
                        </div>
                    </div>
                    <div class="col-md-4 description_page">
                        <p>Сборник очерков писателя Антуана де Сент-Экзюпери, вышедший в свет в 1939 году.
                            Книга открывается очерком «Линия»; в ней автор вспоминает о начале работы на авиалинии «Латекоэр», подготовке к первому полёту и советах, которые накануне «боевого крещения» дал ему Анри Гийоме, уже изучивший самые сложные маршруты и посадочные площадки. Это был любопытный урок географии: опытный пилот рассказывал о растущих близ Гуадиса апельсиновых деревьях, о жителях маленькой фермы неподалёку от Лорки, о тридцати драчливых баранах, пасущихся на лугу; карта Испании после занятий с Гийоме приобрела сказочный вид.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
