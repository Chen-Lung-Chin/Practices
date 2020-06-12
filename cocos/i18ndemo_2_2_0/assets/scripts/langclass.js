const i18n = require('LanguageData');
cc.log('[langclass], window.i18n.curLang: ' + window.i18n.curLang);

cc.Class({
    extends: cc.Component,

    properties: {
        language: 'zh',
    },

    onLoad: function() {
        i18n.init(this.language);
        cc.log('[langclass::onLoad], window.i18n.curLang: ' + window.i18n.curLang);
    }
});