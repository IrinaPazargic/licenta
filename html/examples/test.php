<?php

$call = $_GET['call'];

if ($call == 'insert') {
    echo insert();
} else if ($call == 'update') {
    echo update();
} else if ($call == 'delete') {
    echo delete();
} else if ($call == 'search') {
    echo search();
}

function update() {
    return "Successfully updated";
}

function delete() {
    return "Successfully deleted";
}

function insert() {
    return "Successfully inserted";
}

function search() {
    return "Successfully searched for...";
}

