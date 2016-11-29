<?php
/**
 * Created by PhpStorm.
 * User: brodriguez
 * Date: 22/11/16
 * Time: 08:14 PM
 */

namespace Productos\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class FileUploadFilter implements InputFilterAwareInterface
{
    public $fileupload;
    protected $inputFilter;

    public function exchangeArray($data)
    {
       /// $this->fileupload  = (isset($data['fileupload']))  ? $data['fileupload']     : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add(
                $factory->createInput(array(
                    'name'     => 'fileupload',
                    'required' => false,
                ))
            );

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}