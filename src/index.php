<?php

namespace Phx\Sandbox;

require_once("../vendor/autoload.php");

use Phx\Core\Bundler;
use Phx\Atom\Paragraph\Paragraph;
use Phx\Atom\Paragraph\ParagraphProps;
use Phx\Atom\Label\Label;
use Phx\Atom\Label\LabelProps;

$paragraph_render = Paragraph::render(
	props: new ParagraphProps(content: "Paragraph")
);
$paragraph_html = Bundler::getHtml($paragraph_render);

$label_render = Label::render(
	props: new LabelProps(content: "Label"),
);
$label_html = Bundler::getHtml($label_render);

$bundle = Bundler::make(component_renders: [$paragraph_render, $label_render]);

$css_bundle = Bundler::getCss(bundle: $bundle);
$scripts_before_bundle = Bundler::getScriptsBefore(bundle: $bundle);
$scripts_after_bundle = Bundler::getScriptsAfter(bundle: $bundle);

echo <<<HTML
<!DOCTYPE html>
<html>
	<head>
		{$css_bundle}
	</head>
	<body>
		{$scripts_before_bundle}
		{$paragraph_html}
		{$label_html}
		{$scripts_after_bundle}
	</body>
</html>
HTML;
