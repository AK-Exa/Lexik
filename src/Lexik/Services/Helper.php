<?php
namespace Lexik\Services;

class Helper
{
    public function getLink($name)
    {
        return $name;
    }

    public function getList($type)
    {
        $repositoryClass = sprintf('Lexik\\Model\\%sRepository', $type);
        $repository = new $repositoryClass();

        $objects = $repository->getAll();

        $html = '';

        foreach($objects as $object){
            $id = $object->id;
            $nom = $object->nom;
            $prenom = $object->prenom;
            $email = $object->email;
            $group = $object->group;
            $age = $this->age($object->date);
            $showLink = sprintf('<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".show-modal-%s">Détail</button>', $id,$id);
            //$editLink = sprintf('<a href="app.php?controller=user&action=edit&id=%s">Edit</a>', $id);
            $removeLink = sprintf('<a href="app.php?controller=user&action=remove&id=%s" class="btn btn-danger bt-xs">Effacer</a>', $id);

            $html .= sprintf('<tr data-row-id="%s"><td class="text-center"><input type="checkbox" class="sub_chk" data-id="%s"></td>',$id,$id);
            $html .= <<<EOF
    <td class="text-center">$group->nom</td>
    <td class="text-center">$nom $prenom</td>
    <td class="text-center">$email</td>
    <td class="text-right">$showLink - $removeLink</td>
</tr>
EOF;
            $html .= sprintf('<div class="modal fade show-modal-%s" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">',$id);
            $html .= <<<EOF
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="well well-sm">
                <h2>$nom $prenom</h2><span>Age: $age</span>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
EOF;
        }

        return $html;
    }

    public function getMenu()
    {
        return <<<EOF
<ul class="nav nav-pills pull-right">
    <li><a href="app.php">Accueil</a></li>
</ul>
EOF;
    }

    private function age($date_naissance)
    {
        $am = explode('/', $date_naissance);
        $an = explode('/', date('d/m/Y'));

        if(($am[1] < $an[1]) || (($am[1] == $an[1]) && ($am[0] <= $an[0])))
            return $an[2] - $am[2];

        return $an[2] - $am[2] - 1;
    }
}