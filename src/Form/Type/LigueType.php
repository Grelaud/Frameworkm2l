<?php

namespace FrameworkM2L\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LigueType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('content', 'textarea');
    }

    public function getLabel() {
        return 'lebel';
    }
}