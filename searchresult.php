<?php
include('header.php');
?>

<div class="container page_content">
    <div class="page_top">
        <h1 class="page_title">Search Result</h1>

<?php
        $query = "";
        $searchString = "";
        $searchHist = "";

        //advanced search result 
        if(isset($_POST['advs_query'])){
            $queryCount = 0;
            
            foreach($_POST['advs_query'] as $searchQuery){ //in all advanced search rows
                //before each query
                if($queryCount == 0){
                    // if first searched query, sql query start with select from ...
                    $query = "SELECT * FROM plants WHERE ";
                }else{
                    // queries other than first one, add corresponding operator
                    if($_POST['advs_operator'][$queryCount]=='or'){
                        $query .= " OR ";
                        $searchString .= " OR ";
                        $searchHist .= ";;OR;";
                    }elseif($_POST['advs_operator'][$queryCount]=='and'){
                        $query .= " AND ";
                        $searchString .= " AND ";
                        $searchHist .= ";;OR;";
                    }elseif($_POST['advs_operator'][$queryCount]=='not'){
                        $query .= " AND NOT ";
                        $searchString .= " NOT ";
                        $searchHist .= ";;NOT;";
                    }
                }

                // if searched field is plant name, add open bracket
                if($_POST['advs_field'][$queryCount]=='plant_name'){
                    $query .= "(";
                }

                if($_POST['advs_field'][$queryCount]=='mat_desc'){
                    // if field is material, get plant_id from the inner joined materials tables
                    $query .= "plant_id IN (SELECT plant_id from materials, materials_relation WHERE materials.mat_id=materials_relation.mat_id AND mat_desc";
                }elseif($_POST['advs_field'][$queryCount]=='ALL'){
                    // if field is all, do ntg
                    $query .= "";
                }
                else{
                    // other fields, use only the field searched
                    $query .= $_POST['advs_field'][$queryCount];
                }

                if($_POST['advs_field'][$queryCount]!='ALL'){
                    // if not all fields, add the corresponding matching criteria and query to search
                    if($_POST['advs_matching_criterion'][$queryCount]=='exact'){
                        $query .= "='".$_POST['advs_query'][$queryCount]."' ";
                    }elseif($_POST['advs_matching_criterion'][$queryCount]=='contains'){
                        $query .= " LIKE '%".$_POST['advs_query'][$queryCount]."%' ";
                    }elseif($_POST['advs_matching_criterion'][$queryCount]=='start'){
                        $query .= " LIKE '".$_POST['advs_query'][$queryCount]."%' ";
                    }elseif($_POST['advs_matching_criterion'][$queryCount]=='end'){
                        $query .= " LIKE '%".$_POST['advs_query'][$queryCount]."' ";
                    }
                }else{
                    //if all fields, add sql query to search in all columns
                    if($_POST['advs_matching_criterion'][$queryCount]=='exact'){
                        $query .= "(plant_id IN (SELECT plant_id from materials, materials_relation WHERE materials.mat_id=materials_relation.mat_id AND mat_desc='".$_POST['advs_query'][$queryCount]."') OR plant_id='".$_POST['advs_query'][$queryCount]."' OR plant_name='" .$_POST['advs_query'][$queryCount]."' OR plant_othernames='".$_POST['advs_query'][$queryCount]."' OR plant_family='".$_POST['advs_query'][$queryCount]."' OR plant_genus='".$_POST['advs_query'][$queryCount]."' OR plant_species='".$_POST['advs_query'][$queryCount]."' OR plant_chemconst='".$_POST['advs_query'][$queryCount]."' OR plant_usage='".$_POST['advs_query'][$queryCount]."')";
                    }elseif($_POST['advs_matching_criterion'][$queryCount]=='contains'){
                        $query .= "(plant_id IN (SELECT plant_id from materials, materials_relation WHERE materials.mat_id=materials_relation.mat_id AND mat_desc LIKE '%".$_POST['advs_query'][$queryCount]."%') OR plant_id LIKE '%".$_POST['advs_query'][$queryCount]."%' OR plant_name LIKE '%".$_POST['advs_query'][$queryCount]."%' OR plant_othernames LIKE '%".$_POST['advs_query'][$queryCount]."%' OR plant_family LIKE '%".$_POST['advs_query'][$queryCount]."%' OR plant_genus LIKE '%".$_POST['advs_query'][$queryCount]."%' OR plant_species LIKE '%".$_POST['advs_query'][$queryCount]."%' OR plant_chemconst LIKE '%".$_POST['advs_query'][$queryCount]."%' OR plant_usage LIKE '%".$_POST['advs_query'][$queryCount]."%')";
                    }elseif($_POST['advs_matching_criterion'][$queryCount]=='start'){
                        $query .= "(plant_id IN (SELECT plant_id from materials, materials_relation WHERE materials.mat_id=materials_relation.mat_id AND mat_desc LIKE '".$_POST['advs_query'][$queryCount]."%') OR plant_id LIKE '".$_POST['advs_query'][$queryCount]."%' OR plant_name LIKE '".$_POST['advs_query'][$queryCount]."%' OR plant_othernames LIKE '".$_POST['advs_query'][$queryCount]."%' OR plant_family LIKE '".$_POST['advs_query'][$queryCount]."%' OR plant_genus LIKE '".$_POST['advs_query'][$queryCount]."%' OR plant_species LIKE '".$_POST['advs_query'][$queryCount]."%' OR plant_chemconst LIKE '".$_POST['advs_query'][$queryCount]."%' OR plant_usage LIKE '".$_POST['advs_query'][$queryCount]."%')";
                    }elseif($_POST['advs_matching_criterion'][$queryCount]=='end'){
                        $query .= "(plant_id IN (SELECT plant_id from materials, materials_relation WHERE materials.mat_id=materials_relation.mat_id AND mat_desc LIKE '%".$_POST['advs_query'][$queryCount]."') OR plant_id LIKE '%".$_POST['advs_query'][$queryCount]."' OR plant_name LIKE '%".$_POST['advs_query'][$queryCount]."' OR plant_othernames LIKE '%".$_POST['advs_query'][$queryCount]."' OR plant_family LIKE '%".$_POST['advs_query'][$queryCount]."' OR plant_genus LIKE '%".$_POST['advs_query'][$queryCount]."' OR plant_species LIKE '%".$_POST['advs_query'][$queryCount]."' OR plant_chemconst LIKE '%".$_POST['advs_query'][$queryCount]."' OR plant_usage LIKE '%".$_POST['advs_query'][$queryCount]."')";
                    }
                    
                }

                // check again if search field is material description, add the closing bracket
                if($_POST['advs_field'][$queryCount]=='mat_desc'){
                    $query .= ")";
                }
                    
                // if the field search is plant name, retrieve result from plant_othernames as well
                if($_POST['advs_field'][$queryCount]=='plant_name'){
                    //get all plant other names
                    $query_othernames = "SELECT plant_othernames FROM plants";
                    $result_othernames = mysqli_query($conn, $query_othernames);
                    $othernames_array = array(); //make all other names into a nested array
                    while($row_othernames = mysqli_fetch_assoc($result_othernames)){
                        array_push($othernames_array, $row_othernames);
                    }

                    $othernames_matches = array();
                    // compare each other name
                    foreach($othernames_array as $item){ 
                        $subitem = explode(",", $item['plant_othernames']); //in each entry, split the othernames
                        foreach($subitem as $sub){ // compare each othername one by one following matching criterion
                            if($_POST['advs_matching_criterion'][$queryCount]=='exact'){
                                //if match, add the whole plant_othernames for the entry to the matches array
                                if(strtolower($sub) == strtolower($_POST['advs_query'][$queryCount])){ 
                                    array_push($othernames_matches, [$sub, $item]);
                                }
                            }elseif($_POST['advs_matching_criterion'][$queryCount]=='contains'){
                                if(strpos(strtolower($sub), strtolower($_POST['advs_query'][$queryCount])) !== false){
                                    array_push($othernames_matches, [$sub, $item]);
                                }
                            }elseif($_POST['advs_matching_criterion'][$queryCount]=='start'){
                                if(strpos(strtolower($sub), strtolower($_POST['advs_query'][$queryCount])) !== false && strpos(strtolower($sub), strtolower($_POST['advs_query'][$queryCount])) == 0){
                                    array_push($othernames_matches, [$sub, $item]);
                                }
                            }elseif($_POST['advs_matching_criterion'][$queryCount]=='end'){
                                if(strrpos(strtolower($sub), strtolower($_POST['advs_query'][$queryCount])) !== false && strrpos(strtolower($sub), strtolower($_POST['advs_query'][$queryCount])) == strlen($sub)-strlen($_POST['advs_query'][$queryCount])){
                                    array_push($othernames_matches, [$sub, $item]);
                                }
                            }
                        }
                    }
                    //convert the matches into sql queries
                    $matches_array = array();
                    foreach ($othernames_matches as $match) {
                        array_push($matches_array, "plant_othernames='".$match[1]['plant_othernames']."'");
                    }
                    // for each matched other name, add the OR clause to the sql query
                    $query .= " OR ".implode(" OR ", $matches_array);
                    // close the bracket for plant name searched field
                    $query .= ")";
                }
                $searchString .= $_POST['advs_query'][$queryCount]." [".$_POST['advs_field'][$queryCount].", ".$_POST['advs_matching_criterion'][$queryCount]."]";
                $searchHist .= $_POST['advs_matching_criterion'][$queryCount].";".$_POST['advs_field'][$queryCount].";".$_POST['advs_query'][$queryCount];

                $queryCount++; // go to next searched row
            }
            // end the sql query
            $query .= ";";
            
        }
            
        //simple search on navigation bar
        elseif(isset($_POST['nav-search'])){
            $searchvalue = $_POST['nav-search'];
            $query = "SELECT * FROM plants WHERE plant_id IN (SELECT plant_id from materials, materials_relation WHERE materials.mat_id=materials_relation.mat_id AND mat_desc LIKE '%" . $searchvalue . "%') OR plants.plant_species LIKE '%" . $searchvalue . "%' OR plants.plant_id LIKE '%" . $searchvalue . "%' OR plants.plant_name LIKE '%" . $searchvalue ."%' OR plants.plant_othernames LIKE '%" . $searchvalue . "%' OR plants.plant_family LIKE '%" . $searchvalue . "%' OR plants.plant_genus LIKE '%" . $searchvalue . "%' OR plants.plant_species LIKE '%"  . $searchvalue . "%' OR plants.plant_chemconst LIKE '%" . $searchvalue . "%' OR plants.plant_usage LIKE '%" . $searchvalue . "%'";
            $searchString = $searchvalue." [ALL, contains]";
            $searchHist = $searchvalue.";ALL;contains;";
        }
        // simple search on homepage section
        elseif(isset($_POST['homepage-search'])){ 
            $searchvalue = $_POST['homepage-search'];
            $query = "SELECT * FROM plants WHERE plant_id IN (SELECT plant_id from materials, materials_relation WHERE materials.mat_id=materials_relation.mat_id AND mat_desc LIKE '%" . $searchvalue . "%') OR plants.plant_species LIKE '%" . $searchvalue . "%' OR plants.plant_id LIKE '%" . $searchvalue . "%' OR plants.plant_name LIKE '%" . $searchvalue ."%' OR plants.plant_othernames LIKE '%" . $searchvalue . "%' OR plants.plant_family LIKE '%" . $searchvalue . "%' OR plants.plant_genus LIKE '%" . $searchvalue . "%' OR plants.plant_species LIKE '%"  . $searchvalue . "%' OR plants.plant_chemconst LIKE '%" . $searchvalue . "%' OR plants.plant_usage LIKE '%" . $searchvalue . "%'";
            $searchString = $searchvalue." [ALL, contains]";
            $searchHist = $searchvalue.";ALL;contains;";
        }

        // $history = array($searchString, $query);
        if(isset($_COOKIE['search_history'])){
            setcookie('search_history['.count($_COOKIE['search_history']).']', $searchHist, time()+60*60*24*30);
        }else{
            setcookie('search_history[0]', $searchHist, time()+60*60*24*30);
        }
        
        //check query content
        //if there is query, send it to database to get result
        if($query !=""){
            //echo $query."<br>";
            //get result from query, return error if failed
            if(!($result = mysqli_query($conn, $query))){
                echo "<p>Could not execute query</p>";
                die(mysqli_error($conn)."</body.</html>");
            }

            // Return the number of rows in result set
            $rowcount=mysqli_num_rows($result);
            echo "<p class='page_desc'>". $rowcount . " records found for '" . $searchString . "'</p>";

            while($row = mysqli_fetch_assoc($result)){
                // TEST DISPLAY
                echo $row['plant_name']."<br>";
            }
        }else{
            //print no search query found message
        }
?>
    </div>
</div>

<?php
include('footer.php');
?>
