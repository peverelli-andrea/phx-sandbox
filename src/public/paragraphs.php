<?php

namespace Phx\Sandbox\public;

require_once("../../vendor/autoload.php");

use Phx\Atom\Paragraph\Paragraph;
use Phx\Core\TypographySubRole;
use Phx\Core\Page;

final class paragraphs extends Page
{
	final public function __construct() {}

	final public function render(): string
	{
		$paragraph_large = $this->newComponent(
			component: Paragraph::class,
			props: [
				"content" => "Paragraph Large <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
			],
		);

		$paragraph_medium = $this->newComponent(
			component: Paragraph::class,
			props: [
				"content" => "Paragraph Medium <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
				"sub_role" => TypographySubRole::MEDIUM,
			],
		);

		$paragraph_small = $this->newComponent(
			component: Paragraph::class,
			props: [
				"content" => "Paragraph Small <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
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
			$paragraph_large
			$paragraph_medium
			$paragraph_small
			HTML,
		);
	}
}

echo (new paragraphs())->render();
