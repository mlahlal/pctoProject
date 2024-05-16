<?php
    require_once("db.php");

    
    function getNewBusiness() {
        $sql = "SELECT * FROM business WHERE created_at >= '2024-05-01' LIMIT 10";
        $data = [];
        $result = query($sql, $data);
        return $result;
    }

    function getTrendBusiness() {
	    $sql = "SELECT DISTINCT * FROM analytic JOIN business ON analytic.id_business = business.id_business WHERE analytic.id_school = 'idschool' AND analytic.created_at >= '2024-05-01' ORDER BY analytic.created_at DESC";
        $result = query($sql, $data);
        return $result;
    }

    function searchBusiness() {
        $searchtxt = $_POST["search"];
        $regione = $_POST["regione"];
        $provincia = $_POST["provincia"];
        // $query = "SELECT * FROM business WHERE field = '".$_POST["search"]."' AND regione = '".$_POST["regione"]."' AND provincia = '".$_POST["provincia"]."'";
        $sql = "SELECT * FROM business WHERE MATCH (field) AGAINST (?) AND region = ? AND provice = ?";
        $data = [$searchtxt, $regione, $provincia];
        try {
            $result = query($sql, $data);
        } catch (\Throwable $th) {
            return $th;
        }
        header('Content-Type: application/json');
        return json_encode($result);
    }

    function getProjects() {
        $sql = "SELECT * FROM project WHERE id_business = ?";
        $data = [$_POST["id_business"]];
        $result = query($sql, $data);
        header('Content-Type: application/json');
        return json_encode($result);
    }

    function postApply() {
        $sql = "INSERT INTO requests (accepted, id_project, id_user) VALUES (false, ?, ?)"; // bisogna aggiungere la richiesta di pcto dello studente all'azienda che vuole
        $data = [$_POST["id_project"], $_POST["id_user"]];
        $result = query($sql, $data);
        header('Content-Type: application/json');
        return json_encode($result);
    }

    function getRequests() {
        $sql = "SELECT *, IF(accepted, 'true', 'false') accepted_bool FROM requests JOIN project ON requests.id_project=project.id_project JOIN business ON project.id_business=business.id_business WHERE requests.id_user = ?";
        $data = ["32182708-0547-11ef-a34e-c62f196bb7a8"];
        $result = query($sql, $data);
        return $result;
    }

    // function openedBusiness() {
	//     $query = "INSERT INTO analytic (id_business, id_school) VALUES (?, ?)";
    //     $data = [];
	//     $result = query($sql, $data);
	//     header('Content-Type: application/json');
	//     return json_encode($result);
    // }

    if (isset($_POST["searchBusiness"])) {
        echo searchBusiness();
    }
    if (isset($_POST["getProjects"])) {
        echo getProjects();
    }
    if (isset($_POST["postApply"])) {
        echo postApply();
    }
?>
