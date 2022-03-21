<?php
include('header.php');
//print_r($_POST['advs_operator']);

//fetching advanced search result 
$queryCount = 0;
$query = "";
foreach($_POST['advs_query'] as $searchQuery){
    if($queryCount == 0){
        $query = "SELECT * FROM plants, materials, materials_relation WHERE (plants.plant_id=materials_relation.plant_id AND materials.mat_id=materials_relation.mat_id) AND (";
    }else{
        if($_POST['advs_operator'][$queryCount]=='or'){
            $query .= " OR ";
        }elseif($_POST['advs_operator'][$queryCount]=='and'){
            $query .= " AND ";
        }elseif($_POST['advs_operator'][$queryCount]=='not'){
            $query .= " NOT ";
        }
    }
    if($_POST['advs_field'][$queryCount]=='plant_name'){
        //$query .= "(plant_othernames LIKE '%".$_POST['advs_query'][$queryCount]."%' OR ";
        $query .= "";
    }elseif($_POST['advs_field'][$queryCount]=='plant_id'){
        $query .= "plants.";
    }
    $query .= $_POST['advs_field'][$queryCount];
    //if matching criterion is exact and contains
    if($_POST['advs_matching_criterion'][$queryCount]=='='){
        $query .= "='".$_POST['advs_query'][$queryCount]."' ";
    }elseif($_POST['advs_matching_criterion'][$queryCount]=='LIKE'){
        $query .= " LIKE '%".$_POST['advs_query'][$queryCount]."%' ";
    }elseif($_POST['advs_matching_criterion'][$queryCount]=='START'){
        $query .= " LIKE '".$_POST['advs_query'][$queryCount]."%' ";
    }elseif($_POST['advs_matching_criterion'][$queryCount]=='END'){
        $query .= " LIKE '%".$_POST['advs_query'][$queryCount]."' ";
    }

    // if($_POST['advs_field'][$queryCount]=='plant_name'){
    //     $query .= ")";
    // }
    if($_POST['advs_field'][$queryCount]=='plant_name'){
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
                if($_POST['advs_matching_criterion'][$queryCount]=='='){
                    if(strtolower($sub) == strtolower($_POST['advs_query'][$queryCount])){
                        array_push($othernames_matches, [$sub, $item]);
                    }
                }elseif($_POST['advs_matching_criterion'][$queryCount]=='LIKE'){
                    if(strpos(strtolower($sub), strtolower($_POST['advs_query'][$queryCount])) !== false){
                        array_push($othernames_matches, [$sub, $item]);
                    }
                }elseif($_POST['advs_matching_criterion'][$queryCount]=='START'){
                    if(strpos(strtolower($sub), strtolower($_POST['advs_query'][$queryCount])) !== false && strpos(strtolower($sub), strtolower($_POST['advs_query'][$queryCount])) == 0){
                        array_push($othernames_matches, [$sub, $item]);
                    }
                }elseif($_POST['advs_matching_criterion'][$queryCount]=='END'){
                    if(strrpos(strtolower($sub), strtolower($_POST['advs_query'])) !== false && strrpos(strtolower($sub), strtolower($_POST['advs_query'][$queryCount])) == strlen($sub)-strlen($_POST['advs_query'][$queryCount])){
                        array_push($othernames_matches, [$sub, $item]);
                    }
                }
            }
        }
        #print_r($othernames_matches);
        $matches_array = array();
        foreach ($othernames_matches as $match) {
            array_push($matches_array, "plant_othernames='".$match[1]['plant_othernames']."'");
        }
        //print_r($matches_array);
        $query .= " OR ".implode(" OR ", $matches_array);
        $query .= "";
    }

    $queryCount++;
}

$query .= ");";

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
?>

<?php
include('footer.php');
?>