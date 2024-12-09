/*
*
* Script respinsible for folding and unfolding content - in map for example
*
*/

export const contentFolding = (classWrapper, contenerToFold, openClass) => {

    const classShrinkedObjecWrapper = classWrapper;
    const classToShrinkedObject = contenerToFold;
    const classToOpenTheShrink = openClass;

    const shrinkedObjectWrappers = document.querySelectorAll('.' + classShrinkedObjecWrapper);

    shrinkedObjectWrappers.forEach((shrinkedObjectWrapper) => {
        const tmpInner = shrinkedObjectWrapper.querySelector('.' + classToShrinkedObject);
        const tmpOpen = shrinkedObjectWrapper.querySelector('.' + classToOpenTheShrink);

        if (tmpInner && tmpOpen) {
            tmpOpen.addEventListener('click', (e) => {
                if (!tmpInner.classList.contains('opened')) {
                    tmpInner.style.height = 'auto';
                    tmpInner.classList.toggle('opened');
                    tmpOpen.remove();
                }
            })
        }
    });

}