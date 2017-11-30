<?php
namespace Lexik\Model;

abstract class BaseModel extends \RedBeanPHP\SimpleModel
{
    public $slug;
    public $createdAt;
    public $updatedAt;
    public $now;
    private $unboxObject;

    public function update()
    {
        $this->now = new \DateTime(null, new \DateTimeZone('Europe/Paris'));

        $this->unboxObject = $this->unbox();

        $this->setSlug();
        $this->setCreatedAt();
        $this->setUpdatedAt();
    }

    private function setSlug()
    {
        $text = $this->unboxObject->nom ?: 'lexik';

        if(!$text){
            return;
        }

        $slug = \Nibble\NibbleForms\Useful::slugify($text);
        $this->unboxObject->slug = $slug;
    }

    private function setCreatedAt()
    {
        if(!$this->unboxObject->createdAt){
            $this->unboxObject->createdAt = $this->now;
        }
    }

    private function setUpdatedAt()
    {
        $this->unboxObject->updatedAt = $this->now;
    }
}