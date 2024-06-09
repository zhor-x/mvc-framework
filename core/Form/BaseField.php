<?php

namespace app\core\Form;

use app\core\Model;

abstract class BaseField
{
    abstract public function renderInput(): string;
    public string $attribute;
    public string $type;

    public Model $model;

    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString(): string
    {
        return sprintf(
            '<div class="form-group">
                <label>%s</label>
                %s
                 <div class="invalid-feedback">
                    %s
                </div>
            </div>',
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
}