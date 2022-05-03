<?php
namespace Controllers;

require_once 'repositories/CategoryRepository.php';

use ForbiddenException;
use Helpers\Response;
use Repository\CommentRepository;
use Repository\TimeLineMemberRepository;

class CommentController {
    public function index($timelineId, $eventId)
    {
        $timelineMember = TimeLineMemberRepository::findOneByTimelineIdAndUserId($timelineId,$_POST['user_id']);

        if ($timelineMember == null) {
            throw new ForbiddenException('You are not a member of this timeline');
        }

        $comments = CommentRepository::findAll($eventId);

        return Response::message(
            null,
            $comments
        );
    }

    public function store($timelineId, $eventId)
    {
        $timelineMember = TimeLineMemberRepository::findOneByTimelineIdAndUserId($timelineId,$_POST['user_id']);

        if ($timelineMember == null) {
            throw new ForbiddenException('You are not a member of this timeline');
        }

        CommentRepository::create($timelineId,$eventId,$_POST['user_id'],$_POST['message']);

        return Response::message(
            'category created successfully',
            null
        );
    }
}