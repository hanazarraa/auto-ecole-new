<?php

namespace App\Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\Group as BaseGroup;
use Sonata\AdminBundle\Util\ObjectAclManipulatorInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Exception\ModelManagerException;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;

/**
 * Group
 *
 * @ORM\Table(name="fos_group")
 * @ORM\Entity
 */
class Group extends BaseGroup implements ObjectAclManipulatorInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
     */
    protected $users;
    public function __toString() {
        return $this->name;
    }
    public function batchConfigureAcls(
        OutputInterface $output,
        AdminInterface $admin,
        UserSecurityIdentity $securityIdentity = null
    ){}
}