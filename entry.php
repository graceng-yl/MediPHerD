<?php include('header.php'); ?>

<?php
$plant_id = $_GET['plant'];

$plants_query = "SELECT * FROM plants WHERE plant_id = '".$plant_id."'";
$materials_query = "SELECT * FROM materials WHERE materials.mat_id IN (SELECT materials_relation.mat_id FROM materials_relation WHERE materials_relation.plant_id = '".$plant_id."')";
$keywords_query = "SELECT * FROM keywords WHERE keywords.keyw_id IN (SELECT keywords_relation.keyw_id FROM keywords_relation WHERE keywords_relation.plant_id = '".$plant_id."')";

$plants_result = mysqli_query($conn, $plants_query) or die(mysqli_error($conn));
$materials_result = mysqli_query($conn, $materials_query) or die(mysqli_error($conn));
$keywords_result = mysqli_query($conn, $keywords_query) or die(mysqli_error($conn));

?>

<?php while ($plant = mysqli_fetch_assoc($plants_result)) { ?>
	<div class="container page_content">
		<div class="page_top" id="epg">
			<h1 class="page_title" id=""><?= $plant["plant_name"] ?><h1>
			<h2 class="page_desc" id="eptd"><?= $plant["plant_othernames"] ?></h2>
		</div>

		<table id="epf">
			<tr>
				<th>				
					<img src="www/<?= $plant["plant_id"]?>.jpg" id="text" alt=<?=$plant["plant_name"] ?> height="300px" object-fit="scale-down"/>
				</th>
				<th>
					<table>
						<tr>
							<th id="eptd" scope="col">Scientific Name: <br />
							&nbsp&nbsp&nbsp<em><b><?= $plant["plant_genus"] ?> <?= $plant["plant_species"] ?></em></b></th>
						</tr>
						<tr>
						
							<th id="eptd" scope="col">Plant Family: <br />
							&nbsp&nbsp&nbsp<b><?= $plant["plant_family"] ?><b></th>
						</tr>						
						<tr>
							<th id="eptd" scope="col">Material of interest: <br />
							&nbsp&nbsp&nbsp<b>
								<?php while ($material = mysqli_fetch_assoc($materials_result)) { 
									$materials[] = $material["mat_desc"];
								}
								?>
								<?= join(", ", $materials) ?></b>					
							</th>
						</tr>
						<tr>
							<td>Keywords: <b>
								<?php
								$keywords = array();
								while ($keyword = mysqli_fetch_assoc($keywords_result)) {
									$keywords[] = $keyword["keyw_desc"];
								}
								?>
								<?= join(", ", $keywords) ?></b>
							</td>
						</tr>
					</table>
				</th>
			</tr>
		</table>
		
		<div id="ep">
			<h2 id="eptd" class="subsection_title">Usage</h2>
			<div id= "cat_d"><p><?= $plant["plant_usage"] ?></p></div>

			<h2 id="eptd" class="subsection_title">Chemical Constituent</h2>
			<div id= "cat_d"><p><?= $plant["plant_chemconst"] ?></p></div>

			<h2 id="eptd" class="subsection_title">References</h2>
			<div id= "cat_d">
				<?php foreach(explode('-MEDIPHERD-', $plant["plant_refs"]) as $ref){ ?>
				<p class='ref_item'><?php echo $ref; ?></p>
				<?php } ?>
			</div>
		</div>
	</div>   
<?php } ?>

<?php include('footer.php'); ?>