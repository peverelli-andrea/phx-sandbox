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
			HTML,
		);
	}
}

echo (new index())->render();
/*
$paragraph_large_render = Paragraph::render(
	props: new ParagraphProps(content: "Paragraph Large <i>italic</i> <b>emphasized <i>emphasized italic</i></b>"),
);
$paragraph_large_html = Bundler::getHtml(render: $paragraph_large_render);

$paragraph_medium_render = Paragraph::render(
	props: new ParagraphProps(
		content: "Paragraph Medium <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
		sub_role: TypographySubRole::MEDIUM,
	),
);
$paragraph_medium_html = Bundler::getHtml(render: $paragraph_medium_render);

$paragraph_small_render = Paragraph::render(
	props: new ParagraphProps(
		content: "Paragraph Small <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
		sub_role: TypographySubRole::SMALL,
	),
);
$paragraph_small_html = Bundler::getHtml(render: $paragraph_small_render);

$label_large_render = Label::render(
	props: new LabelProps(content: "Label Large <i>italic</i> <b>emphasized <i>emphasized italic</i></b>"),
);
$label_large_html = Bundler::getHtml(render: $label_large_render);

$label_medium_render = Label::render(
	props: new LabelProps(
		content: "Label Medium <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
		sub_role: TypographySubRole::MEDIUM,
	),
);
$label_medium_html = Bundler::getHtml(render: $label_medium_render);

$label_small_render = Label::render(
	props: new LabelProps(
		content: "Label Small <i>italic</i> <b>emphasized <i>emphasized italic</i></b>",
		sub_role: TypographySubRole::SMALL,
	),
);
$label_small_html = Bundler::getHtml(render: $label_small_render);

$icon_arrow_back_render = Icon::render(
	props: new IconProps(
		variant: IconVariant::ARROW_BACK,
	),
);
$icon_arrow_back_html = Bundler::getHtml(render: $icon_arrow_back_render);

$filled_button_render = (new FilledButton())->render(
	props: new FilledButtonProps(
		label: "Elevated Button",
		icon: IconVariant::ARROW_BACK,
	),
);
$filled_button_html = Bundler::getHtml(render: $filled_button_render);

$bundle = Bundler::make(
	component_renders: [
		$heading_display_large_render,
		$heading_display_medium_render,
		$heading_display_small_render,
		$heading_headline_large_render,
		$heading_headline_medium_render,
		$heading_headline_small_render,
		$heading_title_large_render,
		$heading_title_medium_render,
		$heading_title_small_render,
		$paragraph_large_render,
		$paragraph_medium_render,
		$paragraph_small_render,
		$label_large_render,
		$label_medium_render,
		$label_small_render,
		$icon_arrow_back_render,
		$filled_button_render,
	]
);

$css_bundle = Bundler::getCss(bundle: $bundle);
$scripts_before_bundle = Bundler::getScriptsBefore(bundle: $bundle);
$scripts_after_bundle = Bundler::getScriptsAfter(bundle: $bundle);

echo <<<HTML
<!DOCTYPE html>
<html>
	<head>
		<style>
			{$css_bundle}
		</style>
		<style>
			@media (prefers-color-scheme: dark) {
				body {
					background-color: black;
				}
			}
		</style>
	</head>
	<body>
		{$scripts_before_bundle}
		{$heading_display_large_html}
		{$heading_display_medium_html}
		{$heading_display_small_html}
		{$heading_headline_large_html}
		{$heading_headline_medium_html}
		{$heading_headline_small_html}
		{$heading_title_large_html}
		{$heading_title_medium_html}
		{$heading_title_small_html}
		{$paragraph_large_html}
		{$paragraph_medium_html}
		{$paragraph_small_html}
		{$label_large_html}
		<br />
		{$label_medium_html}
		<br />
		{$label_small_html}
		{$scripts_after_bundle}
		<br />
		{$icon_arrow_back_html}
		<br />
		{$filled_button_html}
	</body>
</html>
HTML;
*/
