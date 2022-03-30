<?php
namespace Controllers;
use Helpers\Response;
use Pecee\Controllers\IResourceController;
use Repository\TimeLineRepository;

class TimelineController implements IResourceController{

    public function index()
    {
        echo "Index";
    }

    public function show($id)
    {
        echo "Show".$id;
        // TODO: Implement show() method.
    }

    public function store()
    {
        $timeline = TimeLineRepository::create($_POST['user_id'],$_POST['title'],$_POST['description'],$_POST['avatar'],$_POST['privilege_level']);

        return Response::message('Timeline created successfully',null);
    }

    public function create()
    {
        echo "Create";
        // TODO: Implement create() method.
    }

    public function edit($id)
    {
        echo "Edit".$id;
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        echo "Update".$id;
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        echo "Destroy".$id;
        // TODO: Implement destroy() method.
    }

}
