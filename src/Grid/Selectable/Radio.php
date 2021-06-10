<?php

namespace LaraCore\Admin\Grid\Selectable;

use LaraCore\Admin\Grid\Displayers\AbstractDisplayer;

class Radio extends AbstractDisplayer
{
    public function display($key = '')
    {
        $value = $this->getAttribute($key);

        return <<<EOT
<input type="radio" name="item" class="select" value="{$value}"/>
EOT;
    }
}
