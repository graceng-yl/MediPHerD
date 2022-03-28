<?php include('header.php'); ?>

<?php

$plants_query = "SELECT * FROM plants WHERE plant_id = 'P001'";
$materials_query = "SELECT * FROM materials WHERE materials.mat_id IN (SELECT materials_relation.mat_id FROM materials_relation WHERE materials_relation.plant_id = 'P001')";
$keywords_query = "SELECT * FROM keywords WHERE keywords.keyw_id IN (SELECT keywords_relation.keyw_id FROM keywords_relation WHERE keywords_relation.plant_id = 'P001')";

$plants_result = mysqli_query($conn, $plants_query) or die(mysqli_error($conn));
$materials_result = mysqli_query($conn, $materials_query) or die(mysqli_error($conn));
$keywords_result = mysqli_query($conn, $keywords_query) or die(mysqli_error($conn));

?>

<style>
table, th, td {
  border-collapse: collapse;
}
th, td {
  padding-top: 10px;
  padding-bottom: 5px;
  padding-left: 30px;
  padding-right: 30px;
}
</style>

<?php while ($plant = mysqli_fetch_assoc($plants_result)) { ?>
<div class="container py-5" id="ep">
	<div class="page_top" id="ep">
	<table>
		<h1 class="page_title" id="ep_titl"><?= $plant["plant_name"] ?><h1>
		<h2 class="page_desc" id="eptd"><?= $plant["plant_othernames"] ?></h2>

		<br />
		</div>
		<table>
			<tr padding= 15px>
				<th>
					<img src="www/Tongkat_Ali.jpg" height="300px" object-fit="scale-down"/>
				</th>
				<th>
					<table>
						<tr>
							<th id="eptd" scope="col">Scientific Name: <br />
							<em><b><?= $plant["plant_genus"] ?> <?= $plant["plant_species"] ?></em></b></th>
						</tr>
						<tr>
							<th id="eptd" scope="col">Plant Family: <br />
							<em><b><button id="family"><?= $plant["plant_family"] ?></button></em><b></th>
								/*<script type="text/javascript">
									document.getElementById("family").onclick = function () {
										location.href = "localhost/MediPHerD-main/entry.php?plant=[plant_id]";
									};
								</script>*/
						</tr>						
						<tr>
							<th id="eptd" scope="col">Material: <br />
								<b><?php while ($material = mysqli_fetch_assoc($materials_result)) { ?>
									<?= $material["mat_desc"] ?>
								<?php } ?></b>						
							</th>
						</tr>
						<tr>
							<td colspan="2">
								<?php
								$keywords = array();
								while ($keyword = mysqli_fetch_assoc($keywords_result)) {
									$keywords[] = $keyword["keyw_desc"];
								}
								?>
								<?= join(", ", $keywords) ?>
							</td>
						</tr>
					</table>
				</th>
			</tr>
		</table>
		</div>
		
		<div id="ep">
			<h2 id="eptd" class="subsection_title">Usage</h2>
			<div id= "cat_d"><p><?= $plant["plant_usage"] ?></p></div>

			<h2 id="eptd" class="subsection_title">Chemical Constituent</h2>
			<div id= "cat_d"><p><?= $plant["plant_chemconst"] ?></p></div>

			<h2 id="eptd" class="subsection_title">References</h2>
			<div id= "cat_d"><p><?= $plant["plant_refs"] ?></p></div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col">
					1 of 2
				</div>
				<div class="col">
					2 of 2
				</div>
			</div>
		</div>
		
	</table>
	</div>
</div>   
<?php } ?>

<?php include('footer.php'); ?>