<?php

include 'connect.php'; 

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $delete = "delete from add_job where Id = '$id'";
    $result = mysqli_query($conn, $delete);

    if($result) {
        echo '<script>
        var confirmDelete = confirm("Are you sure you want to delete this job post?");
        if (confirmDelete) {
            window.location.href = "delete_job.php?id=' . $id . '";
        } else {
            window.location.href = "job_show.php";
        }
    </script>';


}else{
    echo "Not Deleted";
}

}


?>