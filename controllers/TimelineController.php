<?php

namespace Controllers;

use ForbiddenException;
use Helpers\Response;
use Pecee\Controllers\IResourceController;
use Repository\TimeLineRepository;

class TimelineController implements IResourceController
{

    public function index()
    {
        echo "Index";
    }

    public function show($id)
    {
        echo "Show" . $id;
        // TODO: Implement show() method.
    }

    public function store()
    {
        $timeline = TimeLineRepository::create(
            $_POST['user_id'],
            $_POST['title'],
            $_POST['description'],
            $_POST['avatar'],
            $_POST['privilege_level']
        );

        return Response::message('Timeline created successfully', null);
    }

    public function create()
    {
        echo "Create";
    }

    public function edit($id)
    {
        echo "Edit".$id;
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


        return Response::message('Timeline has been updated successfully',null);
    }

    public function destroy($id)
    {
        echo "Destroy" . $id;
        // TODO: Implement destroy() method.
    }

}
