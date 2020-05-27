class NinjaForm extends HTMLElement {
  constructor() {
    super();
    this.handleInputInactive = this.handleInputInactive.bind(this);
    this.init();
    
  }

  init() {
    const _self = this;
    $(document).ready(function() {
      setInterval(() => {
        const formFields = this.querySelectorAll('nf-field .field-wrap');
        formFields.forEach((formField) => {
          const $formField = $(formField);
          const $input = $formField.find('.nf-field-element input');
          _self.updateActive($input[0]);
          $input.on('focus', _self.handleInputInactive);
          $input.on('blur', _self.handleInputInactive);
          $input.on('change', _self.handleInputInactive);
        });
      }, 100);
    });
  }

  handleInputInactive(event) {
    this.updateActive(event.target);
  }

  updateActive(element) {
    const $element = $(element);
    if ($element.is(':focus') || $element.val()) {
      $element.closest('.field-wrap').addClass('nf-active');
    } else {
      $element.closest('.field-wrap').removeClass('nf-active');
    }
  }
}

export default NinjaForm;