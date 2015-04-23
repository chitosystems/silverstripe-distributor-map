<?php

/**
 * Class DistributorPage
 * @author Patrick Chitovoro
 */
class DistributorPage extends Page
{
    private static $can_be_root = true;
    public static $db = array();
    public static $has_one = array();
    public static $has_many = array(
        "Distributors" => "Distributor",
    );

    public function getCMSFields()
    {
        $f = parent::getCMSFields();
        $gridFieldConfig = GridFieldConfig_RecordEditor::create();
        $gridField = new GridField('Distributors', 'Testimonials', $this->Distributors(), $gridFieldConfig);
        $f->addFieldToTab('Root.Distributors', $gridField);

        return $f;
    }
}

class DistributorPage_Controller extends Page_Controller
{

    public function init()
    {
        parent:: init();

        $aVars = array(
            'Address' => $this->Address,
            'Project' => PROJECT,
            'Module'=>DISTRIBUTOR_MAP__DIR,
            'Distributors' => $this->DistributorList()
        );
        Requirements::javascriptTemplate(PROJECT . '/js/GoogleMapCode.js', $aVars);

    }


    function DistributorList()
    {
        $aPlaces = array();
        $Distributors = $this->Distributors();
        if (count($Distributors)) {
            foreach ($Distributors as $record) {
                $aPlaces [] = sprintf(" ['%s', '%s', %s, %s, %s]",
                    Convert::raw2sql($record->Name),
                    Convert::raw2sql($record->Town),
                    Convert::raw2sql($record->Latitude),
                    Convert::raw2sql($record->Longitude),
                    Convert::raw2sql($this->getInfoWindow($record))
                );
            }
        }
        return implode(',', $aPlaces);
    }

    /**
     * @param Distributor $record
     */
    function getInfoWindow(Distributor $record)
    {
        if ($record->ImageID) {
            $image = $record->Image();
        }

        $data = array();
    }

}
