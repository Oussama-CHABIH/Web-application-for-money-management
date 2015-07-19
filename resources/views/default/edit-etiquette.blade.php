@extends('default.tiles.master')

@section('contenu')
    <section class="content-body" role="main">
        <header class="page-header">
            <h2>Modifier les données de la personne</h2>
        </header>

        <!-- start: page -->
        <div class="row">
            <div class="col-lg-12">



                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Modifier les données de la personne</h2>
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal form-bordered" method="post" action="{{ action('EtiquetteController@posteditetiquette') }}">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                            <input type="hidden" name="id" value="{{ $data->id }}" />
                            <div class="form-group">
                                <label for="inputDefault" class="col-md-2 control-label" >Nom</label>
                                <div class="col-md-9">
                                    <input type="text" name="nom" id="inputDefault" class="form-control" value="{{ $data->nom }}">
                                </div>
                            </div>
                                                       <div class="form-group">
                                <label for="inputDefault" class="col-md-2 control-label" >Prenom</label>
                                <div class="col-md-4">
                                    <input type="text" name="prenom" id="inputDefault" class="form-control" value="{{ $data->prenom }}">
                                </div>

                                <label for="inputDefault" class="col-md-1 control-label">CIN</label>
                                <div class="col-md-4">
                                    <input type="text" name="cin" id="inputDefault" class="form-control" value="{{ $data->cin }}">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Modifer">
                            <a href="{{ URL::to('/etiquettes')}}" class="btn btn-danger">Annuler</a>
                            <input type="reset" class="btn btn-success" value="Reset">
                            

                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
@stop