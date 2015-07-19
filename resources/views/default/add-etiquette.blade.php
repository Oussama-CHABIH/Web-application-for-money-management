@extends('default.tiles.master')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendor/pnotify/pnotify.custom.css')}}" />
@stop

@section('contenu')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Gestion des personnel</h2>
    </header>
    <section class="panel">
        <header class="panel-heading">
            <a href="#modalForm" class="modal-with-form btn btn-primary pull-right">Ajouter une personne</a>

            <h2 class="panel-title">Personnel</h2>
        </header>
        <div class="panel-body">
            <section class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table mb-none">
                            <thead>
                            <tr>
                                <th>NOM</th>
                                <th>Prenom</th>
                                <th>Cin</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                           
                            @foreach(\Auth::user()->etiquettes as $one)
                                <tr>                              
                                    <td class="mod{{ $one->id }}">{{ $one->nom }}</td>
                                    <td class="mod{{ $one->id }}">{{ $one->prenom }}</td>
                                    <td class="mod{{ $one->id }}">{{ $one->cin }}</td>
                                    <td class="actions">
                                         <a href="{{ URL::to('editetiquette/'.$one->id) }}" class="modifier" ><i class="fa fa-pencil"></i></a>
                                        <a class="delete-row" href="{{URL::to('/deletetquette/'.$one->id)}}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                               
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
                        <h2 class="panel-title">Nouvelle personne</h2>
                    </header>
                    <div class="panel-body">
                        <form id="etiquetteform" class="form-horizontal mb-lg" method="post" action="{{action('EtiquetteController@addetiquette')}}">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                            <div class="form-group mt-lg">
                                <label class="col-sm-3 control-label">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nom" class="form-control" placeholder="nom d'etiquette" required/>
                                </div>
                                <label class="col-sm-3 control-label">prenom</label>
                                <div class="col-sm-9">
                                    <input type="text" name="prenom" class="form-control" placeholder="nom d'etiquette" required/>
                                </div>
                                <label class="col-sm-3 control-label">cin</label>
                                <div class="col-sm-9">
                                    <input type="text" name="cin" class="form-control" placeholder="nom d'etiquette" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <input type="submit" class="btn btn-primary" value="Ajouter">
                                    <input type="submit" class="btn btn-default modal-dismiss" value="Annuler">
                                </div>
                            </div>
                            <div class="mohammed"></div>
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
<!-- 
    /****************************************************/
    <script type="text/javascript">
        $('.modifier').on('click', function(){
            var id = this.getAttribute("data-id");
            $.get( "{{ URL::to('etiquette') }}/"+ id, function( data ) {
                var nom = data['nom'];
                var id = data['id'];
                $('.mod'+ id).replaceWith('<td class="back"><form id="form" method="post" action="{{ action('EtiquetteController@posteditetiquette') }}">' +
                        '<input type="hidden" name="_token" value="{{ csrf_token() }}" />'+
                        '<input type="hidden" name="id" value="'+id+'"/>'+
                        '<div class="form-group">'+
                        '<input type="text" class="form-control" name="nom"  value="'+ nom +'"/>'+
                        '<div style="margin-top: 5px;">'+
                        '<input type="submit" class="btn btn-danger" value="Modifier">'+
                        '</div>'+
                        '</div>'+
                        '</form></td>'
                );
            });
        });
    </script>
    /******************************************************/ -->
@stop