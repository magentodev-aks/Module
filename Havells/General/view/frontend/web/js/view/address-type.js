define(
    [
        'ko',
        'uiComponent'
    ],
    function (ko, Component) {
        "use strict";

        return Component.extend({
            defaults: {
                template: 'Havells_General/address-type'
            },
            isRegisterNewsletter: true
        });
    }
);