@php
    $allPortfolio = App\Models\Portfolio::all();
@endphp
<!-- portfolio-area -->
<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">04 - Portfolio</span>
                    <h2 class="title">All creative work</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content" id="portfolioTabContent">
        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">
                            @foreach ($allPortfolio as $portfolio)
                                <div class="portfolio__item">
                                    <div class="portfolio__thumb">
                                        <img src="{{ !empty($portfolio->portfolio_image) ? asset('/') . $portfolio->portfolio_image : asset('backend\assets\images\no_image.jpg') }}"
                                            alt="">
                                    </div>
                                    <div class="portfolio__overlay__content">
                                        <span>{{$portfolio->portfolio_title}}</span>
                                        <h4 class="title"><a href="{{route('portfolio.details', $portfolio->id)}}">{{$portfolio->portfolio_title}}</a></h4>
                                        <a href="{{route('portfolio.details', $portfolio->id)}}" class="link">Case Study</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- portfolio-area-end -->
