@extends('default.tiles.master')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendor/pnotify/pnotify.custom.css')}}" />
@stop

@section('contenu')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Les opérations périodiques</h2>
    </header>
    <section class="panel">
        <header class="panel-heading">
            <a href="#modalForm" class="modal-with-form btn btn-primary pull-right">Ajouter une opération périodique</a>

            <h2 class="panel-title">Gestion des opérations périodiques</h2>
        </header>
        <div class="panel-body">
            <section class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table mb-none">
                            <thead>
                            <tr align="center">
                                <th>Num</th>                               
                                <th>N_BORDEREAU_ARRVEE</th>
                                <th>DATE_ARRIVEE</th>
                                <th>N_BORDEREAU_ENVOI</th>
                                <th>DATE_ENVOI</th>
                                <th>DATE_REMISE</th>
                                <th>nom</th>
                                <th>prenom</th>
                                <th>cin</th>
                                <th>structure</th>
                                <th>DATE_RECEPTION</th>
                                <th> N_COMMANDE</th>
                                <th>N_SERIE</th>
                                <th>actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($operationpers as $one)
                                <tr style="background-color:#00FFFF" align="center">
                                    <td>{{ $i }}</td>
                                    <td>{{ $one-> N_BORDEREAU_ARRVEE }}</td>
                                    <td>{{ $one-> DATE_ARRIVEE }}</td>
                                    <td>{{ $one-> N_BORDEREAU_ENVOI }}</td>
                                    <td>{{ $one-> DATE_ENVOI }}</td>
                                    <td>{{ $one-> DATE_REMISE }}</td>
                                    <td>{{ $one->etiquette->nom }}</td>
                                    <td>{{ $one->etiquette->prenom }}</td>
                                    <td>{{ $one->etiquette->cin }}</td>
                                    @if(empty($one->categorie))
                                    <td >sans</td>
                                    @else
                                    <td>{{ $one->categorie->nom}}</td>
                                    @endif
                                    <td>{{ $one-> DATE_RECEPTION }}</td>
                                    <td>{{ $one-> N_COMMANDE }}</td>
                                    <td>{{ $one-> N_SERIE }}</td>
                                    <td class="actions">
                                        <a href="{{ URL::to('editoperationper/'.$one->id) }}" class="modifier" ><i class="fa fa-pencil"></i></a>
                                        <a class="delete-row" href="{{URL::to('/deleteoperationper/'.$one->id)}}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Modal Form -->
            <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Nouveau courrier</h2>
                    </header>
                    <div class="panel-body">
                        <form id="operaionperform" class="form-horizontal mb-lg" method="post" action="{{action('OperationperController@addoperationper')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />


                               <input type="text" name="N_BORDEREAU_ARRVEE" class="form-control" placeholder="N_BORDEREAU_ARRVEE de l'opération">
                               <input type="text" name="DATE_ARRIVEE" class="form-control" placeholder="DATE_ARRIVEE de l'opération">
                               <input type="text" name="N_BORDEREAU_ENVOI" class="form-control" placeholder="N_BORDEREAU_ENVOI de l'opération">
                               <input type="text" name="DATE_ENVOI" class="form-control" placeholder="DATE_ENVOI de l'opération">
                                                    

                               <input type="text" class="form-control" name="DATE_REMISE" placeholder="DATE_REMISE" required/>

                               <input type="textarea" class="form-control" placeholder="nom" name="nom" required/>
                               <input type="textarea" class="form-control" placeholder="prenom" name="prenom" required/>
                               <input type="textarea" class="form-control" placeholder="cin" name="cin" required/>
                             
                                

                                <select name="categorie" class="form-control mb-md" required>
                                    <option>Selectionner votre Catégorie</option>
                                     @foreach($categorie as $y)
                                         <option value="{{ $y->id }}">{{ $y->nom }}</option>
                                     @endforeach
                                </select>

                                <input type="text" name="DATE_RECEPTION" class="form-control" placeholder="DATE_RECEPTION" required/>

                                <input type="date" name="N_COMMANDE" class="form-control" placeholder="N_COMMANDE" required/>

                                <input type="date" name="N_SERIE" class="form-control" placeholder="N_SERIE" required/>
                            
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" class="mb-xs mt-xs mr-xs btn btn-primary" value="Ajouter">
                                        <input type="submit" class="mb-xs mt-xs mr-xs btn btn-default modal-dismiss" value="Annuler">
                                    </div>
                                </div>
                        </form>
                    </div>
                    <footer class="panel-footer">

                    </footer>
                </section>
            </div>

        </div>
    </section>
</section>
@stop

@section('js')
    <script src="{{asset('assets/vendor/pnotify/pnotify.custom.js')}}"></script>
    <script src="{{asset('assets/javascripts/ui-elements/examples.modals.js')}}"></script>

@stop