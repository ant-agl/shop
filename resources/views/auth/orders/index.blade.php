<div class="row justify-content-center">
    <div class="col-md-12">
        <h1 class="text-left">Заказы</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Когда отправлен</th>
                    <th>Сумма</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td><b>{{ $loop->iteration }}</b></td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $order->calculateFullSum() }} ₽</td>
                    <td>
                        @adminroute()
                        <a class="btn btn-success" href="{{ route('admin.order-show', $order) }}">Открыть</a>
                        @else
                        <a class="btn btn-success" href="{{ route('person.order-show', $order) }}">Открыть</a>
                        @endadminroute
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}

    </div>
</div>
