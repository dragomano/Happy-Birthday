<?php

/**
 * Class-HappyBirthday.php
 *
 * @package HappyBirthday
 * @link https://github.com/dragomano/Happy-Birthday
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2010-2022 Bugo
 * @license https://opensource.org/licenses/MIT The MIT License
 *
 * @version 0.5
 */

if (!defined('SMF'))
	die('Hacking attempt...');

class HappyBirthday
{
	public function prepareDisplayContext(&$output)
	{
		global $context, $scripturl, $settings, $txt;

		if ($context['user']['is_guest'] || empty($output['member']['birth_date']))
			return;

		if (substr($output['member']['birth_date'], 5, 5) == date('m-d') && !strpos($output['body'], 'code')) {
			loadLanguage('HappyBirthday/');

			$output['body'] .= '<div class="floatright"><a href="' . $scripturl. '?action=profile;u=' . $output['member']['id'] . '"><img src="' . $settings['default_images_url'] . '/sweet/' . rand(1,26) . '.png" width="64" height="64" alt="' . $txt['happy_birthday_text'] . '" title="' . $txt['happy_birthday_text'] . '"></a></div>';
		}
	}
}
