<?php
function getDataFromQuery($sql, $conn, $tabela) {
    $result = $conn->query($sql);
    $output = [];
    $output['data'] = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $row_to_add = [];
            $id = null;
            foreach ($row as $key => $value) {
                if ($id == null ) {
                    $id = $key;
                }
                $row_to_add[] = $value;
            }
            // adauga actiuni suplimentare
            $actiuni = '<input type="image" class="icon" src="delete.png" onClick="deleteRow(\''.$id.'\',\''.$row[$id].'\',\''.$tabela.'\')"/>';
            $actiuni .= '<input type="image" class="icon" src="edit.png" onClick="beginEdit(\''.$id.'\',\''.$row[$id].'\',\''.$tabela.'\')"/>';
            $row_to_add[]= $actiuni;
            $output['data'][] = $row_to_add;
        }

    }
    echo json_encode($output);
}

function getDataFromQueryWithoutActions($sql, $conn) {
    $result = $conn->query($sql);
    $output = [];
    $output['data'] = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $row_to_add = [];
            $id = null;
            foreach ($row as $key => $value) {
                if ($id == null ) {
                    $id = $key;
                }
                $row_to_add[] = $value;
            }
            $output['data'][] = $row_to_add;
        }

    }
    echo json_encode($output);
}
?>