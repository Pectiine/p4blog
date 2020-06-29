<?php
include_once("./model/Report.php");

function addReport($id_comment)
{
    $report = new Report();
    $report->setUser($_SESSION['user']);
    $report->setComment($id_comment);
    $report->setMessage($_POST['message']);

    $message = $report->addReport();
    return $message;
}

function verifReport($id_comment)
{
    $report = new Report;
    $nbReport = $report->verifReport($id_comment, $_SESSION['user']);
    return $nbReport;
}
