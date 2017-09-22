<?php

namespace Rjeny\Jira\Entities\Fields;

class ProjectPicker extends Field
{
    function __construct($id, $values)
    {
        if (!is_array($values)) {
            $values = [$values];
        } else {
            $values = array_values($values);
        }

        parent::__construct($id, $values);
    }

    /**
     * Returns field value for requests
     *
     * @return array
     */
    public function getField()
    {
        $field = [];
        foreach ($this->value as $value) {
            if (is_int($value)) {
                $field[] = ['id' => (string)$value];
            } else {
                $field[] = ['key' => $value];
            }
        }

        return $field;
    }
}