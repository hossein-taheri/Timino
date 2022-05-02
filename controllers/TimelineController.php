<?php

namespace Controllers;

require_once "repositories/TimeLineRepository.php";
require_once "repositories/TimeLineMemberRepository.php";

use ForbiddenException;
use Helpers\Response;
use NotFoundException;
use Pecee\Controllers\IResourceController;
use Repository\TimeLineRepository;
use Repository\TimeLineMemberRepository;
use Repository\UserRepository;



class TimelineController implements IResourceController
{

    public function index()
    {
        $per_page = 10;

        $timelines = TimeLineRepository::findUserTimelines($_POST['user_id'], $per_page, $_GET['page']);

        $pages_count = TimeLineRepository::countPagesUserTimelines($_POST['user_id'], $per_page);

        return Response::message(null, [
            'timelines' => $timelines,
            'pages_count' => $pages_count,
            'per_page' => $per_page,
            'page' => $_GET['page'],
        ]);
    }

    public function show($timelineId)
    {
        $timeline = TimeLineRepository::findOneById($timelineId);

        if ($timeline == null) {
            throw new NotFoundException('Timeline does not exists');
        }

        if ($timeline['privilege_level'] == 'private'){
            $timeline_member = TimeLineMemberRepository::findOneByTimelineIdAndUserId($timelineId, $_POST['user_id']);

            if ($timeline_member == null) {
                throw new ForbiddenException('User is not a member of this timeline');
            }
        }

        return Response::message(null, [
            'timeline' => $timeline
        ]);
    }

    public function store()
    {
        TimeLineRepository::create(
            $_POST['user_id'],
            $_POST['title'],
            $_POST['description'],
            $_POST['avatar'],
            $_POST['privilege_level']
        );

        $timeline = TimeLineRepository::findOneByUserId($_POST['user_id']);

        $timeline_member = TimeLineMemberRepository::create($timeline['id'], $_POST['user_id'], 'create_event', 1);

        return Response::message('Timeline created successfully', null);
    }

    public function create()
    {
        echo "Create";
    }

    public function edit($id)
    {
        echo "Edit" . $id;
    }

    public function update($id)
    {
        $timeline = TimeLineRepository::findOneById($id);

        if ($timeline == null) {
            throw new ForbiddenException('Timeline does not exists');
        }

        if ($timeline['user_id'] != $_POST['user_id']) {
            throw new ForbiddenException('You do not have access to this timeline');
        }

        TimeLineRepository::updateOneById(
            $id,
            $_POST['title'],
            $_POST['description'],
            $_POST['avatar'],
            $_POST['privilege_level']
        );


        return Response::message('Timeline has been updated successfully', null);
    }

    public function destroy($id)
    {
        echo "Destroy" . $id;
        // TODO: Implement destroy() method.
    }

    public function addMember($id)
    {
        $timeline = TimeLineRepository::findOneById($id);

        if ($timeline == null) {
            throw new ForbiddenException('Timeline does not exists');
        }

        if ($timeline['user_id'] != $_POST['user_id']) {
            throw new ForbiddenException('You do not have access to this timeline');
        }

        $user = UserRepository::findOneByEmail($_POST['email']);

        if ($user == null) {
            throw new ForbiddenException('User with this email not found');
        }

        $timeLineMember = TimeLineMemberRepository::findOneByTimelineIdAndUserId($id, $user['id']);

        if ($timeLineMember != null) {
            throw new ForbiddenException("User is a member of this timeline");
        }

        TimeLineMemberRepository::create($id, $user['id'], $_POST['event_privilege_level'], $_POST['chat_access']);

        return Response::message(
            'User has been added to timelines member successfully',
            null
        );
    }

    public function deleteMember($id)
    {
        $timeline = TimeLineRepository::findOneById($id);

        if ($timeline == null) {
            throw new ForbiddenException('Timeline does not exists');
        }

        if ($timeline['user_id'] != $_POST['user_id']) {
            throw new ForbiddenException('You do not have access to this timeline');
        }

        if ($timeline['user_id'] == $_POST['delete_user_id']) {
            throw new ForbiddenException('You can not delete the owner of timeline');
        }

        $timeline_member = TimeLineMemberRepository::findOneByTimelineIdAndUserId($id, $_POST['delete_user_id']);

        if ($timeline_member == null) {
            throw new ForbiddenException('User is not a member of this timeline');
        }

        TimeLineMemberRepository::delete($id, $_POST['delete_user_id']);


        return Response::message(
            'User has been deleted from this timeline successfully',
            null
        );
    }

}
