{{-- Sales Types --}}
<div class="widget-filters__item">
    <div class="filter filter--opened" data-collapse-item>
    <button type="button" class="filter__title" data-collapse-trigger>
        Wholesale
        <svg class="filter__arrow" width="12px" height="7px">
            <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-down-12x7"></use>
        </svg>
    </button>
    <div class="filter__body" data-collapse-content>
        <div class="filter__container">
            <div class="filter-list">
                <div class="filter-list__list">
                    @foreach ($sale_types as $sale_type)
                    <label class="filter-list__item">
                        <span class="filter-list__input input-check">
                            <span class="input-check__body">
                                <input onclick="redirectType()" {{ in_array($sale_type->id,$selected_sales_types)?'checked':''}} class="input-check__input selected_brands" value="{{$sale_type->name}}" name="selected_wholesale" type="checkbox"> <span class="input-check__box"></span>
                                    <svg class="input-check__icon" width="9px" height="7px">
                                    <use xlink:href="/frontend/images/sprite.svg#check-9x7"></use>
                                    </svg>
                                </span>

                        </span>
                        <span class="filter-list__title">{{$sale_type->name}} </span>
                        {{-- <span class="filter-list__counter">7</span> --}}
                    </label>
                @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
