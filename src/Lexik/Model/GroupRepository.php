<?php
namespace Lexik\Model;

class GroupRepository extends BaseRepository
{
    const TYPE = 'group';

    public function getType()
    {
        return self::TYPE;
    }

    public function getAllChoices()
    {
        $groupes = $this->getAll();
        $choices    = array();

        foreach ($groupes as $key => $groupe) {
            $choices[$key] = $groupe->nom;
        }

        return $choices;
    }
}