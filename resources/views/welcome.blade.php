@extends('layouts.app')

@section('content')
    {{--    Start home banner--}}
    <section class="homeBanner">
        <div class="container">
            <!-- Home Slider -->
            <div class="owl-carousel owl-theme homeslider" id="homeSlider">
                <div class="sliderItem">
                    <h3>Welcome to {{ config('app.name', 'Grabb It') }}</h3>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deserunt
                        doloremque est excepturi harum ipsa ipsum magnam nobis perspiciatis placeat quia, quisquam quo
                        saepe tempora, ut voluptatem, voluptates! Assumenda debitis dignissimos doloremque error fugiat
                        id maxime neque, nihil nobis non obcaecati porro praesentium quia repudiandae soluta, temporibus
                        vel. Amet, consequatur.</p>
                </div>
                <div class="sliderItem">
                    <h3>Welcome to {{ config('app.name', 'Grabb It') }}</h3>
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut deserunt
                        doloremque est excepturi harum ipsa ipsum magnam nobis perspiciatis placeat quia, quisquam quo
                        saepe tempora, ut voluptatem, voluptates! Assumenda debitis dignissimos doloremque error fugiat
                        id maxime neque, nihil nobis non obcaecati porro praesentium quia repudiandae soluta, temporibus
                        vel. Amet, consequatur.</p>
                </div>
            </div>
            <!-- End Home Slider -->
        </div>
    </section>
    {{--End home banner--}}
    {{--    Start how works--}}
    <section class="howWorks py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-10 mx-auto">
                    <div class="category-title section-title">
                        <h3>How {{ config('app.name', 'GrabbIT') }} Works</h3>
                        <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias blanditiis doloremque dolorum
                            expedita fugiat impedit iusto nihil quia quidem voluptatibus.</P>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="howWorks-div">
                        <div class="howWorks-icon">
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </div>
                        <h4>Open Free account</h4>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="howWorks-div">
                        <div class="howWorks-icon">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <h4>Register as Employer or Job Seeker</h4>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="howWorks-div">
                        <div class="howWorks-icon">
                            <i class="fa-solid fa-hands"></i>
                        </div>
                        <h4>Wait for confirmation and done</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--    End how works--}}
    {{--    start category--}}
    <section class="categories py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-10 mx-auto">
                    <div class="search-div">
                        <h3>50+ Vacancies</h3>
                        <p>Find Job, Employment, Career Opportunities</p>
                        <form action="#" class="my-5">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search"
                                       placeholder="Keyword, Job, Title etc">
                                <button class="input-group-text" type="submit" id="basic-addon2">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="category-title section-title">
                        <h3>Why {{ config('app.name', 'Grabb It') }}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda dolores doloribus
                            eaque id iusto nisi quam quasi quisquam voluptatum!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4 col-lg-3 col-6">
                        <div class="category-div">
                            <figure>
                                <img src="{{ asset('./images/service-1.jpg') }}" alt="Category" class="img-fluid">
                            </figure>
                            <p>{{ $category->category_name }}</p>
                            <p>Total services 0</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{--    End category--}}

    {{--    Start About US--}}
    <section class="about-us py-5">
        <div class="container">
            <div class="row">
                <div class="col-10 mx-auto">
                    <div class="about-us-title section-title">
                        <h3><span>What Is <b>{{ config('app.name', 'Grabb It') }}</b>?</span></h3>
                    </div>
                    <div class="text-center">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus enim esse in magnam
                            necessitatibus nesciunt nostrum odit placeat provident quidem ratione repellendus sint sit
                            suscipit temporibus veritatis, voluptates! Accusamus amet beatae, cupiditate distinctio
                            dolore doloribus fugit quibusdam quis tempore voluptates? A ab at autem consectetur culpa
                            cupiditate deleniti dolore eum exercitationem fuga harum illo ipsam labore minus molestias,
                            neque obcaecati odio officia praesentium qui quo quos repellendus reprehenderit saepe
                            tempore totam vel voluptatem. Accusantium, debitis, tenetur? Aliquid dignissimos, ex
                            explicabo fuga harum iure iusto nobis non nulla officiis perspiciatis recusandae voluptatem.
                            Accusamus aperiam ea fuga, illum labore quaerat sunt vitae voluptatem. Accusamus adipisci
                            blanditiis doloremque eveniet expedita ipsa iste laboriosam minima nam neque nostrum,
                            quisquam, reprehenderit totam. Deserunt distinctio earum facere id mollitia quia,
                            repudiandae vel? Aspernatur at consectetur dolor eum fuga incidunt ipsa numquam, odio quae
                            sequi. Accusamus, aperiam eligendi excepturi ipsa itaque laudantium nesciunt nisi
                            perspiciatis, quibusdam quos veniam voluptatibus? Accusantium amet, cum dolorem ipsa magnam
                            nesciunt obcaecati pariatur sit suscipit velit? Accusamus animi architecto, delectus ea
                            ipsam ipsum obcaecati perspiciatis quod rem sunt. Deserunt dolore maxime ullam unde velit?
                            Dolorem, ducimus eaque facilis illo illum mollitia necessitatibus officia pariatur quia
                            sint? Fugiat harum odit perferendis perspiciatis quidem!</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{--    End About US--}}
    {{--    Start Jobs--}}
    <section class="jobs second-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-10 mx-auto">
                    <div class="jobs-title section-title">
                        <h3>LATEST JOBS</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($jobs as $job)
                    <div class="col-md-4 col-lg-3 col-6">

                        <div class="job-div">
                            <figure>
                                <a class="job_link" href="{{ route('job', $job->job_id) }}">
                                    <img src="{{ asset('./images/'.$job->image) }}" alt="{{ $job->job_title }}"
                                         class="img-fluid">
                                </a>
                            </figure>
                            <div class="job-desc">
                                <p class="job-name"><a class="job_link"
                                               href="{{ route('job', $job->job_id) }}">{{ $job->job_title }}</a></p>
                                <p class="buyer-name text-muted">{{ $job->getCategory->category_name }}</p>
                                <p class="d-flex justify-content-between">
                                    <span><i class="fa-solid fa-eye me-2"></i>0</span>
                                    <span class="primary-text"><b>$290</b></span>
                                </p>
                                <p class="d-flex justify-content-between">
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span class="primary-text ratings">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    (5)
                                </span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if($job->count() > 0)
                    <div class="col-12 text-end">
                        <a href="{{ route('jobs') }}" class="btn primary-btn">See All Job</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    {{--    End Jobs--}}

@endsection
@section('script')
    <script src="{{ asset('plugins/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/owl.js')}}"></script>
@endsection
