<?php
namespace Timeline\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Timeline{
    
public $id_timeline;
public $start_date;
public $end_date;
public $headline;
public $text;
public $media;
public $media_credit;
public $media_caption;
public $media_thumbnail;
public $type;

protected $inputFilter;
//TODO
public function exchangeArray($data)
{
    $this->id_timeline     = (!empty($data['id_timeline'])) ? $data['id_timeline'] : null;
    $this->start_date = (!empty($data['start_date'])) ? $data['start_date'] : null;
    $this->headline  = (!empty($data['headline'])) ? $data['headline'] : null;
    $this->text  = (!empty($data['text'])) ? $data['text'] : null;
    
}

public function getArrayCopy()
{
    return get_object_vars($this);
}

public function setInputFilter(InputFilterInterface $inputFilter)
{
    throw new \Exception("Not used");
}

public function getInputFilter()
{
    if (!$this->inputFilter) {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name'     => 'id_timeline',
            'required' => true,
            'filters'  => array(
                array('name' => 'Int'),
            ),
        ));

        $inputFilter->add(array(
            'name'     => 'start_date',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
//             'validators' => array(
//                 array(
//                     'name'    => 'StringLength',
//                     'options' => array(
//                         'encoding' => 'UTF-8',
//                     ),
//                 ),
//             ),
        ));

        $inputFilter->add(array(
            'name'     => 'headline',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 100,
                    ),
                ),
            ),
        ));
        
        $inputFilter->add(array(
            'name'     => 'text',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 500,
                    ),
                ),
            ),
        ));

        $this->inputFilter = $inputFilter;
    }

    return $this->inputFilter;
}

}