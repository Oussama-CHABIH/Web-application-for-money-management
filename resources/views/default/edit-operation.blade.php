@extends('default.tiles.master')

@section('contenu')
    <section class="content-body" role="main">
        <header class="page-header">
            <h2>Modifier l'opération</h2>
        </header>

        <!-- start: page -->
        <div class="row">
            <div class="col-lg-12">



                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Modifier l'operation</h2>
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal form-bordered" method="post" action="{{ action('OperationController@posteditoperation') }}">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                            <input type="hidden" name="id" value="{{ $data->id }}" />
                            <div class="form-group">
                                <label for="inputDefault" class="col-md-2 control-label" >Nom</label>
                                <div class="col-md-9">
                                    <input type="text" name="nom" id="inputDefault" class="form-control" value="{{ $data->nom }}">
                                </div>
                            </div>
                            <div class="form-group">

                                <label class="col-md-3 control-label" for="inputSuccess">Type de l'operation</label>
                                @if($data->type_dr=="depense")   
                                <div class="col-md-1">
                                    
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type_dr" id="optionsRadios1" value="depense" checked >
                                            Depense
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type_dr" id="optionsRadios2" value="revenue">
                                            Revenue
                                        </label>
                                    </div>
                                      @else
                                    <div class="col-md-1">
                                   
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type_dr" id="optionsRadios1" value="depense" >
                                            Depense
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="type_dr" id="optionsRadios2" value="revenue" checked>
                                            Revenue
                                        </label>
                                    </div>
                                   @endif
                                </div>
                                <label class="col-md-3 control-label" for="inputSuccess">Comment vous allez payer ?</label>
                                <div class="col-md-3">
                                  @if($data->mode_paiement=="bank")
                                    <div class="radio" >
                                        <label>
                                            <input type="radio" name="mode_paiement" id="optionsRadios1" value="bank" checked>
                                            Banque
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="mode_paiement" id="optionsRadios2" value="poche" >
                                            Poche
                                        </label>
                                    </div>

                                </div><div class="col-md-3">
                                 @else
                                    <div class="radio" >
                                        <label>
                                            <input type="radio" name="mode_paiement" id="optionsRadios1" value="bank">
                                            Banque
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="mode_paiement" id="optionsRadios2" value="poche" checked >
                                            Poche
                                        </label>
                                    </div>
                                  @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDefault" class="col-md-2 control-label" >Montant</label>
                                <div class="col-md-4">
                                    <input type="text" name="montant" id="inputDefault" class="form-control" value="{{ $data->montant }}">
                                </div>

                                <label for="inputDefault" class="col-md-1 control-label">Description</label>
                                <div class="col-md-4">
                                    <input type="text" name="description" id="inputDefault" class="form-control" value="{{ $data->description }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="inputSuccess">Etiquette</label>
                                <div class="col-md-4">
                                    <select class="form-control mb-md" name="etiquette" required>
                                        <option value="{{ $data->etiquette->id }}">{{$data->etiquette->nom}}</option>
                                        @foreach(\Auth::user()->etiquettes as $one)
                                            @if($data ->etiquette->nom != $one->nom)
                                            <option value="{{ $one->id }}">{{ $one->nom }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-md-1 control-label" for="inputSuccess">Categorie</label>
                                <div class="col-md-4">
                                    <select class="form-control mb-md" name="categorie" required>
                                        <option value="{{ $data->categorie->id }}">{{$data->categorie->nom}}</option>

                                        @foreach(\Auth::user()->categories as $one)
                                        @if($data->categorie->nom != $one->nom)
                                        <option value="{{ $one->id }}">{{ $one->nom }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Modifer">
                            <a href="{{ URL::to('/operations')}}" class="btn btn-danger">Annuler</a>
                            <input type="reset" class="btn btn-success" value="Reset">
                            

                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
@stop