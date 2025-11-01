<?php

namespace Phx\Sandbox\public;

require_once("../../vendor/autoload.php");

use Phx\Core\Bundler;
use Phx\Atom\Paragraph\Paragraph;
use Phx\Atom\Paragraph\ParagraphProps;
use Phx\Atom\Label\Label;
use Phx\Atom\Label\LabelProps;
use Phx\Atom\Heading\Heading;
use Phx\Atom\Heading\HeadingProps;
use Phx\Atom\Heading\HeadingLevel;
use Phx\Core\TypographyRole;
use Phx\Core\TypographySubRole;
use Phx\Atom\Icon\Icon;
use Phx\Atom\Icon\IconProps;
use Phx\Atom\Icon\IconVariant;
use Phx\Molecule\FilledButton\FilledButton;
use Phx\Molecule\FilledButton\FilledButtonProps;
use Phx\Core\Page;

final class index extends Page
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

		// PARAGRAPHS

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

		// LABELS

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

		// ICONS

		$icon_arrow_back = $this->newComponent(
			component: Icon::class,
			props: [
				"variant" => IconVariant::ARROW_BACK,
			],
		);

		// FILLED BUTTONS

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
					@media (prefers-color-scheme: dark) {
						body {
							background-color: black;
						}
					}
				</style>
				HTML;
			},
			body: <<<HTML
			$heading_display_large
			$heading_display_medium
			$heading_display_small
			$heading_headline_large
			$heading_headline_medium
			$heading_headline_small
			$heading_title_large
			$heading_title_medium
			$heading_title_small
			$paragraph_large
			$paragraph_medium
			$paragraph_small
			$label_large
			<br />
			$label_medium
			<br />
			$label_small
			<br />
			$icon_arrow_back
			<br />
			<div style="width:256px">
				$filled_button_elevated
			</div>
			<br />
			<br />
			HTML,
		);
	}
}

echo (new index())->render();
