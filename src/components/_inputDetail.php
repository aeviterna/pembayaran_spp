<?php
	function createInputElement($inputObject): string
	{
		switch ($inputObject["type"]) {
			case "text":
			case "number":
				$element = '<input class="form-control" id="' . $inputObject["name"] . '" style="width: 100%;" type="' . $inputObject["type"] . '" name="' . $inputObject["name"] . '" value="' . $inputObject["value"] . '" placeholder="' . $inputObject["placeholder"] . '" required/>';
				break;
			case "select":
				$element = '<select class="form-control select2bs4" id="' . $inputObject["name"] . '" style="width: 100%;" name="' . $inputObject["name"] . '" required>';
				$element .= '<option value="">' . $inputObject["placeholder"] . '</option>';
				foreach ($inputObject["value"][0] as $optionObject) {
					if ($inputObject["value"][1] == $optionObject[0]) {
						$element .= '<option value="' . $optionObject[0] . '" selected>' . $optionObject[1] . '</option>';
					} else {
						$element .= '<option value="' . $optionObject[0] . '">' . $optionObject[1] . '</option>';
					}
				}
				$element .= '</select>';
				break;
			case "textarea":
				$element = '<textarea class="form-control" id="' . $inputObject["name"] . '" style="width: 100%;" name="' . $inputObject["name"] . '" placeholder="' . $inputObject["placeholder"] . '" rows="5" required>' . $inputObject["value"] . '</textarea>';
				break;
			default:
				$element = '';
		}

		if (!$inputObject["enable"]) {
			$element = str_replace('<input', '<input disabled', $element);
			$element = str_replace('<textarea', '<textarea disabled', $element);
		}

		return $element;
	}




