<?php

namespace Phx\Sandbox\public;

require_once("../../vendor/autoload.php");

use Phx\Atom\Icon\IconVariant;
use Phx\Molecule\FilledButton\FilledButton;
use Phx\Core\Page;

final class filled_buttons extends Page
{
	final public function __construct() {}

	final public function render(): string
	{
		$filled_button_elevated = $this->newComponent(
			component: FilledButton::class,
			props: [
				"label" => "Elevated Button",
				"icon" => IconVariant::ARROW_BACK,
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
			<a href="index.php">BACK</a>
			<br />
			<br />
			<div style="width:256px">
				$filled_button_elevated
			</div>
			HTML,
		);
	}
}

echo (new filled_buttons())->render();
