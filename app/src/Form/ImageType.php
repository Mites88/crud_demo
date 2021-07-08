<?php

namespace App\Form;

use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['constraints' => array(new NotBlank())])
            ->add('title')
            ->add('imageFile', VichImageType::class, [
                'constraints' => array(
                    new File(array(
                        'maxSize' => '5M',
                        'mimeTypes' =>
                        array(
                            'image/jpeg',
                            'image/png',
                            'image/jpg',
                            'image/gif',
                        ),
                    )),
                ),
                'required' => false,
                'allow_delete' => true,
                'download_link' => true,
                'label' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
        ]);
    }
}
