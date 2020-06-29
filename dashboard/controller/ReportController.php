<?php

include_once("../model/Report.php");

function getCountReportedByComment($id)
{
    $report = new Report();
    $countReport = $report->getCountReportedByComment($id);
    return $countReport;
}

function getReportByIdComment($id_comment)
{
    $report = new Report();
    $listReport = $report->getReportByIdComment($id_comment);
    return $listReport;
}

function deleteAllReport($id_comment)
{
    $report = new Report();
    $message = $report->deleteReportsByIdComment($id_comment);
    return $message;
}

function getCountCommentsReported()
{
    $report = new Report();
    $nbComment = $report->getCountCommentsReported();
    return $nbComment;
}
