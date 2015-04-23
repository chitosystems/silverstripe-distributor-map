<?php

class Distributor extends DataObject {

    public static $default_sort = 'SortOrder';
    static $db = array(
        'Name' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
        'ContactNumber' => 'Varchar(255)',
        'Latitude' => 'Decimal(12,6)',
        'Longitude' => 'Decimal(12,6)',
        'Town' => 'Varchar(255)',
        'SortOrder' => 'Int',
    );
    static $has_one = array(
        "Image"=>"FittedImage",
        'DistributorPage' => 'DistributorPage',
    );
    static $summary_fields = array(
        'Name',
        'Email',
        'ContactNumber',
        'Latitude',
        'Longitude',
    );

    function Address() {
        $address = array(
            $this->Name, $this->Email, $this->ContactNumber, $this->Town
        );
        return implode(', ', array_filter($address));
    }

    function getCMSFields() {
        $f = parent::getCMSFields();
        $f->removeByName(array('SortOrder','Image'));

        $f->removeByName('SortOrder');

        $f->addFieldsToTab('Root.Main', $HeroImage = new UploadField('Image', 'Please upload a Hero image <span>(max. 1 files)</span>'));
        $HeroImage->setAllowedFileCategories('image');
        $HeroImage->setAllowedMaxFileNumber(1);
        $HeroImage->getValidator()->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));
        $HeroImage->setConfig('allowedMaxFileNumber', 1);
        $HeroImage->setFolderName('Uploads/Distributors/' . $this->URLSegment);
        return $f;
    }

}
