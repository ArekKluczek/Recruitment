<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Authors;
use App\Entity\News;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsType extends AbstractType
{
    /**
     *  Builds News form.
     *
     * @param FormBuilderInterface $builder
     *  Form builder.
     * @param array $options
     *  Options.
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('text', TextareaType::class)
            ->add('authors', EntityType::class, [
                'class' => Authors::class,
                'choice_label' => 'name',
                'multiple' => true,
                'by_reference' => false,
            ]);
    }

    /**
     *  Configure options.
     *
     * @param OptionsResolver $resolver
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}
