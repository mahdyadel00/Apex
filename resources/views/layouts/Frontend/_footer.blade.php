<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="{{ $setting->twitter }} " aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="{{ $setting->facebook }}" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="{{ $setting->linkedin }}" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a class="link-dark text-decoration-none me-3" href="{{ route('privacy') }}">{{ __('front.privacy_policy') }}</a>/
                <a class="link-dark text-decoration-none" href="{{ route('terms') }}">{{ __('front.terms_of_use') }}</a>
            </div>
        </div>
    </div>
</footer>
