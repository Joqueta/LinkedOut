
    
        (() => {
            const form = document.getElementById('post-form');

            if (!form) {
                return;
            }

            const typeField = form.querySelector('#type');
            const contentField = form.querySelector('#content');
            const templateButtons = form.querySelectorAll('[data-template-button]');

            const renderTemplate = (button) => {
                if (!button) {
                    return;
                }

                typeField.value = button.dataset.typeId;
                contentField.placeholder = button.dataset.placeholder || contentField.placeholder;
                contentField.value = button.dataset.template || contentField.value;

                templateButtons.forEach((candidate) => {
                    const active = candidate === button;
                    candidate.classList.toggle('border-red-400', active);
                    candidate.classList.toggle('bg-red-50', active);
                    candidate.classList.toggle('border-gray-200', !active);
                    candidate.classList.toggle('bg-white', !active);
                });
            };

            templateButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    renderTemplate(button);
                    contentField.focus();
                });
            });

            renderTemplate(form.querySelector(`[data-template-button][data-type-id="${typeField.value}"]`));
        })();
    