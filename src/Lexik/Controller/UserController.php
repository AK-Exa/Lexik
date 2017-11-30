<?php
namespace Lexik\Controller;

class UserController
{
    public function listAction()
    {
        return array();
    }

    public function addAction()
    {
        $formHandler = new \Lexik\Form\Handler\FormHandler(\Lexik\Model\UserRepository::TYPE);
        $form = $formHandler->getForm();

        if($formHandler->handle(\Lexik\Form\Handler\FormHandler::CREATE)){
            //$redirect = sprintf('Location: app.php?controller=%s&action=list', \Lexik\Model\UserRepository::TYPE);
            header('Location: app.php');
        }

        return array('form' => $form->render());
    }

    public function editAction($id)
    {
        $repository = new \Lexik\Model\UserRepository();
        $user = $repository->load($id);
        $data = $user->getProperties();
        $formHandler = new \Lexik\Form\Handler\FormHandler(\Lexik\Model\UserRepository::TYPE, $data);
        $formHandler->setObject($user);
        $form = $formHandler->getForm();

        if($formHandler->handle(\Lexik\Form\Handler\FormHandler::UPDATE)){
            $redirect = sprintf('Location: app.php?controller=%s&action=list', \Lexik\Model\UserRepository::TYPE);
            header($redirect);
        }

        return array('form' => $form->render());
    }

    public function showAction($id)
    {
        $repository = new \Lexik\Model\UserRepository();
        $user = $repository->load($id);
        $group = $user->group;

        return array('user' => $user, 'group' => $group);
    }

    public function removeAction($id)
    {
        $repository = new \Lexik\Model\UserRepository();
        $repository->remove($id);

        //$redirect = sprintf('Location: app.php?controller=%s&action=list', \Lexik\Model\UserRepository::TYPE);
        header('Location: app.php');
    }

}