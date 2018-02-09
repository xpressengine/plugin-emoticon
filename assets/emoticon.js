(function ($) {
  window.XEeditor.tools.define({
    id: 'editortool/emoticon@emoticon',
    events: {
      iconClick: function (cbAppendToolContent) {
        var cWindow = window.open('../plugin/emoticon/popup', 'test', 'width=500,height=500,resizable=false')

        $(cWindow).on('load', function () {
          cWindow.appendToolContent = cbAppendToolContent
        })
      },
      elementDoubleClick: function (id, editorIframe, domSelector) {
        if (!window.XEeditor.tools.get(id).props.addEvent.doubleClick) {
          window.XEeditor.tools.get(id).props.addEvent.doubleClick = true

          $(editorIframe).on('dblclick', domSelector, function (e) {
            alert('done')
          })
        }
      }
    },
    props: {
      name: 'Code',
      options: {
        label: 'Wrap code',
        command: 'wrapCode'
      },
      addEvent: {
        doubleClick: false
      }
    }
  })
})(window.jQuery)
