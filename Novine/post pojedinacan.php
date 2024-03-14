
<div id="post">
							<div>
								<img src="<?php echo $ROW[Vest_Slika1]?>" style="width: 75px; margin-right: 4px;">
							</div>
							<div>
								<div style="font-weight: bold; color: #0B5345">
									
									<?php echo $ROW['Vest_Naslov']?><br>
								</div>

									<?php echo $ROW['Vest_Tekst1']?><br><br>

								<a href="">Like</a>. 
								<a href="">Dislajk</a> . 
								<a href="">Comment</a> . 
								<span style="color: #999">Broj lajkova: 
									<?php echo " " . $ROW["Vest_BrojLajkova"]?></span> . 
								<span style="color: #999">Broj dislajkova:
									<?php echo " " . $ROW["Vest_BrojDislajkova"]?></span> . 
								<span style="color: #999">Datum:
									<?php echo " " . $ROW["Vest_Datum"]?>
								</span>
							</div>
						</div>