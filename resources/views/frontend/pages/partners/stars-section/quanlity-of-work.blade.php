@if($averageStars == 0)
    <span>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
    </span>
@endif
@if($averageStars > 0 && $averageStars <= 0.5)
    <span>
        <i class="fa fa-star-half-full selected"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
    </span>
@endif
@if($averageStars > 0.5 && $averageStars <= 1)
    <span>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
    </span>
@endif
@if($averageStars > 1 && $averageStars <= 1.5)
    <span>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star-half-full selected"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
    </span>
@endif
@if($averageStars > 1.5 && $averageStars <= 2)
    <span>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
    </span>
@endif
@if($averageStars > 2 && $averageStars <= 2.5)
    <span>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star-half-full selected"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
    </span>
@endif
@if($averageStars > 2.5 && $averageStars <= 3)
    <span>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
    </span>
@endif
@if($averageStars > 3 && $averageStars <= 3.5)
    <span>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star-half-full selected"></i>
        <i class="fa fa-star"></i>
    </span>
@endif
@if($averageStars > 3.5 && $averageStars <= 4)
    <span>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star"></i>
    </span>
@endif
@if($averageStars > 4 && $averageStars <= 4.5)
    <span>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star-half-full selected"></i>
    </span>
@endif
@if($averageStars > 4.5 && $averageStars <= 5)
    <span>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
        <i class="fa fa-star selected"></i>
    </span>
@endif
