<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fal fa-times"></i></button>
<div class="fp__cart_popup_img">
    <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}" class="img-fluid w-100">
</div>
<div class="fp__cart_popup_text">
    <a href="{{ route('product.show', $product->slug) }}" class="title">{{ $product->name }}</a>
    <p class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
        <i class="far fa-star"></i>
        <span>(201)</span>
    </p>
    <h4 class="price">
        @if ($product->offer_price > 0)
            {{ currencyPosition($product->offer_price) }}
            <del>{{ currencyPosition($product->price) }}</del>
        @else
            {{ currencyPosition($product->price) }}
        @endif

    </h4>

    @if ($product->sizes()->exists())
        <div class="details_size">
            <h5>select size</h5>
            @foreach ($product->sizes as $size)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="{{ $size->id }}" id="size-{{ $size->id }}"
                        checked>
                    <label class="form-check-label" for="size-{{ $size->id }}">
                        {{ $size->name }} <span>+{{ currencyPosition($size->price) }}</span>
                    </label>
                </div>
            @endforeach
        </div>
    @endif
    @if ($product->options()->exists())
        <div class="details_extra_item">
            <h5>select option <span>(optional)</span></h5>
            @foreach ($product->options as $option)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $option->id }}" id="option-{{ $option->id }}">
                    <label class="form-check-label" for="option-{{ $option->id  }}">
                        {{ $option->name }}<span>+ {{ currencyPosition($option->price) }}</span>
                    </label>
                </div>
            @endforeach
        </div>
    @endif

    <div class="details_quentity">
        <h5>select quentity</h5>
        <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
            <div class="quentity_btn">
                <button class="btn btn-danger"><i class="fal fa-minus"></i></button>
                <input type="text" placeholder="1">
                <button class="btn btn-success"><i class="fal fa-plus"></i></button>
            </div>
            <h3>$320.00</h3>
        </div>
    </div>
    <ul class="details_button_area d-flex flex-wrap">
        <li><a class="common_btn" href="#">add to cart</a></li>
    </ul>
</div>
