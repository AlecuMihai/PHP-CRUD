<?php
    function inputElement($icon, $placeholder, $name, $value) {
        $element = "
            <div class=\"input-group mb-2\">
                            <div class=\"input-group-prepend\">
                                <div class=\"input-group-text bg-warning\">
                                    $icon
                                </div>
                            </div>
                            <input type=\"text\" name=\"$name\" value=\"$value\" autocomplete=\"off\" class=\"form-control\" id=\"inlinFormInputGroup\" placeholder=\"$placeholder\">
                        </div>
        ";
        echo $element;
    }

    function buttonElement($btnid, $styleclass, $text, $name, $attr){
        $btn="
            <button name='$name' '$attr' class='$styleclass' id='$btnid'>$text</button>
        ";
        echo $btn;
    }
?>