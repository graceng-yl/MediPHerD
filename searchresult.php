<?php
include('header.php');

//fetching advanced search result 
if(isset($_POST['advs_query_1'])){
    
    //if matching criterion is exact and contains
    if($_POST['advs_matching_criterion_1']=='='){
        $query = "SELECT * FROM plants WHERE ".$_POST['advs_field_1']." = '".$_POST['advs_query_1']."'";
    }elseif($_POST['advs_matching_criterion']=='LIKE'){
        $query = "SELECT * FROM plants WHERE ".$_POST['advs_field_1']." LIKE '%".$_POST['advs_query_1']."%'";
    }elseif($_POST['advs_matching_criterion']=='START'){
        $query = "SELECT * FROM plants WHERE ".$_POST['advs_field_1']." LIKE '".$_POST['advs_query_1']."%'";
    }elseif($_POST['advs_matching_criterion']=='END'){
        $query = "SELECT * FROM plants WHERE ".$_POST['advs_field_1']." LIKE '%".$_POST['advs_query_1']."'";
    }

    if($_POST['advs_field_1']=='plant_name'){
        $query_othernames = "SELECT plant_othernames FROM plants";
        $result_othernames = mysqli_query($conn, $query_othernames);
        $othernames_array = array();
        while($row_othernames = mysqli_fetch_assoc($result_othernames)){
            array_push($othernames_array, $row_othernames);
        }
        #print_r($othernames_array);
        $othernames_matches = array();
        foreach($othernames_array as $item){
            // print_r(explode(",", $item['plant_othernames']));
            // echo "<br>";
            $subitem = explode(",", $item['plant_othernames']);
            foreach($subitem as $sub){
                if($_POST['advs_matching_criterion_1']=='='){
                    if(strtolower($sub) == strtolower($_POST['advs_query_1'])){
                        array_push($othernames_matches, [$sub, $item]);
                    }
                }elseif($_POST['advs_matching_criterion_1']=='LIKE'){
                    if(strpos(strtolower($sub), strtolower($_POST['advs_query_1'])) !== false){
                        array_push($othernames_matches, [$sub, $item]);
                    }
                }elseif($_POST['advs_matching_criterion_1']=='START'){
                    if(strpos(strtolower($sub), strtolower($_POST['advs_query_1'])) !== false && strpos(strtolower($sub), strtolower($_POST['advs_query_1'])) == 0){
                        array_push($othernames_matches, [$sub, $item]);
                    }
                }elseif($_POST['advs_matching_criterion_1']=='END'){
                    if(strrpos(strtolower($sub), strtolower($_POST['advs_query_1'])) !== false && strrpos(strtolower($sub), strtolower($_POST['advs_query_1'])) == strlen($sub)-strlen($_POST['advs_query_1'])){
                        array_push($othernames_matches, [$sub, $item]);
                    }
                }
            }
        }
        #print_r($othernames_matches);
        $matches_array = array();
        foreach ($othernames_matches as $match) {
            array_push($matches_array, "plant_othernames = '".$match[1]['plant_othernames']."'");
        }
        $query = $query." OR ".implode(" OR ", $matches_array).";";
    }

    if(isset($_POST['advs_operator_1'])){

    }else{
        $query = $query.";";
    }

    echo $query."<br>";

    //get result from query, return error if failed
    if(!($result = mysqli_query($conn, $query))){
        echo "<p>Could not execute query</p>";
        die(mysqli_error($conn)."</body.</html>");
    }

    while($row = mysqli_fetch_assoc($result)){
        //test display, to display particular plant_othernames according to search query, use the name stored in $matches_array perhaps?
        echo $row['plant_name']."<br>";
    }
}
?>

<?php
include('footer.php');
?>