<?php
namespace Lexik\DataFixtures;

use Lexik\Model\UserRepository;

class UserFixtures extends BaseFixtures
{
    public function getType()
    {
        return UserRepository::TYPE;
    }

    public function getFixtures()
    {
        return array(
            array(
                'nom' => 'Dupond',
                'prenom' => 'Albert',
                'email' => 'albert.dupond@test.fr',
                'date' => '27/11/1956',
                'group_id' => 3
            ),
            array(
                'nom' => 'Ferrand',
                'prenom' => 'Toto',
                'email' => 'toto.ferrand@test.fr',
                'date' => '16/11/1965',
                'group_id' => 2
            ),
            array(
                'nom' => 'Marechal',
                'prenom' => 'Pierre',
                'email' => 'pierre.marechal@test.fr',
                'date' => '27/10/1966',
                'group_id' => 3
            ),
            array(
                'nom' => 'Hollande',
                'prenom' => 'Jacques',
                'email' => 'jacques.hollande@test.fr',
                'date' => '24/08/1949',
                'group_id' => 3
            ),
            array(
                'nom' => 'Damon',
                'prenom' => 'Matt',
                'email' => 'matt.damon@test.fr',
                'date' => '27/07/1970',
                'group_id' => 2
            ),
            array(
                'nom' => 'Diesel',
                'prenom' => 'Vince',
                'email' => 'vince.diesel@test.fr',
                'date' => '14/05/1969',
                'group_id' => 1
            )
        );
    }
}