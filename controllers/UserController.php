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
    public function search_suggestion()
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

    public function search()
    {
        $per_page = 10;

        //$users = UserRepository::findUsers($_POST['user_id'], $per_page, $_GET['page'], $_GET['username']);
        $users = UserRepository::findUsers($per_page, $_GET['page'], $_GET['username']);


        //$pages_count = UserRepository::countPagesUsers($_POST['user_id'],$per_page,$_GET['username']);
        $pages_count = UserRepository::countPagesUsers($per_page,$_GET['username']);


        return Response::message(null, [
            'users' => $users,
            'pages_count' => $pages_count ,
            'per_page' => $per_page,
            'page' => $_GET['page'],
        ]);
    }

    public function show($id)
    {
        $user = UserRepository::findUsernameNameAvatarById($id);
        if($user == null){
            throw new NotFoundException("This record not found.");
        }
        return Response::message(
            'This record were found',
            $user
        );
    }

    public function myProfile()
    {
        $user = UserRepository::findOneById($_POST['user_id']);
        if($user == null){
            throw new NotFoundException("This record not found.");
        }
        return Response::message(
            'This record was found',
            $user
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

    public function update()
    {
        $user = UserRepository::findOneById($_POST['user_id']);
        if($user == null){
            throw new NotFoundException("This record not found.");
        }
        UserRepository::update($_POST['user_id'],$_POST['first_name'],$_POST['last_name'],$_POST['avatar'],$_POST['phone'],$_POST['gender']);

        $user = UserRepository::findOneById($_POST['user_id']);
        return Response::message(
            'This record was found',
            $user
        );
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

}
