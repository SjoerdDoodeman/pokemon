<html>
	<head>
		<title>Pokémon</title>
		<link rel="stylesheet" href="css.css">
	</head>
	<body>
		<div class="header">
					<form method="POST">
					<div class="title"><img src="English_Pokémon_logo.svg.png" style="height: 100%;"></div>
						<input class="searchbar" type="text" value="" name="searchstring" placeholder="Zoek Pokémon..."/>
					</form>
				</div>
				<div class="main">
					<div class="left-side">
						<?php
							$found = true;
							$id = $_POST["searchstring"];
							
							if(isset($_POST)){
								if($found && $id){
									
									$data = file_get_contents("http://pokeapi.co/api/v1/pokemon/".$id);
									$numlength = strlen((string)$id);
									if($numlength == "1"){$idd = "00".$id;}
									if($numlength == "2"){$idd = "0".$id;}
									if($numlength == "3"){$idd = $id;}
									
									if($data != ""){
										
										$rData = json_decode($data, true);

											echo "<img src='http://assets.pokemon.com/assets/cms2/img/pokedex/full/".$idd.".png'>";
										?>
										</div>
										<div class="right-side">
											<table>
												<tbody>
													<?php 
													echo "<tr><td>Name:</td><td>".$rData['name']."</td></tr>";
													echo "<tr><td>Height:</td><td>".$rData['height']."</td></tr>";
													echo "<tr><td>Weight:</td><td>".$rData['weight']."</td></tr>";
													//echo "<tr><td>Abilities:</td><td>".$rData['weight']."</td></tr>";
												}
												else{
													die("No Pokemon found");
												}
											}
										}
									?>		
								</tbody>
							</table>
						</div>
					</div>
		</div>
	</body>
</html>