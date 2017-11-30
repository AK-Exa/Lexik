<?php
namespace Lexik\DataFixtures;

abstract class BaseFixtures
{
    public function loadFixtures()
    {
        $type = $this->getType();
        $fixtures = $this->getFixtures();

        foreach ($fixtures as $fixture){
            $repositoryClass = sprintf('\\Lexik\\Model\\%sRepository', ucfirst($type));
            $repository = new $repositoryClass();
            $repository->create($fixture);
        }
    }
}