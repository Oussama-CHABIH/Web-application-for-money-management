<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8">
</head>
<body>
<div style="width:80%;margin:0 auto;">
    <img src="{{ asset('logo.jpg') }}" align="right" ><br><br><br><br><br>
    <p>Nom: <span>{{ $nom }}</span></p>
	<p>Prénom: <span>{{ $prenom }}</span></p>
	<p>Email: <span>{{ $email }}</span></p>
	<h1 align="center" style="color : red"> Informations personnelle </h1>
     <h2 align="center">Liste des solde </h2>
	<table border="1" style="width:80%;margin:0 auto;">
		<tr>
			<td>Solde totale</td>
	        <td>Solde bancaire</td> 
	        <td>Solde poche</td>
	        <td>Solde epargne</td>
		</tr>

        <tr>
			<td>{{ $solde_totale }}</td>
	        <td>{{ $soldebancaire }}</td>
	        <td>{{ $solde_poche }}</td>
	        <td>{{ $compteepargne['solde_epargne'] }}</td>
		</tr>
	</table>
	<br><br><br>
	<h2 align="center">Liste des opérations périodiques</h2>
	<table border="1" style="width:80%;margin:0 auto;">
		<tr>
			<td>Nom de l'opéeration</td>
			<td>Type de l'opération</td>
			<td>Etiquette</td>
			<td>Categorie</td>
			<td>Montant</td>
			<td>Fréquence</td>
			<td>date de debut</td>
			<td>Date de fin</td>
		</tr>
        @foreach($operationpers as $one)
            <tr>
                <td>{{ $one['nom'] }}</td>
                <td>{{ $one['type_dr'] }}</td>
                @if(empty(App\Models\Etiquette::find($one['etiquette_id'])))
			    <td>sans etiquette</td>
			    @else
			    <td>{{ App\Models\Etiquette::find($one['etiquette_id'])->nom }}</td>
			    @endif
			    @if(empty(App\Models\Categorie::find($one['categorie_id'])))
			    <td>sans categorie</td>
			    @else
			    <td>{{ App\Models\Categorie::find($one['categorie_id'])->nom }}</td>
			    @endif
                <td>{{ $one['montant'] }}</td>
                <td>{{ $one['frequence'] }}</td>
                <td>{{ $one['date_d'] }}</td>
                <td>{{ $one['date_f'] }}</td>
            </tr>
        @endforeach
	</table><br><br>
    <h2 align="center">Liste des opérations </h2>
	<table border="1" style="width:80%;margin:0 auto;">
		<tr>
			<td>Nom de l'opéeration</td>
			<td>Type de l'opération</td>
			<td>Opération epargne</td>
			<td>Etiquette</td>
			<td>Categorie</td>
			<td>Montant</td>
			<td>Date de création</td>
		</tr>
        @foreach($operations as $one)
        @if($one['epargne']=="oui")
        <tr style="background-color:#E0E0E0 ">
			<td>{{ $one['nom'] }}</td>
			<td>{{ $one['type_dr'] }}</td>
			<td>{{ $one['epargne'] }}</td>
			@if(empty(App\Models\Etiquette::find($one['etiquette_id'])))
			<td>sans etiquette</td>
			@else
			<td>{{ App\Models\Etiquette::find($one['etiquette_id'])->nom }}</td>
			@endif
			@if(empty(App\Models\Categorie::find($one['categorie_id'])))
			<td>sans categorie</td>
			@else
			<td>{{ App\Models\Categorie::find($one['categorie_id'])->nom }}</td>
			@endif
			<td>{{ $one['montant'] }}</td>
			<td>{{ $one['created_at'] }}</td>
		</tr>
		@else
		<tr style="background-color:#00FFFF">
			<td>{{ $one['nom'] }}</td>
			<td>{{ $one['type_dr'] }}</td>
			<td>{{ $one['epargne'] }}</td>
			@if(empty(App\Models\Etiquette::find($one['etiquette_id'])))
			<td>sans etiquette</td>
			@else
			<td>{{ App\Models\Etiquette::find($one['etiquette_id'])->nom }}</td>
			@endif
			@if(empty(App\Models\Categorie::find($one['categorie_id'])))
			<td>sans categorie</td>
			@else
			<td>{{ App\Models\Categorie::find($one['categorie_id'])->nom }}</td>
			@endif
			<td>{{ $one['montant'] }}</td>
			<td>{{ $one['created_at'] }}</td>
		</tr>
		@endif
        @endforeach
	</table>
</div>
</body>
</html>