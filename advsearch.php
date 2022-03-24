<?php
include('header.php');
?>

<div class="container page_content">
    <div class="advs_page_top">
        <h1 class="page_title">Advanced Search</h1>
        <p class="page_desc">Customize your search here by specificing the fields and matching criteria of your queries</p>
    </div>

    <form method="post" action="searchresult.php" id="advs_form">
        <table id="advs">
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
                <td><input name="advs_query[]" type="text" placeholder="Search query"></td>
                <td><div class="advs_button advs_removequery" id="advs_removequery_1">&#8722;</div></td>
                <td><div class="advs_button advs_addquery" id="advs_addquery_1">&#43;</div></td>
                
            </tr>
        </table>
        <input type="submit" id="advs_submit">
    </form>
</div>

<?php
include('footer.php');
?>