const validation = new JustValidate("#signupform");

  validation.addField("#name", [{
      rule: "required"
    }]);