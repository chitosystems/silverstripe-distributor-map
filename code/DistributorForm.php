<?php

class DistributorForm extends Form
{
    function __construct($controller, $name)
    {

        $f = new FieldList();
        $f->push(BootstrapTextField::create('Name'));
        $f->push(BootstrapTextField::create('Surname'));
        $f->push(BootstrapEmailField::create('Email'));
        $f->push(CustomCountryDropdownField::create('Country')->setEmptyString('--please select--'));
        $f->push(BootstrapTextField::create('Town'));
        $f->push(BootstrapTextField::create('Latitude'));
        $f->push(BootstrapTextField::create('Longitude'));
        $f->push(FileAttachmentField::create('Image')->setView('list')
            ->setThumbnailHeight(180)
            ->setThumbanilWidth(180)
            ->setAutoProcessQueue(false)
            ->setMaxFilesize(1)
            ->imagesOnly());

        $f->push(BootstrapTextareaField::create('Description'));
        $actions = new FieldList(
            $btn = new FormAction('doSubmit', 'Submit')
        );
        $btn->addExtraClass("btn");

        $aRequiredFields = array();
        $aRequiredFields[] = "Name";
        $aRequiredFields[] = "Email";
        $aRequiredFields[] = "Description";
        $requiredFields = new RequiredFields();

        parent::__construct($controller, $name, $f, $actions, $requiredFields);
        $this->addExtraClass('form-horizontal');
        //$this->loadValidationScripts($this, $aRequiredFields);
    }

    function doSubmit(array $raw_data, Form $form)
    {
        $controller = $form->getController();
        $data = Convert::raw2sql($raw_data);

        $submission = new Distributor();
        $form->saveInto($submission);
        $submission->DistributorPageID = $controller->ID;
        $submission->write();

        return $controller->redirect($controller->Link());
    }
}