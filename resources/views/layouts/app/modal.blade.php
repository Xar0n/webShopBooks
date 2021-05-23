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
                <form method="get" onsubmit="return isValidForm()">
                    <div class="mb-3 row" style="border-bottom-width: 1px">
                        <label for="inputFio" class="col-sm-2 col-form-label">ФИО</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputFio" name="fio" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Телефон</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputNumber" name="telephone" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="checkboxDelivery" class="col-sm-2 col-form-label">Доставка</label>
                        <input class="form-check-input check" type="checkbox" id="checkboxDelivery" value="" aria-label="..." name="delivery" required>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputAdress" class="col-sm-2 col-form-label">Адрес</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAddress" name="adress" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="checkboxAgreement" class="col-sm-4 col-form-label">Согласие на обработку данных</label>
                        <input class="form-check-input check" type="checkbox" id="checkboxAgreement" value="" aria-label="..." name="agreement" required>
                    </div>
                    <div class="mb-3 row">
                        <p class="text-left">Сумма к оплате: <span id="total_price_payment"></span></p>
                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button type="button" name="payment" class="btn btn-primary" id="add_payment" data-bs-dismiss="modal">Перейти к оплате</button>
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
                <table class="table table-imageCart" id="cart_table">
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
                    </tbody>
                </table>
                <div class="d-flex justify-content-end" id="part_cart">
                    <h5>Конечная стоимость: <span class="price text-success" id="total_price">0Р</span></h5>
                </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <button id="pay" type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalPayOrder">Перейти оформлению заказа</button>
            </div>
        </div>
    </div>
</div>
