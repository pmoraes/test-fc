<?php

require_once 'Controller.php';

class WarsController extends Controller
{
    /**
     * index method it will render the wars list.
     *
     * @return string
     */
    public function index()
    {
        if ($this->getRequest()->is('post')) {
            $wars = $this->War->search($this->getRequest()->getData());
        } else {
            $wars = $this->War->index();
        }

        $this->setViewData('wars', $wars);
        $this->render();
    }

    /**
     * create method it will create a family.
     *
     * @return string
     */
    public function create()
    {
        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
            $this->getRequest()->setData('date_start', date('Y-m-d', strtotime($data['date_start'])));
            $this->getRequest()->setData('date_end', date('Y-m-d', strtotime($data['date_end'])));
            if ($this->War->create($this->getRequest()->getData())) {
                $_SESSION['message-success'] = 'Guerra salva com sucesso';
                $this->getResponse()->redirect('/wars');
            }

            $_SESSION['message-error'] = 'Não foi possível salvar a guerra';
        }
        $families = $this->War->getFamiliesList();
        $this->setViewData('families', $families);
        $this->render();
    }

    /**
     * index method it will show a family.
     *
     * @param int $id Family id.
     * @return string
     */
    public function read($id)
    {
        $war = $this->War->view($id);
        if (empty($war)) {
            $_SESSION['message-error'] = 'Guerra não foi encontrada.';
            $this->getResponse()->redirect('/wars');
        }

        $this->setViewData('war', $war);
        $this->render();
    }

    /**
     * index method it will show a family.
     *
     * @param int $id Family id.
     * @return string
     */
    public function update($id)
    {
        $war = $this->War->read($id);
        if (empty($war)) {
            $_SESSION['message-error'] = 'Guerra não foi encontrada.';
            $this->getResponse()->redirect('/wars');
        }

        if ($this->getRequest()->is('post')) {
            $data = $this->getRequest()->getData();
            $this->getRequest()->setData('date_start', date('Y-m-d', strtotime($data['date_start'])));
            $this->getRequest()->setData('date_end', date('Y-m-d', strtotime($data['date_end'])));
            if ($this->War->update($this->getRequest()->getData())) {
                $_SESSION['message-success'] = 'Guerra salva com sucesso';
                $this->getResponse()->redirect('/wars');
            }

            $_SESSION['message-error'] = 'Não foi possível salvar a Guerra';
        }
        $families = $this->War->getFamiliesList();
        $this->setViewData('families', $families);
        $this->setViewData('war', $war);
        return $this->render();
    }

    /**
     * index method it will show a family.
     *
     * @param int $id Family id.
     * @return string
     */
    public function remove($id)
    {
        $family = $this->War->read($id);
        if (empty($family)) {
            $_SESSION['message-error'] = 'Guerra não foi encontrada.';
            $this->getResponse()->redirect('/wars');
        }

        if ($this->War->delete($id)) {
            $_SESSION['message-success'] = 'Guerra salva com sucesso';
            $this->getResponse()->redirect('/wars');
        }

        $_SESSION['message-error'] = 'Não foi possível salvar a guerra';
    }
}