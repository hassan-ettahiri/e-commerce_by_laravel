@extends('welcome')

@section('titre')
    CONTACT
@endsection

@section('content')
    <!-- Contact-Page -->
    <div class="page-contact u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="touch-wrapper">
                        <h1 class="contact-h1">Get In Touch With Us</h1>
                        <form action="{{ url('add_contact') }}" method="POST">
                            @csrf
                            <div class="group-inline u-s-m-b-30">
                                <div class="group-1 u-s-p-r-16">
                                    <label for="contact-name">Your Name
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="contact-name" name="name" class="text-field" placeholder="Name">
                                </div>
                                <div class="group-2">
                                    <label for="contact-email">Your Email
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="contact-email" name="email" class="text-field" placeholder="Email">
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="contact-subject">Subject
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="contact-subject" name="subject" class="text-field" placeholder="Subject">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="contact-message">Message:</label>
                                <textarea class="text-area" name="message" id="contact-message"></textarea>
                            </div>
                            <div class="u-s-m-b-30">
                                <button type="submit" class="button button-outline-secondary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="information-about-wrapper">
                        <h1 class="contact-h1">Information About Us</h1>
                        <p>
                            Shopino - Votre destination mode en ligne. Découvrez les dernières tendances de la mode prêt-à-porter à des prix abordables. Notre équipe sélectionne avec soin des vêtements uniques de marques renommées. Nous mettons l'accent sur la qualité, le style et le confort. Faites votre choix parmi notre vaste collection pour hommes et femmes. Rejoignez Shopino et vivez une expérience de shopping en ligne exceptionnelle.    
                        </p>
                    </div>
                    <div class="contact-us-wrapper">
                        <h1 class="contact-h1">Contact Us</h1>
                        
                        <div class="contact-material u-s-m-b-16">
                            <h6>Email</h6>
                            <span>contact-shopino@gmail.com</span>
                        </div>
                        <div class="contact-material u-s-m-b-16">
                            <h6>Telephone</h6>
                            <span>+212-5XXXXXXXX</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="u-s-p-t-80">
            <div id="map"></div>
        </div>
    </div>
@endsection