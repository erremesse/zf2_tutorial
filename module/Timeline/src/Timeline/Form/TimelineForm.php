<?php
namespace Timeline\Form;

use Zend\Form\Form;

class TimelineForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('timeline');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'start_date',
            'type' => 'Date',
            'options' => array(
                'label' => 'Start Date',
            ),
        ));
        $this->add(array(
            'name' => 'end_date',
            'type' => 'Date',
            'options' => array(
                'label' => 'End Date',
            ),
        ));
        $this->add(array(
            'name' => 'headline',
            'type' => 'Text',
            'options' => array(
                'label' => 'Headline',
            ),
        ));
        $this->add(array(
            'name' => 'text',
            'type' => 'Text',
            'options' => array(
                'label' => 'Text',
            ),
        ));
        $this->add(array(
            'name' => 'media',
            'type' => 'Text',
            'options' => array(
                'label' => 'Media',
            ),
        ));
        $this->add(array(
            'name' => 'media_credit',
            'type' => 'Text',
            'options' => array(
                'label' => 'Media Credit',
            ),
        ));
        $this->add(array(
            'name' => 'media_caption',
            'type' => 'Text',
            'options' => array(
                'label' => 'Media Caption',
            ),
        ));
        $this->add(array(
            'name' => 'media_thumbnail',
            'type' => 'Text',
            'options' => array(
                'label' => 'Media Thumbnail',
            ),
        ));
        $this->add(array(
            'name' => 'type',
            'type' => 'Text',
            'options' => array(
                'label' => 'Type',
            ),
        ));
        //MISSING TAG
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}