<?php

namespace srag\RequiredData\HelpMe\Field\Field\Checkbox;

use srag\RequiredData\HelpMe\Field\AbstractField;

/**
 * Class CheckboxField
 *
 * @package srag\RequiredData\HelpMe\Field\Field\Checkbox
 */
class CheckboxField extends AbstractField
{

    const TABLE_NAME_SUFFIX = "chck";


    /**
     * @inheritDoc
     */
    public function getFieldDescription() : string
    {
        return "";
    }
}
