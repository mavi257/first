<?php  {

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');

    $output = fopen('php://output', 'w');

  
    $con = mysqli_connect('localhost', 'root', '', 'new');
    $rows = mysqli_query($con, 'SELECT * FROM user');

    while ($row = mysqli_fetch_assoc($rows)) {
      fputcsv($output, $row);
    }
    fclose($output);
    mysqli_close($con);
    exit();
  }