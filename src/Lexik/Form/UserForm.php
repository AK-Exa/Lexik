<?php
namespace Lexik\Form;

class UserForm
{
    private $form;
    private $groupRepository;

    public function __construct()
    {
        $this->groupRepository = new \Lexik\Model\GroupRepository();
        $this->form = \Nibble\NibbleForms\NibbleForm::getInstance('user', '', true, 'post', 'Enregister', 'table');
        $this->buildForm();
    }

    public function buildForm()
    {
        $this->form
            ->addField('nom', 'text', array('required' => true, 'label' => 'Nom: '));
        $this->form
            ->addField('prenom', 'text', array('required' => true, 'label' => 'Prénom: '));
        $this->form
            ->addField('email', 'text', array('required' => true, 'label' => 'Email: '));
        $this->form
            ->addField('date', 'text', array('required' => true, 'label' => 'Date de naissance: ','placeholder' => 'JJ/MM/AAAA'));
        $this->form
            ->addField('group_id', 'select', array(
            'choices' => $this->groupRepository->getAllChoices(), 'label' => 'Groupe: '
            ));
    }

    public function getForm()
    {
        return $this->form;
    }
}