@extends('layouts.app')

@section('content')

<div id="title">Juego del Blackjack</div>
		<div id="canvasDiv"><canvas id="canvas"></canvas></div>
		<div id="botones">
			<input type="button" value="Pedir Carta" onclick="pedirCarta()" id="pedir" class="button" >
			<input type="button" value="Jugar otra vez!" id="reset" onclick="playagain()" >
			<input type="button" value="Plantarme" onclick="plantarme()" id="plantar" class="button" >
		</div>
		<div id="info"></div>
		<script src="js/blackjack.js"></script>
  
  

@endsection