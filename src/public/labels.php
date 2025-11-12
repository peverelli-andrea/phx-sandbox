<?php

namespace Phx\Sandbox\public;

require_once("../../vendor/autoload.php");

use Phx\Atom\Label\Label;
use Phx\Core\TypographySubRole;
use Phx\Core\Page;

final class labels extends Page
{
	final public function __construct() {}

	final public function render(): string
	{
		$label_large = $this->newComponent(
			component: Label::class,
			props: [
				"content" => "Label Large <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
			],
		);

		$label_medium = $this->newComponent(
			component: Label::class,
			props: [
				"content" => "Label Medium <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
				"sub_role" => TypographySubRole::MEDIUM,
			],
		);

		$label_small = $this->newComponent(
			component: Label::class,
			props: [
				"content" => "Label Small <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
				"sub_role" => TypographySubRole::SMALL,
			],
		);

		return $this->makeRender(
			head: function(string $css): string
			{
				return <<<HTML
				<style>
					$css
				</style>
				<style>
					body { background-color: white; }

					a { color: black; }

					@media (prefers-color-scheme: dark) {
						body { background-color: black; }

						a { color: white; }
					}
				</style>
				HTML;
			},
			body: <<<HTML
			<a href="/index.php">BACK</a>
			<br />
			<br />
			$label_large
			<br />
			$label_medium
			<br />
			$label_small
			HTML,
		);
	}
}

echo (new labels())->render();
