@extends('layouts.Frontend.master')

@section('content')
    <!-----------------contant---------------->
    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today</h2>
            <h3>Head office</h3>
            <div>
                <li>

                    <p>Write your location here </p>
                </li>
                <li>

                    <p>am6944430@gmail.com</p>
                </li>
                <li>

                    <p> 01033993202 </p>
                </li>
                <li>

                    <p>All days without friday is our rest </p>
                </li>

            </div>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d879815.088521077!2d30.76749981758321!3d30.527324738557862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458380d3e0e470b%3A0xabdd0113bbdbc9de!2sBRANTU%20EGYPT!5e0!3m2!1sen!2seg!4v1675103946305!5m2!1sen!2seg"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
    </section>

    <section id="form" class="section-p1">
        <form class="part1">
            <span>LEAVE A MESSAGE</span>
            <h2>We love hear from you</h2>
            <input type="text" placeholder="Enter Your Name">
            <input type="text" placeholder="Enter Your E-mail">
            <input type="text" placeholder="Subject">
            <textarea name="" id="" cols="30" rows="10" placeholder="Enter Your Message"></textarea>
            <button class="btn-Noramal">Submit</button>
        </form>
    </section>
    <!-----------------contant---------------->

    @include('layouts.Frontend._footer')
@endsection
