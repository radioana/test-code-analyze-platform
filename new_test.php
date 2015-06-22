<?php

use Github\Client\test;
use Github\Api\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Requestasdiuabsiduabsidubas;

class RepositoryController extends Controller
{
    public function indexAction()
    {
        $apiToken = 'f477de2d960cd1e4ab541ab8f69577d887d2afaa';
        $client = new Client();
        //$repo = $client->api('repo')->show('radioana', 'test-code-analyze-platform');

        // auth with token
        $client->authenticate($apiToken, Client::AUTH_URL_TOKEN);

        // auth with password
        //$client->authenticate('radioana', 'radioana92', Client::AUTH_HTTP_PASSWORD);

        $collaborators = $client->api('repo')->contributors('radioana', 'test-code-analyze-platform');

        $a = $client->api('users')->show('radioana');

        var_dump($a);

        var_dump($collaborators);


        die;

        return $this->render('CodeInspectionMainBundle:Default:index.html.twig');
    }
}
