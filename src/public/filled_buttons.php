<?php

namespace Phx\Sandbox\public;

require_once("../../vendor/autoload.php");

use Phx\Atom\Icon\IconVariant;
use Phx\Molecule\FilledButton\FilledButton;
use Phx\Molecule\FilledButton\FilledButtonVariant;
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
			get_ids: true,
		);
		$filled_button_elevated_disabled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"label" => "Disabled Elevated Button",
				"icon" => IconVariant::ARROW_BACK,
				"disabled" => true,
			],
		);
		$filled_button_elevated_untoggled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"label" => "Untoggled Elevated Button",
				"icon" => IconVariant::ARROW_BACK,
				"toggleable" => true,
			],
		);
		$filled_button_elevated_toggled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"label" => "Toggled Elevated Button",
				"icon" => IconVariant::ARROW_BACK,
				"toggleable" => true,
				"toggled" => true,
			],
		);
	
		$filled_button_filled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::FILLED,
				"label" => "Filled Button",
				"icon" => IconVariant::ARROW_BACK,
			],
		);
		$filled_button_filled_disabled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::FILLED,
				"label" => "Disabled Filled Button",
				"icon" => IconVariant::ARROW_BACK,
				"disabled" => true,
			],
		);
		$filled_button_filled_untoggled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::FILLED,
				"label" => "Untoggled Filled Button",
				"icon" => IconVariant::ARROW_BACK,
				"toggleable" => true,
			],
		);
		$filled_button_filled_toggled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::FILLED,
				"label" => "Toggled Filled Button",
				"icon" => IconVariant::ARROW_BACK,
				"toggleable" => true,
				"toggled" => true,
			],
		);

		$filled_button_tonal = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::TONAL,
				"label" => "Tonal Button",
				"icon" => IconVariant::ARROW_BACK,
			],
		);
		$filled_button_tonal_disabled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::TONAL,
				"label" => "Disabled Tonal Button",
				"icon" => IconVariant::ARROW_BACK,
				"disabled" => true,
			],
		);
		$filled_button_tonal_untoggled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::TONAL,
				"label" => "Untoggled Tonal Button",
				"icon" => IconVariant::ARROW_BACK,
				"toggleable" => true,
			],
		);
		$filled_button_tonal_toggled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::TONAL,
				"label" => "Toggled Tonal Button",
				"icon" => IconVariant::ARROW_BACK,
				"toggleable" => true,
				"toggled" => true,
			],
		);

		$filled_button_outlined = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::OUTLINED,
				"label" => "Outlined Button",
				"icon" => IconVariant::ARROW_BACK,
			],
		);
		$filled_button_outlined_disabled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::OUTLINED,
				"label" => "Disabled Outlined Button",
				"icon" => IconVariant::ARROW_BACK,
				"disabled" => true,
			],
		);
		$filled_button_outlined_untoggled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::OUTLINED,
				"label" => "Untoggled Outlined Button",
				"icon" => IconVariant::ARROW_BACK,
				"toggleable" => true,
			],
		);
		$filled_button_outlined_toggled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::OUTLINED,
				"label" => "Toggled Outlined Button",
				"icon" => IconVariant::ARROW_BACK,
				"toggleable" => true,
				"toggled" => true,
			],
		);

		$filled_button_text = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::TEXT,
				"label" => "Text Button",
				"icon" => IconVariant::ARROW_BACK,
			],
		);
		$filled_button_text_disabled = $this->newComponent(
			component: FilledButton::class,
			props: [
				"variant" => FilledButtonVariant::TEXT,
				"label" => "Disabled Text Button",
				"icon" => IconVariant::ARROW_BACK,
				"disabled" => true,
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

					.buttons_group {
						display: flex;
						flex-direction: row;
						flex-wrap: true;
						gap: 16px;
					}
				</style>
				HTML;
			},
			body: <<<HTML
			<a href="index.php">BACK</a>
			<br />
			<br />
				<div class="buttons_group">
					{$filled_button_elevated->html}
					<br />
					$filled_button_elevated_disabled
					<br />
					$filled_button_elevated_untoggled
					<br />
					$filled_button_elevated_toggled
				</div>
				<br />
				<div class="buttons_group">
					$filled_button_filled
					<br />
					$filled_button_filled_disabled
					<br />
					$filled_button_filled_untoggled
					<br />
					$filled_button_filled_toggled
				</div>
				<br />
				<div class="buttons_group">
					$filled_button_tonal
					<br />
					$filled_button_tonal_disabled
					<br />
					$filled_button_tonal_untoggled
					<br />
					$filled_button_tonal_toggled
				</div>
				<br />
				<div class="buttons_group">
					$filled_button_outlined
					<br />
					$filled_button_outlined_disabled
					<br />
					$filled_button_outlined_untoggled
					<br />
					$filled_button_outlined_toggled
				</div>
				<br />
				<div class="buttons_group">
					$filled_button_text
					<br />
					$filled_button_text_disabled
				</div>
			</div>
			<script>
				function onClick(id) {
					console.log(id);
				}

				document
					.getElementById("{$filled_button_elevated->ids[0]}")
					.addEventListener("click", () => onClick("Filled Button Elevated"));
			</script>
			HTML,
		);
	}
}

echo (new filled_buttons())->render();
