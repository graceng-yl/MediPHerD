<?php
include('header.php');
?>

<div class="container page_content">
    <div class="page_top">
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
                        <option value="contains">CONTAINS</option>
                        <option value="exact">EXACT</option>
                        <option value="start">START WITH</option>
                        <option value="end">END WITH</option>
                    </select>
                </td>
                <td>
                    <select name="advs_field[]">
                        <option value="ALL">All fields</option>
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
                <td><input name="advs_query[]" type="text" placeholder="Search query" required></td>
                <td><div class="advs_button advs_removequery" id="advs_removequery_1">&#8722;</div></td>
                <td><div class="advs_button advs_addquery" id="advs_addquery_1">&#43;</div></td>
                
            </tr>
        </table>
        <div class="advs_form_tail">
            <div class="advs_form_tail_col">
                <input type="submit" id="advs_submit">
            </div>
            <div class="advs_form_tail_col">
                <input type="reset" value="Clear" id="advs_clear">
            </div>
        </div>
    </form>

    <div class="history_section">
        <h2 class="subsection_title">Search History</h2>
        <div class="search_histories">
            <p>Find your 30 days search records here, click to edit the search queries.</p>
<?php
            if(isset($_COOKIE['search_history'])){
                foreach(array_reverse($_COOKIE['search_history']) as $history){
                    echo "<p class='search_history'>".$history."</p>";
                }
            }
?>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>