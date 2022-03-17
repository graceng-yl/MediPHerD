<?php
include('header.php');
?>

<h1>Advanced Search</h1>

<form method="post" action="searchresult.php">
    <select name="advs_operator">
        <option value="or">OR</option>
        <option value="and">AND</option>
        <option value="not">NOT</option>
    </select>
    <select name="advs_matching_criterion">
        <option value="=">EXACT</option>
        <option value="LIKE">CONTAINS</option>
        <option value="START">START WITH</option>
        <option value="END">END WITH</option>
    </select>
    <select name="advs_field">
        <option value="plant_id">ID</option>
        <option value="plant_name">Name</option>
        <option value="plant_family">Family</option>
        <option value="plant_genus">Genus</option>
        <option value="plant_species">Species</option>
        <option value="mat_desc">Material of interest</option>
        <option value="plant_usage">Usage</option>
        <option value="plant_chemconst">Chemical constituent</option>
    </select>
    <input name="advs_query" type="text">
    
    <input type="submit">
</form>

<?php
include('footer.php');
?>