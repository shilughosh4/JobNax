<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $candidateId = intval($_POST['id']);

    $sql = "select cd.*,ced.*,cex.*,ajp.*,jp.* from apply_job_post ajp
            inner join candidate_details cd on cd.Can_id = ajp.Candidate_id
            inner join candidate_education ced on ced.Candidate_id = ajp.Candidate_id
            inner join candidate_experience cex on cex.Can_id = ajp.Candidate_id
            inner join add_job jp on jp.Id = ajp.Job_id where ajp.Candidate_id = '$candidateId'";

    $result = $conn->query($sql);

    if ($total = $result->fetch_assoc()) {
        echo "<div class='container'>
                <div class='row'>
                    <div class='col-4'>
                        <img src='candidate_photo/" . htmlspecialchars($total['Candidate_photo']) . "' class='rounded-circle' alt='candidate photo' height='90'>
                    </div>
                    <div class='col-8 px-2'>
                        <h6 style='font-size:18px;'> Name : " . htmlspecialchars($total['Can_Name']) . "</h6>
                        <h6 style='font-size:18px;'> Date of Birth : " . htmlspecialchars($total['DOB']) . "</h6>
                        <h6 style='font-size:18px;'> Gender : " . htmlspecialchars($total['Can_Gender']) . "</h6>
                        <h6 style='font-size:18px;'> Email : " . htmlspecialchars($total['Can_Email']) . "</h6>
                        <h6 style='font-size:18px;'> Phone : " . htmlspecialchars($total['Phone']) . "</h6>
                        <h6 style='font-size:18px;'> Address : " . htmlspecialchars($total['Address']) . "</h6>
                        <h6 style='font-size:18px;'> City : " . htmlspecialchars($total['City']) . "</h6>
                        <h6 style='font-size:18px;'> State : " . htmlspecialchars($total['State']) . "</h6>
                        <h4 style='color:lime;'>Qualifications</h4>

                        <h6 style='font-size:18px;'> Education 1 : " . htmlspecialchars($total['First_Education_type']) . "</h6>
                        <h6 style='font-size:18px;'> School/College : " . htmlspecialchars($total['First_Clg_name']) . "</h6>
                        <h6 style='font-size:18px;'> Stream : " . htmlspecialchars($total['First_stream']) . "</h6>
                        <h6 style='font-size:18px;'> Passout : " . htmlspecialchars($total['First_year_of_passing']) . "</h6>
                        <h6 style='font-size:18px;'> Percentage : " . htmlspecialchars($total['First_percentage']) . "</h6>
                        <h6 style='font-size:18px;'> CGPA : " . htmlspecialchars($total['First_CGPA']) . "</h6><br/>

                        <h6 style='font-size:18px;'> Education 2 : " . htmlspecialchars($total['Second_Education_type']) . "</h6>
                        <h6 style='font-size:18px;'> School/College : " . htmlspecialchars($total['Second_Clg_name']) . "</h6>
                        <h6 style='font-size:18px;'> Stream : " . htmlspecialchars($total['Second_stream']) . "</h6>
                        <h6 style='font-size:18px;'> Passout : " . htmlspecialchars($total['Second_year_of_passing']) . "</h6>
                        <h6 style='font-size:18px;'> Percentage : " . htmlspecialchars($total['Second_percentage']) . "</h6>
                        <h6 style='font-size:18px;'> CGPA : " . htmlspecialchars($total['Second_CGPA']) . "</h6><br/>

                        <h6 style='font-size:18px;'> Education 3 : " . htmlspecialchars($total['Third_Education_type']) . "</h6>
                        <h6 style='font-size:18px;'> School/College : " . htmlspecialchars($total['Third_Clg_name']) . "</h6>
                        <h6 style='font-size:18px;'> Stream : " . htmlspecialchars($total['Third_stream']) . "</h6>
                        <h6 style='font-size:18px;'> Passout : " . htmlspecialchars($total['Third_year_of_passing']) . "</h6>
                        <h6 style='font-size:18px;'> Percentage : " . htmlspecialchars($total['Third_percentage']) . "</h6>
                        <h6 style='font-size:18px;'> CGPA : " . htmlspecialchars($total['Thirde_CGPA']) . "</h6><br/>

                        <h6 style='font-size:18px;'> Education 4 : " . htmlspecialchars($total['Four_Education_type']) . "</h6>
                        <h6 style='font-size:18px;'> School/College : " . htmlspecialchars($total['Four_Clg_name']) . "</h6>
                        <h6 style='font-size:18px;'> Stream : " . htmlspecialchars($total['Four_stream']) . "</h6>
                        <h6 style='font-size:18px;'> Passout : " . htmlspecialchars($total['Four_year_of_passing']) . "</h6>
                        <h6 style='font-size:18px;'> Percentage : " . htmlspecialchars($total['Four_percentage']) . "</h6>
                        <h6 style='font-size:18px;'> CGPA : " . htmlspecialchars($total['Four_CGPA']) . "</h6><br/>

                        <h4 style='color:lime;'>Experience</h4>

                        <h6 style='font-size:18px;'> Employment Name : " . htmlspecialchars($total['Employment_Name']) . "</h6>
                        <h6 style='font-size:18px;'> Employment Type : " . htmlspecialchars($total['Employment_type']) . "</h6>
                        <h6 style='font-size:18px;'> Company Name : " . htmlspecialchars($total['Company_name']) . "</h6>
                        <h6 style='font-size:18px;'> Start Date : " . htmlspecialchars($total['Start_Date']) . "</h6>
                        <h6 style='font-size:18px;'> End Date : " . htmlspecialchars($total['End_Date']) . "</h6>
                        <h6 style='font-size:18px;'> CTC(per month) : " . htmlspecialchars($total['CTC']) . "</h6><br/>

                        <h6 style='font-size:18px;'> Skills : " . htmlspecialchars($total['Can_Skills']) . "</h6><br/>
                        <h6 style='font-size:18px;'> Resume/CV: <a href='files/" . htmlspecialchars($total['Resume']) . "' target='_blank'>View</a></h6>
                        <h6 style='font-size:18px;'> Applied On : " . htmlspecialchars($total['Applied']) . "</h6>
                    </div>
                </div>
            </div>";
    } else {
        echo "No details found for the selected candidate.";
    }

    mysqli_close($conn);
}
?>
