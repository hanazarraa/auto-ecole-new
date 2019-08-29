<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Application\Sonata\UserBundle\Admin;
use App\Application\Sonata\UserBundle\Entity\User;
use FOS\UserBundle\Model\UserManagerInterface;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Sonata\UserBundle\Form\Type\SecurityRolesType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\LocaleType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
class UserAdmin extends AbstractAdmin
{
    /**
     * @var UserManagerInterface
     */
    protected $userManager;

    /**
     * {@inheritdoc}
     */
    public function getFormBuilder()
    {
        $this->formOptions['data_class'] = $this->getClass();

        $options = $this->formOptions;
        $options['validation_groups'] = (!$this->getSubject() || null === $this->getSubject()->getId()) ? 'Registration' : 'Profile';

        $formBuilder = $this->getFormContractor()->getFormBuilder($this->getUniqid(), $options);

        $this->defineFormBuilder($formBuilder);

        return $formBuilder;
    }

    /**
     * {@inheritdoc}
     */
   /* public function getExportFields()
    {
        // avoid security field to be exported
        return array_filter(parent::getExportFields(), static function ($v) {
            return !\in_array($v, ['password', 'salt'], true);
        });
    }*/

    /**
     * {@inheritdoc}
     */
  /*  public function preUpdate($user): void
    {
        $this->getUserManager()->updateCanonicalFields($user);
        $this->getUserManager()->updatePassword($user);
    }
*/
    /**
     * @param UserManagerInterface $userManager
     */
    public function setUserManager(UserManagerInterface $userManager): void
    {
        $this->userManager = $userManager;
    }

    /**
     * @return UserManagerInterface
     */
    public function getUserManager()
    {
        return $this->userManager;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
           ->addIdentifier('user.username')
            ->add('user.email')
            //->add('groups')
            ->add('user.enabled', null, ['editable' => true])
            ->add('user.createdAt')
        ;

      /*  if ($this->isGranted('ROLE_ALLOWED_TO_SWITCH')) {
            $listMapper
                ->add('impersonating', 'string', ['template' => '@SonataUser/Admin/Field/impersonating.html.twig'])
            ;
        }*/
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper): void
    {
        $filterMapper
            ->add('id')
             ->add('user.username')
            ->add('user.email')
            //->add('groups')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->with('General')
               >add('user.username')
            ->add('user.email')
            ->end()
            
            ->with('Profile')
                ->add('user.dateOfBirth')
                ->add('user.firstname')
                ->add('user.lastname')
                //->add('website')
                //->add('biography')
                ->add('user.gender')
               // ->add('locale')
                //->add('timezone')
                ->add('user.phone')
            ->end()
            
           
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper): void
    {
        // define group zoning
        $formMapper
            ->tab('default')
                ->with('Profile', ['class' => 'col-md-6'])->end()
                ->with('General', ['class' => 'col-md-6'])->end()
                ->with('Social', ['class' => 'col-md-6'])->end()
            ->end()
            ->tab('Security')
                ->with('Status', ['class' => 'col-md-4'])->end()
              //  ->with('Groups', ['class' => 'col-md-4'])->end()
                ->with('Keys', ['class' => 'col-md-4'])->end()
                ->with('Roles', ['class' => 'col-md-12'])->end()
            ->end()
        ;

        $now = new \DateTime();

        $genderOptions = [
            'choices' =>  (User::class)->getSubject()->getGenderList(), 
            'required' => true,
            'translation_domain' => (User::class)->getTranslationDomain(),
        ];

        // NEXT_MAJOR: Remove this when dropping support for SF 2.8
       if (method_exists(FormTypeInterface::class, 'setDefaultOptions')) {
            $genderOptions['choices_as_values'] = true;
        }

        $formMapper
            
                ->with('General')
                   
                    ->add('username',TextType::class,array('mapped'=>false,'property_path' => 'user.username'))
                    ->add('email',EmailType::class,array('mapped'=>false,'property_path' => 'user.email'))
                    ->add('plainPassword', TextType::class,array('mapped'=>false,'property_path' => 'user.plainPassword'))
                        
                ->end()
                ->with('Profile')
                    ->add('dateOfBirth', DatePickerType::class, array('mapped'=>false,'property_path' => 'user.dateOfBirth'),[
                        'years' => range(1900, $now->format('Y')),
                        'dp_min_date' => '1-1-1900',
                        'dp_max_date' => $now->format('c'),
                        'required' => false,
                    ])

                    ->add('firstname', TextType::class, array('mapped'=>false,'property_path' => 'user.firstname'),['required' => false])
                    ->add('lastname',TextType::class,array('mapped'=>false,'property_path' => 'user.lastname'), ['required' => false])
                    //->add('website', UrlType::class, ['required' => false])
                   // ->add('biography', TextType::class, ['required' => false])
                    ->add('gender', ChoiceType::class,array('mapped'=>false,'property_path' => 'user.gender'))
                    //->add('locale', LocaleType::class, ['required' => false])
                    //->add('timezone', TimezoneType::class, ['required' => false])
                    ->add('phone', TextType::class, array('mapped'=>false,'property_path' => 'user.phone'),['required' => false])
                   
                    ->end()
                    
                   
              
            ->end()
            ->tab('Security')
                
                
                //->with('Roles')
                   // ->add('realRoles', SecurityRolesType::class,array('mapped'=>false,'property_path' => 'user.realRoles'), [
                       // 'label' => 'form.label_roles',
                        //'multiple' => true,
                       // 'required' => true,
                   // ])
                //->end()
                
            
        ;
       

       // $id =( User::class)->getId();
       
          
    }
    }

