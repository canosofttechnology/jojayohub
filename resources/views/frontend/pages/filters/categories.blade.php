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

                {{-- <li class="filter-categories__item filter-categories__item--parent">
                    <svg class="filter-categories__arrow" width="6px" height="9px">
                        <use xlink:href="/frontend/images/sprite.svg#arrow-rounded-left-6x9"></use>
                    </svg>
                    <a href="#">Instruments</a>
                    <div class="filter-categories__counter">75</div>
                </li>
                <li class="filter-categories__item filter-categories__item--current">
                    <a href="#">Power Tools</a>
                    <div class="filter-categories__counter">21</div>
                </li>
                <li class="filter-categories__item filter-categories__item--child">
                    <a href="#">Drills & Mixers</a>
                    <div class="filter-categories__counter">15</div>
                </li>
                <li class="filter-categories__item filter-categories__item--child">
                    <a href="#">Cordless Screwdrivers</a>
                    <div class="filter-categories__counter">2</div>
                </li>
                <li class="filter-categories__item filter-categories__item--child">
                    <a href="#">Screwdrivers</a>
                    <div class="filter-categories__counter">30</div>
                </li>
                <li class="filter-categories__item filter-categories__item--child">
                    <a href="#">Wrenches</a>
                    <div class="filter-categories__counter">7</div>
                </li>
                <li class="filter-categories__item filter-categories__item--child">
                    <a href="#">Grinding Machines</a>
                    <div class="filter-categories__counter">5</div>
                </li>
                <li class="filter-categories__item filter-categories__item--child">
                    <a href="#">Milling Cutters</a>
                    <div class="filter-categories__counter">2</div>
                </li>
                <li class="filter-categories__item filter-categories__item--child">
                    <a href="#">Electric Spray Guns</a>
                    <div class="filter-categories__counter">9</div>
                </li>
                <li class="filter-categories__item filter-categories__item--child">
                    <a href="#">Jigsaws</a>
                    <div class="filter-categories__counter">4</div>
                </li>
                <li class="filter-categories__item filter-categories__item--child">
                    <a href="#">Jackhammers</a>
                    <div class="filter-categories__counter">0</div>
                </li>
                <li class="filter-categories__item filter-categories__item--child">
                    <a href="#">Planers</a>
                    <div class="filter-categories__counter">12</div>
                </li>
                <li class="filter-categories__item filter-categories__item--child">
                    <a href="#">Glue Guns</a>
                    <div class="filter-categories__counter">7</div>
                </li> --}}
                </ul>
            </div>
        </div>
    </div>
    </div>
</div>
