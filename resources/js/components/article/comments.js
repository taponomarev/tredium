document.addEventListener('DOMContentLoaded', () => {
   const formElement = document.querySelector('.comment-form');

   if (formElement) {
       const btnSubmitElement = formElement.querySelector('.btn-submit');
       btnSubmitElement.addEventListener('click', (evt) => {
          evt.preventDefault();
          const formInputs = formElement.elements;

          removeValidateMessages(formInputs);
          createComment({
              article_id: formInputs['article_id'].value,
              subject: formInputs['subject'].value,
              text: formInputs['text'].value
          }, formInputs);
       });
   }

   const showAlertElement = (message, type = 'success') => {
       return `<div class="alert alert-${type} alert-dismissible fade show text-center" role="alert">
                ${message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`;
   };

    const createComment = (requestData, formInputs) => {
        axios.post(`/api/article_comments`, requestData)
            .then((response) => {
                if (response.status === 200) {
                    formElement.innerHTML = showAlertElement(response.data.message)
                }
            })
            .catch((error) => {
                const errors = error.response.data.errors;
                Object.keys(errors).forEach((errorKey) => {
                    const currentInput = formInputs[errorKey];
                    currentInput.classList.add('is-invalid');
                    currentInput.placeholder = errors[errorKey];
                });
            })
    }

    const removeValidateMessages = (formInputs) => {
        Array.from(formInputs).forEach((input) => {
            input.classList.remove('is-invalid');
        });
    };
});
