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

$heading_render = Heading::render(
	props: new HeadingProps(content: "Heading H1"),
);
$heading_html = Bundler::getHtml(render: $heading_render);

$paragraph_render = Paragraph::render(
	props: new ParagraphProps(content: "Paragraph"),
);
$paragraph_html = Bundler::getHtml(render: $paragraph_render);

$label_render = Label::render(
	props: new LabelProps(content: "Label"),
);
$label_html = Bundler::getHtml(render: $label_render);

$bundle = Bundler::make(
	component_renders: [
		$heading_render,
		$paragraph_render,
		$label_render,
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
	</head>
	<body>
		{$scripts_before_bundle}
		{$heading_html}
		{$paragraph_html}
		{$label_html}
		{$scripts_after_bundle}
	</body>
</html>
HTML;
