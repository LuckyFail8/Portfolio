<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class, [
                'attr' => [
                    'minlenght' => '2',
                    'maxlenght' => '100',
                ],
                'label' => 'Nom / Prénom',
            ])
            ->add('companyName', TextType::class, [
                'attr' => [
                    'minlenght' => '2',
                    'maxlenght' => '180',
                ],
                'label' => 'Nom de l\'entreprise',
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'minlenght' => '2',
                    'maxlenght' => '180',
                ],
                'label' => 'Adresse email',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Email(),
                    new Assert\Length(['min' => 2, 'max' => 180]),
                ]
            ])
            ->add('subject', TextType::class, [
                'attr' => [
                    'minlenght' => '2',
                    'maxlenght' => '100',
                ],
                'label' => 'Sujet',
                'constraints' => [
                    new Assert\Length(['min' => 2, 'max' => 100]),
                ]
            ])
            ->add('message', TextareaType::class, [
                'attr' => [],
                'label' => 'Message',
                'constraints' => [
                    new Assert\NotBlank(),
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [],
                'label' => 'Soumettre la demande'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
