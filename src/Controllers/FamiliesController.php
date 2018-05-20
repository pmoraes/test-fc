<?php

require_once 'Controller.php';

class FamiliesController extends Controller
{

    /**
     * index method it will render the families list.
     *
     * @return string
     */
    public function index()
    {
        $families = $this->Family->index();

        $this->setViewData('families', $families);
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
            if ($this->Family->create($this->getRequest()->getData())) {
                $_SESSION['message-success'] = 'Família salva com sucesso';
                $this->getResponse()->redirect('/families');
            }

            $_SESSION['message-error'] = 'Não foi possível salvar a família';
        }
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
        $family = $this->Family->read($id);
        if (empty($family)) {
            $_SESSION['message-error'] = 'Família não foi encontrada.';
            $this->getResponse()->redirect('/families');
        }

        $this->setViewData('family', $family);
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
        $family = $this->Family->read($id);
        if (empty($family)) {
            $_SESSION['message-error'] = 'Família não foi encontrada.';
            $this->getResponse()->redirect('/families');
        }

        if ($this->getRequest()->is('post')) {
            if ($this->Family->update($this->getRequest()->getData())) {
                $_SESSION['message-success'] = 'Família salva com sucesso';
                $this->getResponse()->redirect('/families');
            }

            $_SESSION['message-error'] = 'Não foi possível salvar a família';
        }

        $this->setViewData('family', $family);
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
        $family = $this->Family->read($id);
        if (empty($family)) {
            $_SESSION['message-error'] = 'Família não foi encontrada.';
            $this->getResponse()->redirect('/families');
        }

        if ($this->Family->delete($id)) {
            $_SESSION['message-success'] = 'Família salva com sucesso';
            $this->getResponse()->redirect('/families');
        }

        $_SESSION['message-error'] = 'Não foi possível salvar a família';
    }
}