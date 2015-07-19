@extends('default.tiles.master')

@section('contenu')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Votre Profile</h2>
        </header>

        <!-- start: page -->

        <div class="row">
            <div class="col-md-8 col-lg-9">
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>

                        <h2 class="panel-title">Informaions monétaires</h2>
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal" method="Post" action="{{action('CompteBancaireController@completeprofile')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h4 class="mb-xlg">Veuillez saisir vos informations : </h4>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Solde Bancaire</label>
                                    <div class="col-md-8">
                                        <input name="sb" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Frais</label>
                                    <div class="col-md-8">
                                        <input name="frais" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Solde Poche</label>
                                    <div class="col-md-8">
                                        <input name="soldepoche" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mode Epargne</label>
                                    <div class="col-md-8">
                                        <select class="form-control mb-md" name="me">
                                            <option value="0">Pas de compte epargne</option>
                                            <option  value="somme-fix">Somme fixe</option>
                                            <option  value="pourcentage">Pourcentage</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Taux ou Somme d'Epargne</label>
                                    <div class="col-md-8">
                                        <input name="taux" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-11">
                                        <button class="btn btn-primary pull-right">Terminer</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

            </div>


        </div>
            <div class="col-md-4 col-lg-3">
                <ul class="simple-card-list mb-xlg">
                    <li class="primary">
                        <h3>$0</h3>
                        <p>solde totale</p>
                    </li>
                    <li class="primary">
                        <h3>$0</h3>
                        <p>solde bancaire</p>
                    </li>
                    <li class="primary">
                        <h3>$0</h3>
                        <p>solde poche</p>
                    </li>
                </ul>
            </div>
        <!-- end: page -->
    </section>
@stop

@section('js')

@stop