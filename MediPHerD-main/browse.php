<?php
include('header.php');

$query = "SELECT * FROM plants;";
if(!($result = mysqli_query($conn, $query))){
    echo "<p>Could not execute query</p>";
    die(mysqli_error($conn)."</body.</html>");
}

?>
<div class="container page_content">
    <div class="page_top">
        <h1 class="page_title">Browse Database</h1>
    </div>

    <table class="plant_table">
        <thead>
            <tr><th>ID</th><th>Scientific Name</th><th>Family</th><th>Common Name</th><th>Usage</th></tr>
        </thead>
        <tbody>
<?php
            while($row = mysqli_fetch_assoc($result)){
?>
                <tr id="<?php echo $row['plant_id']; ?>">
                    <td><?php echo $row['plant_id']; ?></td>
                    <td><i><?php echo $row['plant_genus']." ".$row['plant_species']; ?></i></td>
                    <td><?php echo $row['plant_family']; ?></td>
                    <td><?php echo $row['plant_name'].", ".$row['plant_othernames']; ?></td>
                    <td><?php echo preg_replace('/((\w+\W*){'.(20-1).'}(\w+))(.*)/', '${1}...', $row['plant_usage']); ?></td>
                </tr>
<?php
            }
?>
        </tbody>
    </table>
</div>
<?php
include('footer.php');
?>