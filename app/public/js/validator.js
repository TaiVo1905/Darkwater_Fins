function Validator(options) {
    var formElement = document.querySelector(options.form);

    if (formElement) {
        options.rules.forEach(function(rule) {
            var inputElement = formElement.querySelector(rule.selector);
            var errorElement = inputElement.parentElement.querySelector('.form-message');

            if (inputElement) {
                // Kiểm tra khi người dùng rời khỏi input
                inputElement.onblur = function() {
                    var errorMessage = rule.test(inputElement.value);
                    if (errorMessage) {
                        errorElement.innerText = errorMessage;
                        inputElement.classList.add('invalid');
                    } else {
                        errorElement.innerText = '';
                        inputElement.classList.remove('invalid');
                    }
                };

                // Xóa lỗi khi người dùng bắt đầu nhập
                inputElement.oninput = function() {
                    errorElement.innerText = '';
                    inputElement.classList.remove('invalid');
                };
            }
        });
    }
}

// Rule bắt buộc
Validator.isRequired = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            return value.trim() ? undefined : "Vui lòng nhập trường này.";
        }
    };
};

// Rule kiểm tra email
Validator.isEmail = function(selector) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(value.trim()) ? undefined : "Vui lòng nhập email hợp lệ.";
        }
    };
};
