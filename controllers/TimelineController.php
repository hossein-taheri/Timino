<?php
namespace Controllers;
use Pecee\Controllers\IResourceController;

class TimelineController implements IResourceController{

    public function index()
    {
        echo "Index";
        // TODO: Implement index() method.
    }

    public function show($id)
    {
        echo "Show".$id;
        // TODO: Implement show() method.
    }

    public function store()
    {
        echo "Store";
        // TODO: Implement store() method.
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
