@extends('layouts.Frontend.master')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">من نحن</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">معلومات عنا</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- Service Start -->
    <div class="container-xxl py-4">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-2 text-primary " style="font-size: 25px;">الخدمات</h1>
            <p style="text-align: center; margin-bottom: 25px;">يقدم "قياس مصر" مجموعة واسعة من الخدمات، بما في ذلك اختبارات
                متخصصة مثل STEP للغة
                الإنجليزية وKPI لقياس الأداء. نقدم أيضًا استشارات مهنية لتطوير الكفاءات والمهارات الفردية والمؤسسية. بالإضافة
                إلى ذلك، ننظم ورش عمل ودورات تدريبية في مختلف المجالات لتعزيز القدرات المهنية واللغوية، مع التركيز على تقديم
                تجربة تعليمية عالية الجودة ومتوافقة مع الاحتياجات المحددة للأفراد والمؤسسات.</p>
        </div>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">اختبارات متخصصه في اللغه الانجليزيه </h5>
                            <p>اختبارات متخصصة مثل STEP للغة الإنجليزية وKPI لقياس الأداء</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3"> استشارات مهنية</h5>
                            <p>استشارات مهنية لتطوير الكفاءات والمهارات الفردية والمؤسسية</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-home text-primary mb-4"></i>
                            <h5 class="mb-3">تنظيم ورش عمل </h5>
                            <p>ورش عمل ودورات تدريبية في مختلف المجالات لتعزيز القدرات المهنية واللغوية</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">الجوده التعليميه العاليه </h5>
                            <p>تقديم تجربة تعليمية عالية الجودة ومتوافقة مع الاحتياجات المحددة للأفراد والمؤسسات</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3"> كفاءات مهنية ولغوية </h5>
                            <p>تقديم خدمات تقييم كفاءات مهنية ولغوية على أعلى مستوى</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3"> توفير تقييمات دقيقة </h5>
                            <p>نسعى لتوفير تقييمات دقيقة تساعد الأفراد على فهم مستوياتهم وتحديد مسارات التطوير المناسبة</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3"> تطوير المهارات اللغوية والمهنية </h5>
                            <p>نهدف إلى تعزيز وتطوير المهارات اللغوية والمهنية للأفراد والمؤسسات في مصر والمنطقة</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3"> تطوير مهارات موظفيها </h5>
                            <p>نركز على دعم المؤسسات لتطوير مهارات موظفيها وتعزيز الكفاءة العامة في بيئة العمل.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('front') }}/img/about.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h5 class="text-primary pe-3 " style="font-size: 22px;"> الطموحات </h5>
                    <h6 class="mb-4"> طموحاتنا في "قياس مصر"</h6>
                    <p class="mb-4">طموحاتنا في "قياس مصر" تشمل توسيع نطاق خدماتنا لتشمل المزيد من الاختبارات المتخصصة والمعترف
                        بها دولياً.</p>
                    <p class="mb-4">نسعى لإقامة شراكات مع مؤسسات تعليمية ومهنية عالمية لتعزيز جودة خدماتنا وتوسيع نطاق تأثيرنا.
                        كما نطمح إلى الإسهام بفاعلية في تطوير الموارد البشرية وتعزيز الكفاءات المهنية في مصر والمنطقة.</p>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">قراءه المزيد</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- About Start -->
    <div class="container-xxl py-4">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h5 class="text-primary pe-3 " style="font-size: 25px;"> شركاء النجاح </h5>
                    <h6 class="mb-4"> "قياس مصر"</h6>
                    <p class="mb-4">"قياس مصر" يفخر بالشراكات التي أقامها مع مؤسسات تعليمية وشركات رائدة في مجالات متعددة.</p>
                    <p class="mb-4">هذه الشراكات تساهم في تعزيز جودة ونطاق خدماتنا. نعمل مع شركائنا على تبادل الخبرات والموارد،
                        مما يساعدنا في تقديم برامج تقييم وتدريب تلبي أعلى المعايير الدولية وتتوافق مع احتياجات السوق المحلية
                        والإقليمية.</p>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">قراءه المزيد</a>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('front') }}/img/cat-4.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Activities Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-2 text-primary " style="font-size: 25px;">الانشطه</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('front') }}/img/cat-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('front') }}/img/cat-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('front') }}/img/cat-3.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('front') }}/img/cat-4.jpg" alt="" style="object-fit: cover;">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Activities Start -->


    <!-- About End -->
    @include('layouts.Frontend._footer')
@endsection
