<?php
include('header.php');
?>

<div class="container">
    <h1>Advanced Search</h1>

    <form method="post" action="searchresult.php">
        <table class="advs">
            <tr class="advs_row" id="advs_row_1">
                <td>
                    <select name="advs_operator[]" id="advs_operator_1">
                        <option value="or">OR</option>
                        <option value="and">AND</option>
                        <option value="not">NOT</option>
                    </select>
                </td>
                <td>
                    <select name="advs_matching_criterion[]">
                        <option value="=">EXACT</option>
                        <option value="LIKE">CONTAINS</option>
                        <option value="START">START WITH</option>
                        <option value="END">END WITH</option>
                    </select>
                </td>
                <td>
                    <select name="advs_field[]">
                        <option value="plant_id">ID</option>
                        <option value="plant_name">Name</option>
                        <option value="plant_family">Family</option>
                        <option value="plant_genus">Genus</option>
                        <option value="plant_species">Species</option>
                        <option value="mat_desc">Material of interest</option>
                        <option value="plant_usage">Usage</option>
                        <option value="plant_chemconst">Chemical constituent</option>
                    </select>
                </td>
                <td><input name="advs_query[]" type="text"></td>
                <td><div class="advs_removequery" id="advs_removequery_1">-</div></td>
                <td><div class="advs_addquery" id="advs_addquery_1">+</div></td>
                
            </tr>
        </table>
        <input type="submit">
    </form>
</div>

<?php
include('footer.php');
?>