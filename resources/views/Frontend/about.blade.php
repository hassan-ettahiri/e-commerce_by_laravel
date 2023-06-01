@extends('welcome')

@section('titre')
    ABOUT
@endsection

@section('content')
    <div class="page-about u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-me-info u-s-m-b-30">
                        <h1>Bienvenue sur
                            <span>Shopino</span>
                        </h1>
                        <p>
                            votre destination en ligne pour la mode prêt-à-porter tendance et abordable. Notre mission est de vous offrir une expérience de shopping en ligne exceptionnelle, où vous pouvez découvrir et acheter les dernières tendances de la mode avec facilité.

Chez Shopino, nous croyons que la mode est un moyen d'expression personnelle et de confiance. Nous sommes passionnés par la recherche des styles les plus en vogue, des vêtements de qualité et des accessoires qui vous permettront de vous sentir et de paraître incroyables, quelle que soit l'occasion.

Notre équipe dévouée travaille avec diligence pour sélectionner des pièces de vêtements uniques provenant de marques et de designers renommés, tout en gardant un œil sur les dernières tendances de la mode. Notre objectif est de vous offrir une gamme diversifiée de vêtements qui vous permettront de créer votre propre style et de vous démarquer.

Chez Shopino, nous comprenons l'importance de la satisfaction de nos clients. C'est pourquoi nous nous efforçons de fournir un service client exceptionnel à chaque étape de votre parcours d'achat. Notre équipe est là pour répondre à vos questions, vous aider dans vos choix et garantir que votre expérience de shopping en ligne soit agréable et sans tracas.

Nous sommes fiers de notre engagement envers la qualité des produits que nous proposons. Chaque article est soigneusement sélectionné pour son style, sa qualité de fabrication et son confort. Nous souhaitons que vous vous sentiez bien dans les vêtements que vous achetez chez Shopino.

Explorez notre vaste collection de vêtements pour hommes et femmes sur notre site web convivial et découvrez les dernières tendances de la mode à des prix abordables. Nous mettons régulièrement à jour notre inventaire pour vous offrir les nouveautés les plus récentes et les styles les plus recherchés.

Nous sommes ravis de vous accompagner dans votre voyage mode et de vous offrir une expérience de shopping en ligne exceptionnelle chez Shopino. Rejoignez-nous dès aujourd'hui et découvrez la mode à portée de clic.

Merci de votre confiance et de votre soutien continu !
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-me-image u-s-m-b-30">
                        <div class="banner-hover effect-border-scaling-gray">
                            <img class="img-fluid" src="{{ asset('assets/produits/concept-maquette-chemise-vetements-unis_23-2149448748.avif') }}" alt="About Picture">
                        </div>
                    </div>
                    <div class="about-social text-center u-s-m-b-30">
                        <ul class="social-media-list">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-rss"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection