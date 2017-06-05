<?php

namespace Masha\Controller;

use Masha\Model\Movie;

class MovieController extends AbstractController
{
    public function indexAction()
    {
        $movie = new Movie();
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $result = $movie->getResult($title);

        $this->getSmarty()->assign([
            'movies' => $movie->getList(),
            'result' => $result,
            'title' => $title
        ]);
        $this->getSmarty()->display('list.tpl');
    }

    public function addAction()
    {
        $this->getSmarty()->assign(
            'formats',
            ['VHS' => 'VHS', 'DVD' => 'DVD', 'Blu-Ray' => 'Blu-Ray']
        );
        $this->getSmarty()->display('add_movie.tpl');
    }

    public function addMovieAction()
    {
        $movie = new Movie();
        $movie->add(
            isset($_POST['title']) ? $_POST['title'] : null,
            isset($_POST['year']) ? $_POST['year'] : null,
            isset($_POST['format']) ? $_POST['format'] : null,
            isset($_POST['actors']) ? $_POST['actors'] : null
        );

        $this->redirect('/');
    }

    public function deleteMovieAction()
    {
        $movie = new Movie();
        $movie->delete(
            isset($_GET['id']) ? $_GET['id'] : null
        );

        $this->redirect('/');
    }

    public function importMovieAction()
    {
        $this->getSmarty()->display('import_data.tpl');
    }

    public function processAction()
    {
        $movie = new Movie();
        $movie->processData();

        $this->redirect('/');
    }
}
