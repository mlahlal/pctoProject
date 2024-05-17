<?php
    require("db.php");

    function getStudentRequests() {
        $sql = "SELECT * FROM requests JOIN users ON requests.id_user = users.id_user";
        $data = [];
        $result = query($sql, $data);
        return $result;
    }

    function newProject() {
        header('Content-Type: application/json');
        $sql = "INSERT INTO project (title, description, id_business) VALUES (?, ?, ?)";
        $data = [$_POST["titolo"], $_POST["descrizione"], $_POST["id_business"]];
        $result = query($sql, $data);
        return json_encode($result);
    }

    function editProject() {
        header('Content-Type: application/json');
        $sql = "INSERT INTO project (title, description, id_business) VALUES (?, ?, ?)";
        $sql = "UPDATE project SET title=?, description=? WHERE id_project=?";
        $data = [$_POST["titolo"], $_POST["descrizione"], $_POST["id_project"]];
        $result = query($sql, $data);
        return json_encode($result);
    }

    function getProjects() {
        $sql = "SELECT * FROM project WHERE id_business=?";
        $data = ["1312"];
        $result = query($sql, $data);
        return $result;
    }

    function acceptRequest() {
        header('Content-Type: application/json');
        $sql = "UPDATE request SET accepted = true WHERE id_user = ? AND id_project = ?";
        $data = [$_POST["id_user"], $_POST["id_project"]];
        $result = query($sql, $data);
        return json_encode($result);
    }

    function refuseRequest() {
        header('Content-Type: application/json');
        $sql = "UPDATE request SET accepted = false WHERE id_user = ? AND id_project = ?";
        $data = [$_POST["id_user"], $_POST["id_project"]];
        $result = query($sql, $data);
        return json_encode($result);
    }

    function getStudentInfo() {
        header('Content-Type: application/json');
        $sql = "SELECT * FROM users WHERE id_user=?";
        $data = [$_POST["id_user"]];
        $result = query($sql, $data);
        return json_encode($result);
    }

    if (isset($_POST["getStudentRequests"])) {
        echo getStudentRequests();
    }
    if (isset($_POST["newProject"])) {
        echo newProject();
    }
    if (isset($_POST["editProject"])) {
        echo editProject();
    }
    if (isset($_POST["acceptRequest"])) {
        echo acceptRequest();
    }
    if (isset($_POST["refuseRequest"])) {
        echo refuseRequest();
    }
    if (isset($_POST["getStudentInfo"])) {
        echo getStudentInfo();
    }
?>
