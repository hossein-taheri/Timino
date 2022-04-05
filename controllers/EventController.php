<?php
namespace Controllers;
use BadRequestException;
use ForbiddenException;
use Helpers\Response;
use NotFoundException;
use Pecee\Controllers\IResourceController;
use Repository\TimeLineMemberRepository;
use Repository\TimeLineRepository;
use Repository\EventRepository;

class EventController{

    public function index($timelineId)
    {
        $timelineMember = TimeLineMemberRepository::findOneByTimelineIdAndUserId($timelineId,$_POST['user_id']);

        if ($timelineMember == null) {
            throw new NotFoundException('You are not a member of this timeline');
        }

        $events = EventRepository::findAllByTimelineId($timelineId);

        return Response::message(
            null,
            [
                'events' => $events
            ]
        );
    }

    public function show($eventId,$timelineId)
    {
        $timelineMember = TimeLineMemberRepository::findOneByTimelineIdAndUserId($timelineId,$_POST['user_id']);

        if ($timelineMember == null) {
            throw new NotFoundException('You are not a member of this timeline');
        }

        $event = EventRepository::findOneById($eventId);

        if ($event['timeline_id'] != $timelineId){
            throw new BadRequestException('Timeline and Event Ids does not match');
        }

        return Response::message(
            null,
            [
                'event' => $event
            ]
        );
    }

    public function store($timelineId)
    {
        $timelineMember = TimeLineMemberRepository::findOneByTimelineIdAndUserId($timelineId,$_POST['user_id']);

        if ($timelineMember == null) {
            throw new NotFoundException('You are not a member of this timeline');
        }

        if($timelineMember['event_privilege_level'] != 'create_event'){
            throw new ForbiddenException("You dont have permission to create an event in this timeline");
        }

        $event = EventRepository::create($timelineId,$_POST['user_id'],$_POST['title'],$_POST['description']);

        return Response::message(
            null,
            [
                'event' => $event
            ]
        );
    }

    public function create($timelineId)
    {

    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($eventId,$timelineId)
    {

    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

}
