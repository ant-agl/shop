<div class="col-sm-6 col-md-4 mt-4">
    <div class="card">
        <div class="card-body">
            <div class="labels">
                @if($product->isNew())
                <span class="badge badge-clip badge-success mt-1">Новинка</span>
                @endif

                @if($product->isRecommend())
                <span class="badge badge-clip badge-info mt-1">Рекомендуем</span>
                @endif

                @if($product->isHit())
                <span class="badge badge-clip badge-danger mt-1">Хит продаж!</span>
                @endif
            </div>
            <img class="card-img-top" src="{{ Storage::url($product->img) }}"
                style="width: auto; max-width:100%; max-height:240px" alt="{{ $product->title }}">
            <h5 class="card-title mt-2">{{ $product->title }}</h5>
            <p class="card-text">{{ $product->price }} ₽</p>
            <p>
                <form action="{{ route('basket-add', $product) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                    <a href="{{ route('product', [isset($category) ? $category->alias : $product->category->alias, $product->alias]) }}"
                        class="btn btn-default" role="button">Подробнее</a>
                </form>
            </p>
        </div>
    </div>
</div>
