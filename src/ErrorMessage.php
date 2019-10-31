<?php

namespace Tsungsoft\ErrorMessage;

use Laravel\Nova\Fields\Field;

class ErrorMessage extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'error-message';

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|null  $attribute
     * @param  mixed|null  $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->hideFromIndex();
        $this->hideFromDetail();
        $this->readonlyCallback = true;
    }
}
