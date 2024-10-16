<footer id="footer" class="section-p1">
    <div class="col">
        <div>
            <img src="{{ asset('Front') }}/img/logo2.png" alt="" width="200px" height="100px">
        </div>

    </div>

    <div class="col">
        <h4>{{ __('dashboard.about') }}</h4>
        <a href="{{ route('about') }}">{{ __('front.about') }}</a>
        <a href="{{ route('contact') }}">{{ __('front.contacts') }}</a>
    </div>

    <div class="col">
        <h4>{{ __('dashboard.my_account')}}</h4>
        <a href="{{ route('login') }}">{{ __('dashboard.sign_in') }}</a>
        <a href="{{ route('blogs') }}">{{ __('front.blogs') }}</a>
        <a href="{{ route('certificates.index') }}">{{ __('front.certificates') }}</a>
    </div>

    <div class="col">
        <!-- <img class="logo" src="{{ asset('Front') }}/img/logoo.png" alt=""> -->
        <h4>Contact</h4>
        <p><strong>{{ __('dashboard.address') }}:</strong> {!! $setting->data->where('lang_id', $lang_id)->first() != null
            ? $setting->data->where('lang_id', $lang_id)->first()->address
            : $setting->data->first()->address !!}</p>
        <p><strong>{{ __('dashboard.phone') }}:</strong>{{ $setting->phone }}</p>
        <p><strong>{{ __('dashboard.working_hours') }}:</strong> {{date('h:i', strtotime( $setting->working_hours_from)) }} - {{date('h:i', strtotime( $setting->working_hours_to)) }} </p>

        <div class="follow">
            <h4>{{ __('dashboard.follow_us') }}</h4>
            <div class="icon">
                <a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f" target="_blank"></i></a>
                <a href="{{ $setting->twitter }}"><i class="fab fa-twitter" target="_blank"></i></a>
                <a href="{{ $setting->instagram }}"><i class="fab fa-instagram" target="_blank"></i></a>
            </div>
        </div>
    </div>
</footer>
