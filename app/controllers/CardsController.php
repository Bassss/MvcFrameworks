<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CardsController extends ControllerBase
{

    public function indexAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'cards', $_POST);
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $cards = Cards::find();

        $paginator = new Paginator([
            'data' => $cards,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();

        $this->view->setVar('cards', $cards);
    }

    public function newAction()
    {

    }

    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "cards",
                'action' => 'index'
            ]);

            return;
        }

        $cards = new Cards();
        $cards->title = $this->request->getPost("title");
        $cards->text = $this->request->getPost("text");
        $cards->sender = $this->request->getPost("sender");
        $cards->reciever = $this->request->getPost("reciever");
        $cards->public = 1;
        $cards->likes = 0;
        $userid = $this->session->get("id");
        $cards->user_id = $userid;



        if (!$cards->save()) {
            foreach ($cards->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "cards",
                'action' => 'index'
            ]);

            return;
        }

        $this->flash->success("card was created successfully");

        $this->dispatcher->forward([
            'controller' => "cards",
            'action' => 'index'
        ]);
    }

    public function manageAction()
    {
        $this->handleSecurity('3');


        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Cards', $_POST);
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }


//        Query below
        $filter  = $this->request->getPost("filter");

        if(!isset($filter) || ($filter == 'All')) {
            $cards = Cards::find();
        } else
        {
            $cards = Cards::find("public = '$filter'");
        }

        //Till here

        if (count($cards) == 0) {
            $this->flash->notice("There are no results for this filter!");

            $this->dispatcher->forward([
                "controller" => "cards",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $cards,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function deleteAction($id)
    {
        $cards = Cards::findFirstByid($id);
        if($cards->public == 0) {

            $this->flash->error("You can only delete a card if its public");

            $this->dispatcher->forward([
                'controller' => "cards",
                'action' => 'manage'
            ]);

            return;
        }

        if (!$cards->delete())
        {
            foreach ($cards->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "cards",
                'action' => 'manage'
            ]);

            return;
        }

        $this->flash->success("Card '$cards->title' is deleted!");


        $this->dispatcher->forward([
            'controller' => "cards",
            'action' => "manage"
        ]);

    }
    public function publicateAction()
    {
        $id = $this->request->getPost("id");

        $cards = Cards::findFirstByid($id);

        if($cards->public == 0) {
            $cards->public = 1;
            $this->flash->notice("This '$cards->title' is now public");
        } else {
            $cards->public = 0;
            $this->flash->success("This '$cards->title' is now private");

        }


        if (!$cards->save())
        {
            foreach ($cards->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "cards",
                'action' => 'manage'
            ]);

            return;
        }

        $this->dispatcher->forward([
            'controller' => "cards",
            'action' => "manage"
        ]);

    }
    public function likeAction()
    {
//        $userid = $this->session->get("id");
//        $cards = Cards::find("id = '" . $userid . "'");
//        $xcards = count($cards);


//        if ($xcards < 2) {
//            $this->response->redirect('cards');
//            return;
//        } else {
//            $cardid = $this->request->getPost("cardid");
//            $xcard = Cards::findFirst(array
//            (
//                "id = '$cardid'"
//            ));
//            $xcard->likes + 1;
//        }

        $cardid = 14;
        $indivicualcard = Cards::findFirst("id = '" . $cardid . "'");
        $indivicualcard->likes + 1;

    }
}

