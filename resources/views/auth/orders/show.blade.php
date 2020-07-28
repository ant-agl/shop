<div class="justify-content-center">
    <div class="panel">
        <h1>Заказ №{{ $order->id }}</h1>
        <p>Заказчик: <b>{{ $order->name }}</b></p>
        <p>Номер телефона: <b>{{ $order->phone }}</b></p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                <tr>
                    <td>
                        <a href="{{ route('product', [$product->category->alias, $product->alias]) }}">
                            <img height="56px" src="{{ Storage::url($product->img) }}">
                            {{ $product->title }}
                        </a>
                    </td>
                    <td><span class="badge badge-pill badge-secondary"> {{ $product->pivot->count }}</span></td>
                    <td>{{ $product->price }} ₽</td>
                    <td>{{ $product->getPriceForCount() }} ₽</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3">Общая стоимость:</td>
                    <td>{{ $order->calculateFullSum() }} ₽</td>
                </tr>
            </tbody>
        </table>
        <br>
    </div>
</div>
