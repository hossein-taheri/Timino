<?php
namespace Controllers;

require_once "helpers/Exceptions.php";
require_once "helpers/RandomGenerator.php";
require_once "repositories/UserRepository.php";


use ForbiddenException;
use NotFoundException;
use Helpers\Response;
//use Pecee\Controllers\IResourceController;
use Repository\UserRepository;

class UserController
{
    public function search()
    {
        $usernames = UserRepository::findAllByUsername($_GET['username']);
        if($usernames == null){
            throw new NotFoundException("This record not found.");
        }
        return Response::message(
            'These records were found',
            $usernames
        );
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function show($id)
    {
        $username = UserRepository::findOneById($_GET['id']);
        if($username == null){
            throw new NotFoundException("This record not found.");
        }
        return Response::message(
            'This record were found',
            $username
        );
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

}
