<!-- Modal order -->
<div class="modal fade" id="modalOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Статус заказа</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="CodeInput" class="form-label">Введите номер заказа, выданный после оплаты, чтобы узнать его статус</label>
                    <hr>
                    <input type="text" name="code" class="form-control" id="CodeInput" required min="1" max="255" placeholder="Номер заказа">
                    <hr>
                    <label class="form-label">Статус заказа:</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-primary">Поиск</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal pay -->
<div class="modal fade" id="modalPayOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Оплата заказа</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-3 row" style="border-bottom-width: 1px">
                        <label for="inputFio" class="col-sm-2 col-form-label">ФИО</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputFio" name="fio">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputFio" class="col-sm-2 col-form-label">Телефон</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputFio" name="telephone">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="radioDelivery" class="col-sm-2 col-form-label">Доставка</label>
                        <input class="form-check-input check" type="checkbox" id="checkboxNoLabel" value="" aria-label="..." name="delivery">
                    </div>
                    <div class="mb-3 row">
                        <label for="inputAdress" class="col-sm-2 col-form-label">Адрес</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAdress" name="adress">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputAgreement" class="col-sm-4 col-form-label">Согласие на обработку данных</label>
                        <input class="form-check-input check" type="checkbox" id="checkboxNoLabel" value="" aria-label="..." name="agreement">
                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="input" name="payment" class="btn btn-primary">Перейти к оплате</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal cart -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">
                    Корзина
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-imageCart">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Автор и название</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Всего</th>
                        <th scope="col">Действия</th>
                    </tr>
                    </thead>
                    <tbody id="product-list">
                    <tr>
                        <td class="w-25">
                            <img src="img/planet_of_people.png" class="img-fluid img-thumbnail" alt="Sheep">
                        </td>
                        <td>Антуан де Сент-Экзюпери, Планета людей</td>
                        <td>800 Р</td>
                        <td class="qty"><input type="number" class="form-control" id="input1" value="1" required min="1" max="100"></td>
                        <td>800 Р</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25">
                            <img src="img/planet_of_people.png" class="img-fluid img-thumbnail" alt="Sheep">
                        </td>
                        <td>Антуан де Сент-Экзюпери, Планета людей</td>
                        <td>800 Р</td>
                        <td class="qty"><input type="number" class="form-control" id="input1" value="1" required min="1" max="100"></td>
                        <td>800 Р</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25">
                            <img src="img/planet_of_people.png" class="img-fluid img-thumbnail" alt="Sheep">
                        </td>
                        <td>Антуан де Сент-Экзюпери, Планета людей</td>
                        <td>800 Р</td>
                        <td class="qty"><input type="number" class="form-control" id="input1" value="1" required min="1" max="100"></td>
                        <td>800 Р</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-25">
                            <img src="img/planet_of_people.png" class="img-fluid img-thumbnail" alt="Sheep">
                        </td>
                        <td>Антуан де Сент-Экзюпери, Планета людей</td>
                        <td>800 Р</td>
                        <td class="qty"><input type="number" class="form-control" id="input1" value="1" required min="1" max="100"></td>
                        <td>800 Р</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <h5>Конечная стоимость: <span class="price text-success" id="total_price">1600 Р</span></h5>
                </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalPayOrder">Перейти оформлению заказа</button>
            </div>
        </div>
    </div>
</div>
