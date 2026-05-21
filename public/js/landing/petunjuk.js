const petunjukItems =
    document.querySelectorAll('.petunjuk-item');

petunjukItems.forEach((item) => {

    const button =
        item.querySelector('.petunjuk-btn');

    const content =
        item.querySelector('.petunjuk-content');

    button.addEventListener('click', () => {

        item.classList.toggle('active');

        if (item.classList.contains('active')) {

            content.style.maxHeight =
                content.scrollHeight + 'px';

        } else {

            content.style.maxHeight = null;

        }

    });

});