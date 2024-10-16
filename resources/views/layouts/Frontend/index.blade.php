@extends('layouts.Frontend.master')

@section('content')
    <style>
          .cl-padding {
            padding: 100px 0;
        }
        .fadeInUp h1 
        {
          font-size:25px;
        }
        @media (max-width: 800px) {
            .cl-padding {
                padding: 0 20px;
            }
            .fadeInUp h1 
        {
          font-size:20px;
        }
        }
    </style>
    <!-- Header Start -->
    @include('layouts.Frontend._header')
    <!-- Header End -->

    <div class="container-xxl py-2" style="margin-top:40px;">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h1>
                        {{ $about->data->where('lang_id', $lang_id)->first() != null
                            ? $about->data->where('lang_id', $lang_id)->first()->title
                            : $about->data->first()->title }}
                    </h1>
                    <p class="mb-1" style="line-height: 3; color:black;">
                        {!! $about->data->where('lang_id', $lang_id)->first() != null
                            ? $about->data->where('lang_id', $lang_id)->first()->description
                            : $about->data->first()->description !!}
                    </p>

                    <a class="btn btn-primary mt-2" style="border-radius: 7px;"
                        href="{{ route('contact') }}">{{ __('dashboard.contact_us') }} </a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" style="border-radius: 7px;"
                            src="{{ asset('Front') }}/img/blurred-soft-people-meeting-table-business-people-talking-modern-office-generative-ai.jpg"
                            alt="" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Start -->
    <div class="Services" style="color:#fff;margin: 20px 0;">
        <div class="blog"
            style="background-image: url({{ asset('Front') }}/img/assortment-pirate-artifacts-bounty.jpg);background-repeat: no-repeat;background-size: cover;">
            <div class="overlay" style="background-color: rgba(0, 0, 0, 0.8);">
                <div class="container">
                    <div class="section">
                        <div class="row">
                            <div class="col-md-6 mt-5 mb-5">
                                <div class="con3">
                                    <h4 class="text-white"> {{ __('dashboard.history_and_establishment') }}</h4>
                                    <p style="line-height: 3;font-size:15px">
                                        {!! $about->data->where('lang_id', $lang_id)->first() != null
                                            ? $about->data->where('lang_id', $lang_id)->first()->history
                                            : $about->data->first()->history !!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 mt-5 mb-5">
                                <div class="con4">
                                    <h4 class="text-white">{{ __('dashboard.objectives') }}</h4>
                                    <p style="line-height: 3;font-size:15px">
                                        {!! $about->data->where('lang_id', $lang_id)->first() != null
                                            ? $about->data->where('lang_id', $lang_id)->first()->objectives
                                            : $about->data->first()->objectives !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- القيم والخدمات -->
        <div style="background-color: #0c3f68; color:#000">
            <!-- <div class="container">
                <div class="row g-4">

                    @foreach ($valuesServices as $valuesService)
                        @php
                            $localizedData = $valuesService->data->where('lang_id', $lang_id)->first();
                        @endphp

                        @if ($localizedData != null && $localizedData->lang_id == $lang_id)
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="team-item bg-light mt-3 mb-3" style="border-radius: 15px;">
                                    <div class="overflow-hidden">
                                        @foreach ($valuesService->media as $media)
                                            <img class="img-fluid" src="{{ asset('storage/' . $media->path) }}"
                                                style="height: 200px; width: 100%; border-radius: 15px 15px 0 0;"
                                                alt="{{ $localizedData->title }}">
                                        @endforeach
                                    </div>

                                    <div class="text-center p-2"
                                        style="background-color: #fff; border-radius: 0 0 15px 15px; height: 315px;">
                                        <h5 class="mt-2 mb-3">
                                            {{ $localizedData->title }}
                                        </h5>
                                        <p class="m-4" style="line-height: 1.5;">
                                            {!! $localizedData->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div> -->
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" >
                        <div class="team-item bg-light mt-3 mb-3" style="border-radius: 15px;">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('Front') }}/img/القيم.jpg" style="height: 200px ;width: 100%;border-radius: 15px 15px 0 0;">
                            </div>
                            <div class="text-center p-2" style="background-color: #fff;border-radius: 0 0 15px 15px;height:315px ">
                                <h5 class="mt-2 mb-3">القيم </h5>
                                <p class="m-4" style="line-height:1.5;">في "قياس مصر"، نقدر المهنية، الابتكار، والشفافية. نحن ملتزمون بتوفير خدمات تقييم عالية الجودة، باستخدام أحدث التقنيات والمنهجيات. نؤمن بأهمية الشفافية في جميع عمليات التقييم ونتائج الاختبارات. نسعى دائمًا لتطوير أساليبنا لضمان تقديم تجربة تقييم شاملة وموضوعية تلبي احتياجات وتوقعات عملائنا. الابتكار هو جزء أساسي من فلسفتنا.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" >
                        <div class="team-item bg-light mt-3 mb-3" style="border-radius: 15px;">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('Front') }}/img/خدماتنا.jpg" style="height: 200px ;width: 100%;border-radius: 15px 15px 0 0;">
                            </div>
                            <div class="text-center p-2" style="background-color: #fff;border-radius: 0 0 15px 15px; height:315px">
                                <h5 class="mt-2 mb-3">خدماتنا </h5>
                                <p class="m-3" style="line-height:1.4;">يقدم "قياس مصر" مجموعة واسعة من الخدمات، بما في ذلك اختبارات متخصصة مثل STEP للغة الإنجليزية وKPI لقياس الأداء. نقدم أيضًا استشارات مهنية لتطوير الكفاءات والمهارات الفردية والمؤسسية. بالإضافة إلى ذلك، ننظم ورش عمل ودورات تدريبية في مختلف المجالات لتعزيز القدرات المهنية واللغوية، مع التركيز على تقديم تجربة تعليمية عالية الجودة ومتوافقة مع الاحتياجات المحددة للأفراد والمؤسسات.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" >
                        <div class="team-item bg-light mt-3 mb-3" style="border-radius: 15px;">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('Front') }}/img/رؤيتنا.png" style="height: 200px ;width: 100%;border-radius: 15px 15px 0 0;">
                            </div>
                            <div class="text-center p-2" style="background-color: #fff;border-radius: 0 0 15px 15px; height:315px ">
                                <h5 class="mt-2 mb-3">رؤيتنا </h5>
                                <p class="m-4" style="line-height:1.5;">رؤيتنا في "قياس مصر" هي أن نصبح المركز الأول في الشرق الأوسط لتقييم وتطوير الكفاءات المهنية واللغوية. نسعى لتحقيق التميز والابتكار في جميع خدماتنا، مع التركيز على تلبية وتجاوز توقعات عملائنا. نهدف إلى توفير بيئة تعليمية تحفز على التعلم والتطور المستمر، وتسهم في تحقيق النمو المهني والشخصي للأفراد.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" >
                        <div class="team-item bg-light mt-3 mb-3" style="border-radius: 15px;">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('Front') }}/img/طموحاتنا.jpg" style="height: 200px ;width: 100%;border-radius: 15px 15px 0 0;">
                            </div>
                            <div class="text-center p-2" style="background-color: #fff;border-radius: 0 0 15px 15px; height:315px">
                                <h5 class="mt-2 mb-3">طموحاتنا </h5>
                                <p class="m-4" style="line-height:1.5;">طموحاتنا في "قياس مصر" تشمل توسيع نطاق خدماتنا لتشمل المزيد من الاختبارات المتخصصة والمعترف بها دولياً. نسعى لإقامة شراكات مع مؤسسات تعليمية ومهنية عالمية لتعزيز جودة خدماتنا وتوسيع نطاق تأثيرنا. كما نطمح إلى الإسهام بفاعلية في تطوير الموارد البشرية وتعزيز الكفاءات المهنية في مصر والمنطقة.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" >
                        <div class="team-item bg-light mt-3 mb-3" style="border-radius: 15px;">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('Front') }}/img/فريق-العمل.jpg" style="height: 200px ;width: 100%;border-radius: 15px 15px 0 0;">
                            </div>
                            <div class="text-center p-2" style="background-color: #fff;border-radius: 0 0 15px 15px; height:315px">
                                <h5 class="mt-2 mb-3">فريق العمل </h5>
                                <p class="m-1" style="line-height:1.4;">   يضم مجموعة من الخبراء والمتخصصين في مجالات التعليم وتطوير الأداء المهني. يمتلك فريقنا خبرة واسعة ومؤهلات عالية، وهو مكرس لتقديم أفضل الخدمات والدعم لعملائنا. نؤمن بأن موظفينا هم الأساس في تحقيق نجاحنا، ولذلك نركز على تدريبهم وتطويرهم باستمرار لضمان تقديم خدمات عالية الجودة. نحرص على أن يكون فريقنا مجهزًا بأحدث المعرفة والمهارات في مجالات تخصصهم، مما يضمن تقديم تجربة تعليمية وتقييمية استثنائية لعملائنا.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s" >
                        <div class="team-item bg-light mt-3 mb-3" style="border-radius: 15px;">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('Front') }}/img/شركاء-النجاح.jpg" style="height: 200px ;width: 100%;border-radius: 15px 15px 0 0;">
                            </div>
                            <div class="text-center p-2" style="background-color: #fff;border-radius: 0 0 15px 15px;height:315px ">
                                <h5 class="mt-2 mb-3">شركاء النجاح </h5>
                                <p class="m-4" style="line-height:1.5;">"قياس مصر" يفخر بالشراكات التي أقامها مع مؤسسات تعليمية وشركات رائدة في مجالات متعددة. هذه الشراكات تساهم في تعزيز جودة ونطاق خدماتنا. نعمل مع شركائنا على تبادل الخبرات والموارد، مما يساعدنا في تقديم برامج تقييم وتدريب تلبي أعلى المعايير الدولية وتتوافق مع احتياجات السوق المحلية والإقليمية.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- من نحن -->
            <div class="mt-5" style="background-color: #eee;">
                <div class="container-xxl py-2">
                    <div class="container">
                        <div class="row g-5">
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                                <div class="position-relative h-100">
                                    <img class="img-fluid position-absolute w-100 h-100" style="border-radius: 7px;"
                                        src="{{ asset('Front') }}/img/nick-morrison-FHnnjk1Yj7Y-unsplash.jpg"
                                        alt="" style="object-fit: cover;">
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeInUp cl-padding" data-wow-delay="0.3s" style="direction:ltr;">
                                <h4> {!! $testimonial->data->where('lang_id', $lang_id)->first() != null
                                    ? $testimonial->data->where('lang_id', $lang_id)->first()->title
                                    : $testimonial->data->first()->title !!} </h4>
                                <p class="mb-1" style="line-height: 2; color:black;">
                                    {!! $testimonial->data->where('lang_id', $lang_id)->first() != null
                                        ? $testimonial->data->where('lang_id', $lang_id)->first()->description
                                        : $testimonial->data->first()->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-xxl py-2">
                    <div class="container">
                        <div class="row g-5">

                            <div class="col-lg-6 wow fadeInUp cl-padding" data-wow-delay="0.3s" style="direction:ltr;">
                                <h4> {!! $testimonial->data->where('lang_id', $lang_id)->first() != null
                                    ? $testimonial->data->where('lang_id', $lang_id)->first()->new_title
                                    : $testimonial->data->first()->new_title !!} </h4>
                                <p class="mb-1" style="line-height: 2; color:black;">
                                    {!! $testimonial->data->where('lang_id', $lang_id)->first() != null
                                        ? $testimonial->data->where('lang_id', $lang_id)->first()->new_description
                                        : $testimonial->data->first()->new_description !!}
                                </p>
                            </div>
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                                <div class="position-relative h-100">
                                    <img class="img-fluid position-absolute w-100 h-100" style="border-radius: 7px;"
                                        src="{{ asset('Front') }}/img/bruce-mars-GzumspFznSE-unsplash.jpg" alt=""
                                        style="object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- الدورات التدريبيه -->
                <div class="Services" style="color:#fff;margin-top: 20px;">
                    <div class="blog"
                        style="background-image: url({{ asset('Front') }}/img/ser.jpg);background-repeat: no-repeat;background-size: cover;">
                        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.7);">
                            <div class="container">
                                <div class="section">
                                    <div class="row">
                                        <div class="col-md-6 mt-5 mb-5">
                                            <div class="con3">
                                                <h4 class="text-white"> {{ __('dashboard.training_courses') }} </h4>
                                                <p style="line-height: 2;" class="col-md-10">
                                                    {!! $vision->data->where('lang_id', $lang_id)->first() != null
                                                        ? $vision->data->where('lang_id', $lang_id)->first()->training_courses
                                                        : $vision->data->first()->training_courses !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-5 mb-5">
                                            <div class="con4">
                                                <h4 class="text-white"> {{ __('dashboard.quality_policy') }}</h4>
                                                <p style="line-height: 2;" class="col-md-10">
                                                    {!! $vision->data->where('lang_id', $lang_id)->first() != null
                                                        ? $vision->data->where('lang_id', $lang_id)->first()->quality_policy
                                                        : $vision->data->first()->quality_policy !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-5 mb-3">
                                            <div class="con4">
                                                <h4 class="text-white"> {{ __('dashboard.social_responsibility') }}</h4>
                                                <p style="line-height: 2;" class="col-md-10">
                                                    {!! $vision->data->where('lang_id', $lang_id)->first() != null
                                                        ? $vision->data->where('lang_id', $lang_id)->first()->social_responsibility
                                                        : $vision->data->first()->social_responsibility !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-5 mb-3">
                                            <div class="con4">
                                                <h4 class="text-white"> {{ __('dashboard.communication') }}</h4>
                                                <p style="line-height: 2;" class="col-md-10">
                                                    {!! $vision->data->where('lang_id', $lang_id)->first() != null
                                                        ? $vision->data->where('lang_id', $lang_id)->first()->communication
                                                        : $vision->data->first()->communication !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- المنصات الالكترونيه -->
    <div class="container-xxl py-2">
        <div class="container">
            <div class="row g-4" style="display: flex; justify-content: space-around; flex-wrap: wrap;">
                @foreach ($informations as $information)
                @php
                    $localizedData = $information->data->where('lang_id', $lang_id)->first();
                @endphp
                 @if ($localizedData != null && $localizedData->lang_id == $lang_id)
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class=" text-center pt-3">
                            <div class="p-4">
                                <img class="text-primary mb-2" src="{{ asset('Front') }}/img/المنصات-الالكترونية.png"
                                    style="height: auto ;width: 90px;border-radius: 15px 15px 0 0;" >
                                <h5 class="mb-2">
                                    {{ $localizedData->title }}
                                </h5>
                                <p>
                                    {!! $localizedData->description !!}
                            </div>
                        </div>

                    </div>
                    @endif
                @endforeach
               

            </div>
        </div>
    </div>
    <!-- المنصات الاكترونيه static -->
    <div class="container-xxl py-2">
    <div class="container">
      <div class="row g-4" style="display: flex; justify-content: space-around; flex-wrap: wrap;">
        <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class=" text-center pt-3">
            <div class="p-4">
              <img class="text-primary mb-2" src="{{ asset('Front') }}/img/المنصات-الالكترونية.png" style="height: auto ;width: 90px;border-radius: 15px 15px 0 0;">
              <h5 class="mb-2">  المنصات الإلكترونية   </h5>
              <p>نوفر في "قياس مصر" منصات إلكترونية متطورة تسهل الوصول إلى الاختبارات والتقييمات. هذه المنصات مصممة لتكون سهلة الاستخدام وتوفر مواد تعليمية وتدريبية ذات جودة عالية. نحرص على أن تكون هذه المنصات متاحة وملائمة لمختلف الفئات، مع توفير الدعم الفني اللازم لضمان تجربة مستخدم فعالة ومفيدة.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class=" text-center pt-3">
            <div class="p-4">
              <img class="text-primary mb-2" src="{{ asset('Front') }}/img/البحث-والتطوير.png" style="height: auto ;width: 90px;border-radius: 15px 15px 0 0;">
              <h5 class="mb-2">  البحث والتطوير</h5>
              <p>في "قياس مصر"، نولي اهتمامًا كبيرًا للبحث والتطوير. نعمل بشكل مستمر على إجراء الأبحاث لتحسين وتطوير أساليب التقييم والتدريب. يشمل ذلك استكشاف أحدث الاتجاهات في التعليم والتدريب المهني، وتطبيق نتائج هذه الأبحاث في تطوير الاختبارات والبرامج التدريبية لضمان أنها تواكب الحاجات المتغيرة للسوق وتفي بمتطلبات المهن المستقبلية.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class=" text-center pt-3">
            <div class="p-4">
              <img class="text-primary mb-2" src="{{ asset('Front') }}/img/التوجه-العالمي.png" style="height: auto ;width: 90px;border-radius: 15px 15px 0 0;">
              <h5 class="mb-2">التوجه العالمي</h5>
            <p>"قياس مصر" لا يقتصر على السوق المحلية فحسب، بل يسعى أيضًا لترسيخ وجوده على الساحة العالمية. نعمل على إقامة شراكات مع مؤسسات تعليمية ومهنية عالمية، ونشارك في مؤتمرات وفعاليات دولية لتبادل الخبرات وتطوير خدماتنا. هذا التوجه العالمي يعزز من مكانة المركز كمؤسسة رائدة في مجال تقييم الكفاءات وتطوير المهارات.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class=" text-center pt-3">
            <div class="p-4">
              <img class="text-primary mb-2" src="{{ asset('Front') }}/img/الشهادات-المهنية.png" style="height: auto ;width: 90px;border-radius: 15px 15px 0 0;">
              <h5 class="mb-2">برامج الشهادات المهنية </h5>
              <p>إلى جانب الاختبارات والدورات التدريبية، يقدم "قياس مصر" مجموعة من برامج الشهادات المهنية في مجالات متنوعة. هذه البرامج مصممة لتزويد الأفراد بالمهارات والمعرفة اللازمة للتميز في مجالاتهم المهنية. تغطي البرامج موضوعات متنوعة تتراوح من الإدارة والقيادة إلى التقنيات الحديثة والابتكار.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class=" text-center pt-3">
            <div class="p-4">
              <img class="text-primary mb-2" src="{{ asset('Front') }}/img/دعم-المجتمع-والتطوع.png" style="height: auto ;width: 90px;border-radius: 15px 15px 0 0;">
              <h5 class="mb-2">الدعم المجتمعي والتطوع</h5>
              <p>نؤمن في "قياس مصر" بأهمية الدور الاجتماعي والمساهمة المجتمعية. نقدم الدعم للمبادرات المحلية والمجتمعية من خلال برامج التطوع والمشاركة المجتمعية. يشارك موظفونا والمتخصصون في مركزنا في فعاليات تطوعية ومبادرات تعليمية، مما يعكس التزامنا بالمسؤولية الاجتماعية ودعم التنمية المستدامة.</p>
            </div>
          </div>
        </div>
      
      </div>
    </div>
  </div>

    <!-- Contact Start -->
    <div class="container-xxl py-2">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h5>{{ __('dashboard.contact_us') }}</h5>
                    <p class="mb-4">
                        {!! $setting->data->where('lang_id', $lang_id)->first() != null
                            ? $setting->data->where('lang_id', $lang_id)->first()->description
                            : $setting->data->first()->description !!}
                    </p>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">{{ __('dashboard.address') }}</h5>
                            <p class="mb-0">{!! $setting->data->where('lang_id', $lang_id)->first() != null
                                ? $setting->data->where('lang_id', $lang_id)->first()->address
                                : $setting->data->first()->address !!}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">{{ __('dashboard.phone') }}</h5>
                            <p class="mb-0">{{ $setting->phone }}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary"
                            style="width: 50px; height: 50px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h5 class="text-primary">{{ __('dashboard.email') }}</h5>
                            <p class="mb-0">{{ $setting->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Enter Your Name" style="border-radius: 7px;">
                                    <label for="name">Enter Your Name</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="phone"
                                        placeholder="Enter Your Phone" style="border-radius: 7px;">
                                    <label for="subject">Enter Your Phone</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 150px;border-radius: 7px;"></textarea>
                                    <label for="message">Enter Your Message</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary w-100 py-3" type="submit"
                                    style="border-radius: 7px;">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    @include('layouts.Frontend._footer')
    <!-- Footer End -->
@endsection
