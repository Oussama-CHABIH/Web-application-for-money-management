<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.css')}}" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('assets/stylesheets/theme.css')}}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">

    <!-- Head Libs -->
    <script src="{{asset('assets/vendor/modernizr/modernizr.js')}}"></script>

</head>
<body>
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> S'enregistrer</h2>
            </div>
            <div class="panel-body">
                <form id="form" action="{{action('ConnexionController@inscription')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group mb-none">
                        <div class="row">
                            <div class="col-sm-6 mb-lg">
                                <label>Votre Nom</label>
                                <input name="nom" type="text" class="form-control input-lg"/>
                                @if ($errors->has('nom')) <div
                                        class="error">{{ $errors->first('nom') }}</div> @endif
                            </div>
                            <div class="col-sm-6 mb-lg">
                                <label>Votre Prénom</label>
                                <input name="prenom" type="text" class="form-control input-lg"/>
                                @if ($errors->has('prenom')) <div
                                        class="error">{{ $errors->first('prenom') }}</div> @endif
                            </div>
                            <div class="error"></div>
                        </div>
                    </div>

                    <div class="form-group mb-lg">
                        <label>Votre adresse mail</label>
                        <input name="email" id="email" type="text" class="form-control input-lg"/>
                        
                    </div>

                    <div class="form-group mb-none">
                        <div class="row">
                            <div class="col-sm-6 mb-lg">
                                <label>Mot de passe</label>
                                <input name="pwd" type="password" id="pwd" class="form-control input-lg"/>
                                @if ($errors->has('pwd')) <div
                                        class="error">{{ $errors->first('pwd') }}</div> @endif
                            </div>
                            <div class="col-sm-6 mb-lg">
                                <label>Confirmer le mot de passe</label>
                                <input name="pwd_confirm" type="password" class="form-control input-lg"/>
                                @if ($errors->has('pwd_confirm')) <div
                                        class="error">{{ $errors->first('pwd_confirm') }}</div> @endif
                            </div>
                            <div class="error"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default" required="">
                                <input id="AgreeTerms" name="agreeterms" type="checkbox" required=""/>
                                <label for="AgreeTerms">J'accepte <a href="#">Les conditions d'utilisation.</a></label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary hidden-xs">Inscrire</button>
                            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Inscrire</button>
                        </div>
                    </div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>Ou</span>
							</span>

                    <p class="text-center">Vous avez déja un compte? <a href="{{URL::to('/connexion')}}">Identifiez-Vous</a>

                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2015. All Rights Reserved.</p>
    </div>
</section>
<!-- end: page -->

<!-- Vendor -->
<script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{asset('assets/javascripts/theme.js')}}"></script>

<!-- Theme Custom -->
<script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>

<script type="text/javascript">
    $("#form").validate({
        rules: {
            nom: "required",
            prenom: "required",
            
            pwd: "required",
            pwd_confirm: {
                required: true,
                equalTo: "#pwd"
            }
        }
    });
</script>

<!-- Theme Initialization Files -->
<script src="{{asset('assets/javascripts/theme.init.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/javascripts/forms/examples.validation.js')}}"></script>


</body>
</html>