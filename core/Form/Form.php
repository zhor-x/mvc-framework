<?php

namespace app\core\Form;

use app\core\Model;

class Form
{

    public static function begin($action = '', $method = 'post'): Form
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);

        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute): InputField
    {
        return new InputField($model, $attribute);
    }

    public function textareaField($model, $attribute): TextareaField
    {
        return new TextareaField($model, $attribute);
    }
}