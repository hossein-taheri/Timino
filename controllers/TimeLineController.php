<?php
namespace Controllers;
require_once "repositories/TimeLineRepository.php";
require_once "helpers/Exceptions.php";

use ForbiddenException;
use NotFoundException;
use Helpers\Response;
use Repository\TimeLineRepository;

class Timeline
{
    public function search()
    {
        $timeline_name = TimeLineRepository::findAllByName($_GET['name']);
        if ($timeline_name == null) {
            throw new NotFoundException("This record not found.");
        }
        return Response::message(
            'These records were found',
            $timeline_name
        );
    }
}