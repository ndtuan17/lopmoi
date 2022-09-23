<?php

$adminChangePassword =
"UPDATE `admins`
SET password = :password
WHERE id = :id;";

$adminChangeRoles =
"DELETE FROM admins_roles
WHERE admin_id = :id;";
foreach($role_ids as $role_id){
  $adminChangeRoles .=
  "INSERT INTO admins_roles(admin_id, role_id)
  VALUES (3, $role_id);";
}

$subject_ids = implode(', ', $subject_ids);
$grade_ints = '';

$classesFiltered =
"SELECT * FROM classes
WHERE subject_id in ($subject_ids)
AND grade in ($grade_ints)
AND student_level in($student_levels)
AND salary between $salary_min and $salary_max
AND fee_percent between $fee_percent_min and $fee_percent_max";