<?php
namespace Controllers;

require_once 'repositories/CategoryRepository.php';

use Helpers\Response;
use Repository\CategoryRepository;

class CategoryController {
    public function index()
    {
        $categories = CategoryRepository::findAll();

        return Response::message(
            null,
            $categories
        );
    }

    public function store()
    {
        CategoryRepository::create($_POST['name']);

        return Response::message(
            'category created successfully',
            null
        );
    }

    public function update($id)
    {
        CategoryRepository::update($id, $_POST['name']);

        return Response::message(
            'category updated successfully',
            null
        );
    }
}