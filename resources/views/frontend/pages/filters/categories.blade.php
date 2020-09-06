<div class="widget-filters__item">
    <div class="filter filter--opened" data-collapse-item>
    <button type="button" class="filter__title" data-collapse-trigger>
        Categories
        <svg class="filter__arrow" width="12px" height="7px">
            <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-down-12x7"></use>
        </svg>
    </button>
    <div class="filter__body" data-collapse-content>
        <div class="filter__container">
            <div class="filter-categories">
                <ul class="filter-categories__list">
                    @foreach ($category_slug->FinalCategory as $category)
                    <li class="filter-categories__item filter-categories__item--parent">
                        <svg class="filter-categories__arrow" width="6px" height="9px">
                            <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-left-6x9"></use>
                        </svg>
                    <a href="{{route('categories.sec',[$category_slug->slug,$category->slug])}}">{{$category->name}}</a>
                        {{-- <div class="filter-categories__counter">254</div> --}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    </div>
</div>
