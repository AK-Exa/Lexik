<?php
namespace Lexik\DataFixtures;

use Lexik\Model\GroupRepository;

class GroupFixtures extends BaseFixtures
{
    public function getType()
    {
        return GroupRepository::TYPE;
    }

    public function getFixtures()
    {
        return array(
            array(
                'nom' => 'Admin'
            ),
            array(
                'nom' => 'Manager'
            ),
            array(
                'nom' => 'User'
            )
        );
    }
}