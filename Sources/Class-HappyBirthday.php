<?php

/**
 * Class-HappyBirthday.php
 *
 * @package HappyBirthday
 * @link https://dragomano.ru/mods/happy-birthday
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2010-2020 Bugo
 * @license https://opensource.org/licenses/MIT The MIT License
 *
 * @version 0.4
 */

if (!defined('SMF'))
	die('Hacking attempt...');

class HappyBirthday
{
	public static function prepareDisplayContext(&$output)
	{
		global $context, $scripturl, $settings, $txt;

		if (!$context['user']['is_guest'] && isset($output['member']['birth_date']) && (substr($output['member']['birth_date'], 5, 5) == date('m-d')) && !strpos($output['body'], 'code')) {
			loadLanguage('HappyBirthday/');

			$output['body'] .= '<div class="floatright"><a href="' . $scripturl. '?action=profile;u=' . $output['member']['id'] . '"><img src="' . $settings['default_images_url'] . '/sweet/' . rand(1,26) . '.png" width="64" height="64" alt="' . $txt['happy_birthday_text'] . '" title="' . $txt['happy_birthday_text'] . '"></a></div>';
		}
	}
}
