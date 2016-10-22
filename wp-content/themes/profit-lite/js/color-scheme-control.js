/* global colorScheme, Color */
/**
 * Add a listener to the Color Scheme control to update other color controls to new values/defaults.
 * Also trigger an update of the Color Scheme CSS when a color is changed.
 */
(function (api) {
    api.controlConstructor.select = api.Control.extend({
        ready: function () {
            if ('mp_profit_color_scheme' === this.id) {
                this.setting.bind('change', function (value) {
                    api('mp_profit_color_primary').set(colorScheme[value].colors[0]);
                    api.control('mp_profit_color_primary').container.find('.color-picker-hex').data('data-default-color', colorScheme[value].colors[0]).wpColorPicker('defaultColor', colorScheme[value].colors[0]);
                    api('header_textcolor').set(colorScheme[value].colors[1]);
                    api.control('header_textcolor').container.find('.color-picker-hex').data('data-default-color', colorScheme[value].colors[1]).wpColorPicker('defaultColor', colorScheme[value].colors[1]);
                });
            }
        }
    });
})(wp.customize);