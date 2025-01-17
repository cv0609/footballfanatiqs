@extends('front_end.layout.main')
@section('title','Contact')
@section('content')
<!--Contact Us Banner Section Start -->
<div class="football_banner contact_us">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_box">
                    <h1>Contact</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Contact Us Banner Section End -->


<!-- After Banner Text Start -->
<div class="true_banner-text pt-5">
    <div class="container">
        <div class="true_banner-text-wrap">
            <h4 class="text-center">
                Contact Us
            </h4>
            <p>
                We’d love to hear from you! At <b>Football Fanatiqs</b>, we’re always here to assist, answer
                questions, and
                listen to your feedback. Whether you need support, have a suggestion, or just want to connect, reach
                out to us using the details below.
            </p>
        </div>
    </div>
</div>
<!-- After Banner Text End-->

<!-- Contact Us Content Section Start -->
<section class="header-pages-content-section bg-center bg-cover bg-fixed bg-no-repeat pt-5">
    <div class="container">
        <div class="row header-pages-content pb-5">

            <div class="col-lg-6 header-pages-cards">
                <div class="support">
                    <h3>Support</h3>
                    <p>If you’re experiencing any issues or have questions about the platform, our dedicated support
                        team is ready to help.</p>
                    <p><b>Email:</b><a href="mailto:info@footballfanatiqs.com"> info@footballfanatiqs.com</a></p>
                    <p><b>Help Center:</b>Visit our FAQs and Support Page for quick answers to common questions.</p>
                </div>
                <div class="feedback">
                    <h3>Feedback and Suggestions</h3>
                    <p>Your input helps us improve! If you have ideas or suggestions to enhance your Football
                        Fanatiqs experience, we’d love to hear them.</p>
                    <p><b>Feedback Form:</b>Fill out our Feedback Form to share your thoughts.</p>
                    <p><b>Email:</b><a href="mailto:info@footballfanatiqs.com">info@footballfanatiqs.com</a></p>
                </div>
                <div class="inquiry">
                    <h3>Business Inquiries</h3>
                    <p>For partnerships, sponsorships, or business-related inquiries, please contact our team
                        directly.
                    </p>
                    <p><b>Email:</b><a href="mailto:info@footballfanatiqs.com">info@footballfanatiqs.com</a></p>
                </div>
                <div class="connect">
                    <h3>Connect with Us</h3>
                    <p>Stay updated and engage with the Football Fanatiqs community on social media:</p>
                    <div class="social-tags-container">
                        <a class="social-icons social-fb">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a class="social-icons social-twitter">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                        <a class="social-icons social-insta">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 contact-form-section header-pages-cards ">
                <h3>
                    Contact Form
                </h3>
                <p>
                    Have a question or need assistance? Fill out the form below, and our team will get back to you
                    as soon as possible.

                </p>
                <div class="sec_form">
                    <div class="header-pages-cards-content">
                    @if(Session::has('success'))
                        <span class="alert alert-success text-center" style="width:100%;">{{ Session::get('success') }}</span>
                    @endif
                        <div class="form-wrapper">
                            <form action="{{ route('contact.save') }}" method="post" id="contact"
                                onsubmit="return validateContactForm()">
                                  @csrf
                                <fieldset>
                                    <input class="contact-form" placeholder="Name" type="text" tabindex="1"
                                        minlength="2" maxlength="100" id="full_name" value="{{ old('full_name') }}" name="full_name">
                                        <p class="text-danger d-none" id="nameError"></p>
                                        @error('full_name')
                                         <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </fieldset>
                                <fieldset>
                                    <input class="contact-email" placeholder="Email" type="email" tabindex="2" name="email"  value="{{ old('email') }}">
                                <p class="text-danger d-none" id="emailError"></p>
                                @error('email')
                                         <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </fieldset>
                                <fieldset>
                                    <select class="contact-topic" id="subject" name="subject" value="{{ old('subject') }}">
                                        <option value="">Subject</option>
                                        <option value="Account Support">Account Support</option>
                                        <option value="League Setup Assistance">League Setup Assistance
                                        </option>
                                        <option value="Fantasy Football Questions">Fantasy Football
                                            Questions</option>
                                        <option value="Billing & Payments">Billing & Payments</option>
                                        <option value="Feedback/Suggestions">Feedback/Suggestions</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <p class="text-danger d-none" id="subjectError"></p>
                                    @error('subject')
                                         <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </fieldset>
                                <fieldset>
                                    <textarea  class="message" placeholder="Message" id="message" name="message"
                                        minlength="10" maxlength="1000">{{ old('message') }}</textarea>
                                        @error('message')
                                         <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </fieldset>
                                <fieldset>
                                    <button name="submit" type="submit" class="contact-submit butn"
                                        data-submit="...Sending">
                                        Submit </button>
                                <p class="text-danger d-none" id="messageError"></p>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Us Content Section End -->
@endsection
@section('custom-script')

<script>
    $(document).ready(function () {
        var response = 'You have to complete the CAPTCHA.';
        @if($errors->has('g-recaptcha-response'))
        $('#captchaModal').modal('show');
        $('#cap-message').text(response);
        @endif


        $('#contact-btn').on('click', function () {
            var valid = true;

            $('.text-danger').addClass('d-none').css('font-size', '15px');

            if ($('#full_name').val().trim() === '') {
                $('#nameError').removeClass('d-none').text('Full name field is required.');
                valid = false;
            }

            var email = $('#email').val().trim();

            if ($('#email').val().trim() === '') {
                $('#emailError').removeClass('d-none').text('Email field is required.');
                valid = false;
            }

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if ($('#email').val().trim() != '' && !emailPattern.test(email)) {
                $('#emailError').removeClass('d-none').text('Please enter a valid email address.');
                valid = false;
            }

            if ($('#subject').val().trim() === '') {
                $('#subjectError').removeClass('d-none').text('Subject field is required.');
                valid = false;
            }

            if ($('#message').val().trim() === '') {
                $('#messageError').removeClass('d-none').text('Message field is required.');
                valid = false;
            }

            // if (!$('#agree').is(':checked')) {
            //     $('#agreeError').removeClass('d-none').text('You must agree to the terms.');
            //     valid = false;
            // }

            if (valid) {
                $('#contactForm').submit();
            }
        });





    });

</script>


@endsection
