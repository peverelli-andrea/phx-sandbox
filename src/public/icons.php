<?php

namespace Phx\Sandbox\public;

require_once("../../vendor/autoload.php");

use Phx\Atom\Icon\Icon;
use Phx\Atom\Icon\IconVariant;
use Phx\Core\Page;

final class icons extends Page
{
	final public function __construct() {}

	final public function render(): string
	{
		$icon_arrow_back = $this->newComponent(
			component: Icon::class,
			props: [
				"variant" => IconVariant::ARROW_BACK,
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
			$icon_arrow_back
			HTML,
		);
	}
}

echo (new icons())->render();
