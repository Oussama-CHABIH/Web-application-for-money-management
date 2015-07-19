@extends('default.tiles.master')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendor/pnotify/pnotify.custom.css')}}" />
@stop

@section('contenu')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Gestion des operations</h2>
    </header>
    <section class="panel">
        <header class="panel-heading">
            <a href="#modalForm" class="modal-with-form btn btn-primary pull-right">Ajouter une operation</a>

            <h2 class="panel-title">Opérations</h2>
        </header>
        <div class="panel-body">
            <section class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table mb-none">
                            <thead>
                            <tr align="center">
                                <th>#</th>
                                <th>Nom</th>
                                <th>type de l'operation </th>
                                <th>Par</th>
                                <th>Montant</th>
                                <th>Etiquette</th>
                                <th>Categorie</th>
                                <th>Date de creation</th>
                                <th>Description</th>
                                <th>Opération epargne</th>

                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody style="color : #000">
                            <?php $i = 1; ?>
                            
                            @foreach($operations as $one)
                               @if( $one->epargne =="oui")
                                <tr style="background-color:#E0E0E0 " align="center" >
                                    <td>{{ $i }}</td>
                                    <td>{{ $one->nom }}</td>
                                    <td>{{ $one->type_dr }}</td>
                                    <td>{{ $one->mode_paiement }}</td>
                                    <td>{{ $one->montant }}</td>
                                   @if(empty($one->etiquette))
                                    <td >sans</td>
                                    @else
                                    <td>{{ $one->etiquette->nom }}</td>
                                    @endif
                                    @if(empty($one->categorie))
                                    <td >sans</td>
                                    @else
                                    <td>{{ $one->categorie->nom}}</td>
                                    @endif
                                    <td>{{ $one->created_at }}</td>
                                    <td>{{ $one->description }}</td>
                                    <td>{{ $one->epargne }}</td>
                                    <td class="actions">
                                        <a href="{{ URL::to('editoperation/'.$one->id) }}" class="modifier" ><i class="fa fa-pencil"></i></a>
                                        <a class="delete-row" href="{{URL::to('/deleteoperation/'.$one->id)}}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                
                                @else
                                <tr style="background-color:#00FFFF" align="center">
                                    <td>{{ $i }}</td>
                                    <td>{{ $one->nom }}</td>
                                    <td>{{ $one->type_dr }}</td>
                                    <td>{{ $one->mode_paiement }}</td>
                                    <td>{{ $one->montant }}</td>
                                    @if(empty($one->etiquette))
                                    <td >sans</td>
                                    @else
                                    <td>{{ $one->etiquette->nom }}</td>
                                    @endif
                                    @if(empty($one->categorie))
                                    <td >sans</td>
                                    @else
                                    <td>{{ $one->categorie->nom}}</td>
                                    @endif
                                    <td>{{ $one->created_at }}</td>
                                    <td>{{ $one->description }}</td>
                                    <td>{{ $one->epargne }}</td>
                                    <td class="actions">
                                        <a href="{{ URL::to('editoperation/'.$one->id) }}" class="modifier" ><i class="fa fa-pencil"></i></a>
                                        <a class="delete-row" href="{{URL::to('/deleteoperation/'.$one->id)}}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endif
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
                        <h2 class="panel-title">Nouvelle operation</h2>
                    </header>
                    <div class="panel-body">
                        <form id="operationform" class="form-horizontal mb-lg" method="post" action="{{action('OperationController@addoperation')}}">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                            <input type="text" name="nom" class="form-control" placeholder="Nom de l'opération" required/>
                                
                               <div class="row" required>
                                  <p class="col-md-4">Type de paiement</p>
                                  <div class="radio col-md-4" >
                                    <label>
                                      <input type="radio"  value="depense" id="optionsRadios1" name="type_dr">
                                      Depense
                                    </label>
                                  </div>
                                  <div class="radio col-md-4">
                                    <label>
                                      <input type="radio" value="revenue" id="optionsRadios2" name="type_dr">
                                      Revenue
                                    </label>
                                  </div>
                                </div>

                                <div class="row">
                                  <p class="col-md-4">Mode de paiement</p>
                                  <div class="radio col-md-4">
                                    <label>
                                      <input type="radio"  value="bank" id="optionsRadios1" name="mode_paiement">
                                      Banque
                                    </label>
                                  </div>
                                  <div class="radio col-md-4">
                                    <label>
                                      <input type="radio" value="poche" id="optionsRadios2" name="mode_paiement">
                                      Poche
                                    </label>
                                  </div>
                                </div>

                                <div class="row">
                                  <p class="col-md-4">Opération epargne</p>
                                  <div class="radio col-md-4">
                                    <label>
                                      <input type="radio"  value="oui" id="optionsRadios1" name="epargne">
                                      Oui
                                    </label>
                                  </div>
                                  <div class="radio col-md-4">
                                    <label>
                                      <input type="radio" value="non" id="optionsRadios2" name="epargne" checked>
                                      Non
                                    </label>
                                  </div>
                                </div>

                               <input type="text" class="form-control" name="montant" placeholder="Montant" required/><br>

                               <input type="textarea" class="form-control" placeholder="Description" name="description" required/><br>
                             
                                <select name="etiquette" class="form-control mb-md" required>
                                    <option>Selectionner votre étiquette</option>
                                     @foreach($etiquette as $x)
                                         <option value="{{ $x->id }}">{{ $x->nom }}</option>
                                     @endforeach
                                </select>

                                <select name="categorie" class="form-control mb-md" required>
                                    <option>Selectionner votre Catégorie</option>
                                     @foreach($categorie as $y)
                                         <option value="{{ $y->id }}">{{ $y->nom }}</option>
                                     @endforeach
                                </select>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <input type="submit" class="btn btn-primary" value="Ajouter">
                                    <input type="submit" class="btn btn-default modal-dismiss" value="Annuler">
                                </div>
                            </div>
                            <div class="oussama"></div>
                        </form>
                    </div>
                    <footer class="panel-footer">

                    </footer>
                </section>
            </div>
            <span class="rien"></span>
        </div>
    </section>
</section>
@stop

@section('js')
    <script src="{{asset('assets/vendor/pnotify/pnotify.custom.js')}}"></script>
    <script src="{{asset('assets/javascripts/ui-elements/examples.modals.js')}}"></script>
@stop
