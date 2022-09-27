<?php
function dbQuery($query)
{
  $connection = mysqli_connect("localhost", "slogive", "123456789", "courses_platform");

  $result = mysqli_query($connection, $query);

  return $result;
}

///////////////////////////////////////////////////////////////////////////

function insert($tblname, $form_data)
{
  $fields = array_keys($form_data);

  $sql = "INSERT INTO " . $tblname . "(" . implode(',', $fields) . ") VALUES ('" . implode("','", $form_data) . "')";

  return dbQuery($sql);
}

///////////////////////////////////////////////////////////////////////////

function delete($tblname, $field_id, $id)
{
  $sql = "DELETE FROM " . $tblname . " WHERE " . $field_id . "=" . $id . "";

  return dbQuery($sql);
}

///////////////////////////////////////////////////////////////////////////

function modify($tblname, $form_data, $field_id, $id)
{
  $sql = "UPDATE " . $tblname . " SET ";
  $data = array();

  foreach ($form_data as $column => $value) {
    $data[] = $column . "=" . "'" . $value . "'";
  }

  $sql .= implode(',', $data);

  $sql .= " WHERE " . $field_id . " = " . $id . "";

  return dbQuery($sql);
}

///////////////////////////////////////////////////////////////////////////

function selectId($tblname, $field_name, $field_id)
{
  $sql = "SELECT * FROM " . $tblname . " WHERE " . $field_name . " = " . $field_id . "";

  $db = dbQuery($sql);

  $GLOBALS['row'] = mysqli_fetch_object($db);

  return $sql;
}
