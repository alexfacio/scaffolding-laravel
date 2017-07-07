(function(window, $){
  var ConvertCase = function(elem, options){
      this.elem = elem;
      this.$elem = $(elem);
      this.options = options;
      this.metadata = this.$elem.data('convert-case-options');
    };

  ConvertCase.prototype = {
    defaults: {
      noKEYS: [
        35, //Fin
        36, //Inicio
        37, //Izquierda
        38, //Arriba
        39, //Derecha
        40, //Abajo
      ],
      typeCase: "upper", //upper, lower, capitalize
    },
    init: function() {
      this.config = $.extend({}, this.defaults, this.options, this.metadata);

      if( this.config.typeCase=='upper'){
        this.toUpperCase();
      }
      else if( this.config.typeCase=='lower'){
        this.toLowerCase();
      }
      else if( this.config.typeCase=='capitalize'){
        this.toCapitalize();
      }
      //this.getCaretPosition();

      return this;
    },

    getCaretPosition: function(ctrl) {
        var CaretPos = 0;    // IE Support
        if (document.selection) {
            ctrl.focus();
            var Sel = document.selection.createRange();
            Sel.moveStart('character', -ctrl.value.length);
            CaretPos = Sel.text.length;
        }
        // Firefox support
        else if (ctrl.selectionStart || ctrl.selectionStart == '0') {
            CaretPos = ctrl.selectionStart;
        }

        return CaretPos;
    },

    setCaretPosition : function(ctrl, pos) {
        if (ctrl.setSelectionRange) {
            ctrl.focus();
            ctrl.setSelectionRange(pos,pos);
        }
        else if (ctrl.createTextRange) {
            var range = ctrl.createTextRange();
            range.collapse(true);
            range.moveEnd('character', pos);
            range.moveStart('character', pos);
            range.select();
        }
    },

    toUpperCase: function(){
        // Remember original caret position
        var caretPosition = this.getCaretPosition(this.$elem[0]);
        
        // Uppercase-ize contents
        this.$elem.val(this.$elem.val().toUpperCase());
        
        // Reset caret position
        // (we ignore selection length, as typing deselects anyway)
        this.setCaretPosition(this.$elem[0], caretPosition);
    },

    toLowerCase: function(){
        // Remember original caret position
        var caretPosition = this.getCaretPosition(this.$elem[0]);
        
        // Uppercase-ize contents
        this.$elem.val(this.$elem.val().toLowerCase());
        
        // Reset caret position
        // (we ignore selection length, as typing deselects anyway)
        this.setCaretPosition(this.$elem[0], caretPosition);
    },

    toCapitalize: function(){

        // Remember original caret position
        var caretPosition = this.getCaretPosition(this.$elem[0]);
        
        // capitalcase-ize contents
        this.$elem.val(this.$elem.val().substring(0, 1).toUpperCase() + this.$elem.val().substring(1).toLowerCase());
        
        // Reset caret position
        // (we ignore selection length, as typing deselects anyway)
        this.setCaretPosition(this.$elem[0], caretPosition);
    }

  }

  ConvertCase.defaults = ConvertCase.prototype.defaults;

  $.fn.convertCase = function(options) {
    var selector = this.selector;
    return this.each(function(e) {
      var continuar = true;

      //No procesar si se preciona alguna tecla en ConvertCase.defaults.noKEYS
      $(document).on('keypress', selector, function(event) {
        var code = event.keyCode ? event.keyCode : event.which;
        //console.log(code);
        $.each(ConvertCase.defaults.noKEYS, function(index, val) {
           if( code == val){
            continuar = false;
            return false;
           }
           continuar = true;
        });

      });

      $(document).on('keyup', selector, function(event) {
        if( continuar===true ){
          new ConvertCase(this, options).init();
        }
      });

      new ConvertCase(this, options).init();
    });
  };

  window.ConvertCase = ConvertCase;
})(window, jQuery);