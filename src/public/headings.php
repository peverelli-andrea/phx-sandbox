<?php

namespace Phx\Sandbox\public;

require_once("../../vendor/autoload.php");

use Phx\Core\Page;
use Phx\Core\TypographyRole;
use Phx\Core\TypographySubRole;
use Phx\Atom\Heading\Heading;
use Phx\Atom\Heading\HeadingLevel;

final class headings extends Page
{
	final public function __construct() {}

	final public function render(): string
	{
		// HEADINGS

		$heading_display_large = $this->newComponent(
			component: Heading::class,
			props: [
				"content" => "Heading H1 Display Large <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
			],
		);

		$heading_display_medium = $this->newComponent(
			component: Heading::class,
			props: [
				"content" => "Heading H1 Display Medium <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
				"sub_role" => TypographySubRole::MEDIUM,
			],
		);

		$heading_display_small = $this->newComponent(
			component: Heading::class,
			props: [
				"content" => "Heading H1 Display Small <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
				"sub_role" => TypographySubRole::SMALL,
			],
		);

		$heading_headline_large = $this->newComponent(
			component: Heading::class,
			props: [
				"content" => "Heading H1 Headline Large <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
				"role" => TypographyRole::HEADLINE,
			],
		);

		$heading_headline_medium = $this->newComponent(
			component: Heading::class,
			props: [
				"content" => "Heading H2 Headline Medium <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
				"role" => TypographyRole::HEADLINE,
				"sub_role" => TypographySubRole::MEDIUM,
				"level" => HeadingLevel::H2,
			],
		);

		$heading_headline_small = $this->newComponent(
			component: Heading::class,
			props: [
				"content" => "Heading H3 Headline Small <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
				"role" => TypographyRole::HEADLINE,
				"sub_role" => TypographySubRole::SMALL,
				"level" => HeadingLevel::H3,
			],
		);

		$heading_title_large = $this->newComponent(
			component: Heading::class,
			props: [
				"content" => "Heading H4 Title Large <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
				"role" => TypographyRole::TITLE,
				"level" => HeadingLevel::H4,
			],
		);

		$heading_title_medium = $this->newComponent(
			component: Heading::class,
			props: [
				"content" => "Heading H5 Title Medium <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
				"role"=> TypographyRole::TITLE,
				"sub_role" => TypographySubRole::MEDIUM,
				"level"=> HeadingLevel::H5,
			],
		);

		$heading_title_small = $this->newComponent(
			component: Heading::class,
			props: [
				"content" => "Heading H6 Title Small <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
				"role" => TypographyRole::TITLE,
				"sub_role" => TypographySubRole::SMALL,
				"level"=> HeadingLevel::H6,
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
			$heading_display_large
			$heading_display_medium
			$heading_display_small
			$heading_headline_large
			$heading_headline_medium
			$heading_headline_small
			$heading_title_large
			$heading_title_medium
			$heading_title_small
			HTML,
		);
	}
}

echo (new headings())->render();
