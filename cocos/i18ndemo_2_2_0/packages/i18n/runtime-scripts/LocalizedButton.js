const ButtonSet = require('ButtonSet');


cc.Class({
    extends: cc.Component,

    editor: {
        executeInEditMode: true,
        inspector: 'packages://i18n/inspector/localized_button.js',
        menu: 'i18n/LocalizedButton'
    },

    properties: {
        ButtonSet: {
            default: [],
            type: ButtonSet,
        }
    },

    onLoad () {
        if (CC_EDITOR) {
            if (this.ButtonSet.length == 0) {
                for ( const value of window.DefaultLangList ) {
                    let set = new ButtonSet();
                    set.language = value;
                    this.ButtonSet.push(set);
                }
            }
        }
        
        this.fetchRender();
    },

    fetchRender () {
        let button = this.getComponent(cc.Button);
        if (button) {
            this.button = button;
            this.updateByLang(window.i18n.curLang);
            return;
        }
    },

    updateByLang (language) {
        if (!this.button) {
            // cc.error('Failed to update localized button, button component is invalid!');
            return;
        }

        let buttonset = this.getButtonSetByLang(language);
        if (!buttonset) {
            return;
        }

        if(this.button.transition == cc.Button.Transition.SPRITE){
            this.button.normalSprite = buttonset.normal;
            this.button.pressedSprite = buttonset.pressed;
            this.button.hoverSprite = buttonset.hover;
            this.button.disabledSprite = buttonset.disabled;
        }
    }, 

    getButtonSetByLang (lang) {
        for (let i = 0; i < this.ButtonSet.length; ++i) {
            if (this.ButtonSet[i].language === lang) {
                return this.ButtonSet[i];
            }
        }
    }
});